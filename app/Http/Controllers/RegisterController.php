<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;
use Exception;

class RegisterController extends Controller
{
    public function index(Request $request)
    {
        try {
            $validated = $request->validate([
                'appId' => 'required',
                'uId' => 'required',
            ]); //validate the request
            $deviceFound = Device::where('appId', $request->appId)->where('uId', $request->uId)->first(); //checl if the device with appId and uId already exists
            if( $deviceFound ) {
                return "register OK";
            }

            $device = new Device(); //create new device
            $device->fill([
                'uId' => $request->uId,
                'appId' => $request->appId,
                'language' => $request->language,
                'os' => $request->os,
                ]);
                if( !$device->save() ) {
                    return json_encode($device->getErrors());
                } 
                $token = $device->createToken($device->id); //generate token using sanctum
                return ['token' => $token->plainTextToken];
        } catch (Exception $e) {
            return json_encode($e->getMessage());
        }
    }
}
