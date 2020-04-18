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
            return $this->sendResponse($exists, '409'); //used for front end logic
        }
        return $this->subscriptionRepository->create($data);
    }

    public function sendSubscriptionEmail()
    {
        $subscriptions = $this->getAllSubscriptionData();

        foreach($subscriptions as $sub) {
            Mail::to($sub->email)->send(new SubscriptionMail($sub->country));
        }

        return 'Done';
    }

    private function checkIfEmailExists(string $email)
    {
        return $this->subscriptionRepository->where('email', $email)->first();
    }


    private function sendResponse($data, $code) 
    {
        $response = [
            'code' => $code,
            'data' => $data,
        ];

        return json_encode($response);
    }
}