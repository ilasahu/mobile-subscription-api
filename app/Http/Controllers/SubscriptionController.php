<?php

namespace App\Http\Controllers;

use App\Events\PurchaseExpired;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function check(Request $request)
    {
        $device = $request->user();

        if( !empty($device->expiry_date) && $device->expiry_date <= date("Y-m-d h:i:s")) { //check ig the expiry date is smaller than now time then dispatch an event to mark the status as expired
            PurchaseExpired::dispatch($device);
        }
        // return subscription status from database
        return $device->subscription_status;
    }
}
