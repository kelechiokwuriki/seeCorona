<?php 

namespace App\Services\Subscription;

use App\Repositories\Subscription\SubscriptionRepository;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\Mail\SubscriptionMail;


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
            return $this->sendResponse($exists, $this->resourceExistsResponseCode); //used for front end logic
        }

        $data['unique_identifier'] = substr(str_shuffle(MD5(microtime())), 0, 10);

        $eloqResult = $this->subscriptionRepository->create($data);

        return $this->sendResponse($eloqResult, $this->successResponseCode);
    }

    public function deleteSubscription($id)
    {
        return $this->subscriptionRepository->where('unique_identifier', $id)->first()->delete();
    }

    public function sendSubscriptionEmail()
    {
        $subscriptions = $this->getAllSubscriptionData();

        foreach($subscriptions as $sub) {
            //unique identifier used for unsubscribing fromm email
            Mail::to($sub->email)->send(new SubscriptionMail($sub->country, $sub->unique_identifier)); 
        }
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