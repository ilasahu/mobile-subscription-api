<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function check(Request $request)
    {
        $device = $request->user();
        return $device;
    }
}
