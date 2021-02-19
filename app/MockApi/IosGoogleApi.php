<?php

namespace App\MockApi;

use Illuminate\Support\Facades\Http;

class IosGoogleApi
{
    public static function mockIosVerifyHash($hash)
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

    public static function mockGoogleVerifyHash($hash)
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