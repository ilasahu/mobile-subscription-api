<?php

namespace App\Http\Controllers;

use App\Events\PurchaseExpired;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function check(Request $request)
    {
        $device = $request->user();

        if( !empty($device->expiry_date) && $device->expiry_date <= date("Y-m-d h:i:s")) {
            PurchaseExpired::dispatch($device);
        }
        
        return $device->subscription_status;
    }
}
