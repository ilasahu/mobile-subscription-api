<?php

namespace App\Providers;

use App\Providers\PurchaseCanceled;
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
        //
    }
}
