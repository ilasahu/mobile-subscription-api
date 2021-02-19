<?php

namespace App\Listeners;

use App\Events\SubscriptionToVerify;
use App\MockApi\IosGoogleApi;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class VerifyActiveSubscription implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  SubscriptionToVerify  $event
     * @return void
     */
    public function handle(SubscriptionToVerify $event)
    {
        if( $event->device->subscription_status == "active" ) {
            if($event->device->os == "ios") {
                $verification = IosGoogleApi::mockIosVerifyHash($event->device->purchase_receipt);
            } else {
                $verification = IosGoogleApi::mockGoogleVerifyHash($event->device->purchase_receipt);
            }
            if( !$verification['result']) {
                $event->device->subscription_status = "expired";
            }
            $event->device->is_queued = 0;
            $event->device->save();
        }
    }
}
