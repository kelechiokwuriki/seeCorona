<?php 

namespace App\Services\Subscription;

use App\Repositories\Subscription\SubscriptionRepository;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\Mail\SubscriptionMail;
use App\Mail\SubscriptionConfirmationMail;
use Carbon\Carbon;


class SubscriptionService 
{
    protected $subscriptionRepository;
    private $successResponseCode = '200';
    private $resourceExistsResponseCode = '409';

    public function __construct(SubscriptionRepository $subscriptionRepository)
    {
        $this->subscriptionRepository = $subscriptionRepository;
    }

    public function getAllSubscriptionData()
    {
        return $this->subscriptionRepository->all();
    }

    public function createSubscription(array $data)
    {
        $exists = $this->checkIfEmailExists($data['email']);

        if($exists) {
            //used for front end UI logic
            return $this->sendResponse($exists, $this->resourceExistsResponseCode); 
        }


        //create a unique identifier for each subscription
        $data['unique_identifier'] = substr(str_shuffle(MD5(microtime())), 0, 10); 
        $data['status'] = 'Not confirmed';

        $eloqResult = $this->subscriptionRepository->create($data);


        //users should confirm subscription
        $this->sendConfirmationEmail($eloqResult->email, $eloqResult->country, $eloqResult->unique_identifier); 

        return $this->sendResponse($eloqResult, $this->successResponseCode);
    }

    public function deleteSubscription(string $id)
    {
        return $this->subscriptionRepository->where('unique_identifier', $id)->first()->delete();
    }

    public function confirmSubscription(string $id)
    {
        return $this->subscriptionRepository->where('unique_identifier', $id)->first()->update([
            'status' => 'Confirmed'
        ]);
    }

    //Deletes subscriptions where created date is 12 hours old or greater
    public function deleteUnconfirmedSubscriptions()
    {
        $date = Carbon::now()->subHours(12)->toDateTimeString();

        $unconfirmedSubs = $this->subscriptionRepository->where('status', 'Not confirmed')->where('created_at', '<=', $date)->get();
                
        foreach($unconfirmedSubs as $unconfirmedSub) {
            $unconfirmedSub->delete();
        }
    }

    public function sendSubscriptionEmail()
    {
        $subscriptions = $this->getAllSubscriptionData();

        foreach($subscriptions as $sub) {
            //unique identifier used for unsubscribing fromm email
            Mail::to($sub->email)->send(new SubscriptionMail($sub->country, $sub->unique_identifier)); 
        }
    }

    private function sendConfirmationEmail($emailAddress, $country, $uniqueIdentifier)
    {
        Mail::to($emailAddress)->send(new SubscriptionConfirmationMail($country, $uniqueIdentifier));
    }

    private function checkIfEmailExists(string $email)
    {
        return $this->subscriptionRepository->where('email', $email)->first();
    }

    //front end uses response data for UI logic
    private function sendResponse($data, $code) 
    {
        $response = [
            'code' => $code,
            'data' => $data,
        ];

        return json_encode($response);
    }
}