<?php

namespace App\Listeners;

use App\AppEndpointCallback\Callback;
use App\Events\PurchaseStarted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class StartDeviceSubscription
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
     * @param  PurchaseStarted  $event
     * @return void
     */
    public function handle(PurchaseStarted $event)
    {
        Callback::subscriptionStatusChanged($event->device, "renewed");
    }
}
