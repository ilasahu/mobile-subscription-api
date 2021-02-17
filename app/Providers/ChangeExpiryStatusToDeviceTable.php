<?php

namespace App\Providers;

use App\Providers\PurchaseExpired;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ChangeExpiryStatusToDeviceTable
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
     * @param  PurchaseExpired  $event
     * @return void
     */
    public function handle(PurchaseExpired $event)
    {
        //
    }
}
