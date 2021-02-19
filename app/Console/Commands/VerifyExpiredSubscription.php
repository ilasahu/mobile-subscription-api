<?php

namespace App\Console\Commands;

use App\Models\Device;
use App\Events\SubscriptionToVerify;
use Illuminate\Console\Command;

class VerifyExpiredSubscription extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subscription-status:verify';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Verify the records of the subscriptions
    that are expired but not cancelled in the DB';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //get the devices where the subscription status is active and is not queued, get it in 100 chunks and dispatch an event with a queueable listerner
        Device::where('subscription_status', 'active')->where('is_queued', 0)->chunk(100, function ($devices) {
            foreach ($devices as $device) {
                SubscriptionToVerify::dispatch($device); //push event to verify
                $device->is_queued = 1; //make the device as reserved
                $device->save();
            } 
        });
    }
}
