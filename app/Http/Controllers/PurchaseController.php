<?php

namespace App\Http\Controllers;

use App\Providers\PurchaseSuccessful;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp;



class PurchaseController extends Controller
{
    public function verify(Request $request)
    {
        try {
            $response = ['status' => false];
            $request->validate(['receipt' => 'required']);
            if( $request->user()->os == "ios") {
                $verifyHashResponse = $this->mockIosVerifyHash($request->receipt);
            } else {
                $verifyHashResponse = $this->mockGoogleVerifyHash($request->receipt);
            }

            if( $verifyHashResponse['result'] ) {
                PurchaseSuccessful::dispatch($request->user(), $verifyHashResponse['expiry_date'], $request->receipt);
                $response = ['status' => true];
            }

            return json_encode($response);
            
        } catch (Exception $e) {
            return json_encode($e->getMessage());
        }
    }


    public function mockIosVerifyHash($hash)
    {
        $hashResponse = ['result' => false];
        if( !empty($hash) ) {
            $lastChar = substr($hash, -1);
            if (is_numeric($lastChar) && $lastChar % 2 != 0) {
                $hashResponse['result'] = true;
                $d = strtotime("+3 Months -6 hours");
                $hashResponse['expiry_date'] = date("Y-m-d h:i:s", $d);
            }
        } 
        return $hashResponse;
    }

    public function mockGoogleVerifyHash($hash)
    {
        $hashResponse = ['result' => false];
        if( !empty($hash) ) {
            $lastChar = substr($hash, -1);
            if (is_numeric($lastChar) && $lastChar % 2 != 0) {
                $hashResponse['result'] = true;
                $d = strtotime("+3 Months");
                $hashResponse['expiry_date'] = date("Y-m-d h:i:s", $d);
            }
        } 
        return $hashResponse;
    }
}
