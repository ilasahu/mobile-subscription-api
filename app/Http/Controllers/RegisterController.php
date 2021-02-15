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
            ]);
            $deviceFound = Device::where('appId', $request->appId)->where('uId', $request->uId)->first();
            if( $deviceFound ) {
                return "register OK";
            }
            $device = new Device();
            $device->fill([
                'uId' => $request->uId,
                'appId' => $request->appId,
                'language' => $request->language,
                'os' => $request->os,
                ]);
                if( !$device->save() ) {
                    return json_encode($device->getErrors());
                } 
    
                $token = $device->createToken($device->id);
                return ['token' => $token->plainTextToken];
        } catch (Exception $e) {
            return json_encode($e->getMessage());
        }
    }
}
