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

    public function index()
    {
        dd('test');
    }

    public function verify(Request $request)
    {
        try {
            $response = ['status' => false];
            $request->validate(['receipt' => 'required']);
            if ($request->user()->os == "ios") {
                $verifyHashResponse = IosGoogleApi::mockIosVerifyHash($request->receipt);
            } else {
                $verifyHashResponse = IosGoogleApi::mockGoogleVerifyHash($request->receipt);
            }

            if ($verifyHashResponse['result']) {
                PurchaseSuccessful::dispatch($request->user(), $verifyHashResponse['expiry_date'], $request->receipt);
                $response = ['status' => true];
            }

            return json_encode($response);
        } catch (Exception $e) {
            return json_encode($e->getMessage());
        }
    }
}
