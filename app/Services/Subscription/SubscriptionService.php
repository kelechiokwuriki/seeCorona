<?php 

namespace App\Services\Subscription;

use App\Repositories\Subscription\SubscriptionRepository;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;


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
            //show them the data they subscribed to  
            return $this->responseData($exists);
        }
        return $this->subscriptionRepository->create($data);
    }

    public function sendSubscriptionEmail()
    {
        $subscriptions = $this->getAllSubscriptionData();
        $url = config('app.covid_19_api_url');

        $response = Http::get('http://test.com');

    }

    private function checkIfEmailExists(string $email)
    {
        return $this->subscriptionRepository->where('email', $email)->first();
    }


    private function responseData($data) 
    {
        $response = [
            'code' => 409,
            'data' => $data,
            'reason' => 'Resource exists'
        ];

        return json_encode($response);
    }
}