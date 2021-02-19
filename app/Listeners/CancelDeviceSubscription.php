<?php

namespace App\Listeners;

use App\AppEndpointCallback\Callback;
use App\Events\PurchaseCanceled;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CancelDeviceSubscription
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
     * @param  PurchaseCanceled  $event
     * @return void
     */
    public function handle(PurchaseCanceled $event)
    {
        Callback::subscriptionStatusChanged($event->device, "cancelled");
    }
}
