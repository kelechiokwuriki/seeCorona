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
        $this->subscriptionService->deleteSubscription($uuid);  
        return redirect('/');
    }

    public function confirmSubscription($uuid)
    {
        $result = $this->subscriptionService->confirmSubscription($uuid);
        return redirect('/');
    }
}
