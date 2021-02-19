<?php

namespace App\Listeners;

use App\AppEndpointCallback\Callback;
use App\Events\PurchaseRenewed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RenewDeviceSubscription implements ShouldQueue
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
     * @param  PurchaseRenewed  $event
     * @return void
     */
    public function handle(PurchaseRenewed $event)
    {
        Callback::subscriptionStatusChanged($event->device, "renewed");
    }
}
