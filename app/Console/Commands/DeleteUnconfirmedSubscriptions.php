<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\Subscription\SubscriptionService;


class DeleteUnconfirmedSubscriptions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:deleteunconfirmedsubscriptions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deletes unconfired subscriptions after 12 hours of user registeration';

    protected $subscriptionService;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(SubscriptionService $subscriptionService)
    {
        parent::__construct();

        $this->subscriptionService = $subscriptionService;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->subscriptionService->deleteUnconfirmedSubscriptions();
    }
}
