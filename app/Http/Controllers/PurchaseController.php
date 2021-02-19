<?php

namespace App\Http\Controllers;

use App\Events\PurchaseExpired;
use App\Models\Device;
use App\Events\PurchaseSuccessful;
use App\Events\SubscriptionToVerify;
use App\MockApi\IosGoogleApi;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp;
use Illuminate\Support\Facades\Route;
use App\AppEndpointCallback\Callback;

class PurchaseController extends Controller
{

    public function verify(Request $request)
    {
        try {
            $response = ['status' => false];
            $request->validate(['receipt' => 'required']);
            if ($request->user()->os == "ios") {
                $verifyHashResponse = IosGoogleApi::mockIosVerifyHash($request->receipt); //mocked ios verify hash api with an internal facade
            } else {
                $verifyHashResponse = IosGoogleApi::mockGoogleVerifyHash($request->receipt); //mocked google verify hash api with an internal facade
            }

            if ($verifyHashResponse['result']) { //if the api return the result as true
                PurchaseSuccessful::dispatch($request->user(), $verifyHashResponse['expiry_date'], $request->receipt); //dispatch an event to save the expiry date which the api returned and set susbcription status as active
                $response = ['status' => true];
            }

            return json_encode($response);
        } catch (Exception $e) {
            return json_encode($e->getMessage());
        }
    }
}
