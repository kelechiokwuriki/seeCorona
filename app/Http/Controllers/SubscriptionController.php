<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Services\Subscription\SubscriptionService;


class SubscriptionController extends Controller
{
    protected $subscriptionService;

    public function __construct(SubscriptionService $subscriptionService)
    {
        $this->subscriptionService = $subscriptionService;
    }

    public function removeSubscription($uuid)
    {
        $result = $this->subscriptionService->deleteSubscription($uuid);  
        Log::debug($result); 
    }
}
