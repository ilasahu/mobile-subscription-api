<?php

namespace App\AppEndpointCallback;
use Illuminate\Support\Facades\Http;

class Callback
{
    public static function subscriptionStatusChanged($device, $eventName)
    {
        if( !empty($device->application) && !empty($device->application->endpoint) ) {
            $response = Http::post($device->application->endpoint, [
                'AppID,' => $device->application->id,
                'deviceID' => $device->id,
                'event' => $eventName,
            ]);
            return $response;
        }   
    }
}