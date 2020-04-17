<?php 

namespace App\Services\Subscription;

use App\Repositories\Subscription\SubscriptionRepository;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Collection;



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
        // return $this->subscriptionRepository->create($data);
    }

    private function checkIfEmailExists(string $email)
    {
        return $this->subscriptionRepository->where('email', $email)->first();
    }
}