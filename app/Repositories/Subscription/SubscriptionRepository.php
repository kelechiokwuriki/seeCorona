<?php

namespace App\Repositories\Subscription;

use App\Repositories\BaseRepository;
use App\Subscription;


class SubscriptionRepository extends BaseRepository
{
    public function __construct(Subscription $subscriptionModel)
    {
        parent::__construct($subscriptionModel);
    }
}