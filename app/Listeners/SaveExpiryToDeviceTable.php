<?php

namespace App\Listeners;

use App\Events\PurchaseStarted;
use App\Events\PurchaseSuccessful;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SaveExpiryToDeviceTable
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
     * @param  PurchaseSuccessful  $event
     * @return void
     */
    public function handle(PurchaseSuccessful $event)
    {
        if( $event->device->os == "ios") {
            $event->expiryDate = date("Y-m-d H:i:s", strtotime('+6 hours', strtotime($event->expiryDate)));
        }
        $event->device->expiry_date = $event->expiryDate;
        $event->device->subscription_status = "active";
        $event->device->purchase_receipt = $event->receipt;
        $event->device->save();

        PurchaseStarted::dispatch($event->device);
    }
}
