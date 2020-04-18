<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\Subscription\SubscriptionService;

class SendSubscriptionEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily:sendsubscriptionemail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends an email to subscribers of COVID-19 data by country.';

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
        $this->subscriptionService->sendSubscriptionEmail();
    }
}
