<?php

namespace App\Providers;

use App\Providers\PurchaseRenewed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RenewDeviceSubscription
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
        //
    }
}
