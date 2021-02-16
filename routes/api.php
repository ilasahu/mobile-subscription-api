<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', 'App\Http\Controllers\RegisterController@index');

Route::middleware('auth:sanctum')->post('/verify-purchase', 'App\Http\Controllers\PurchaseController@verify');
Route::middleware('auth:sanctum')->get('/check-subscription', 'App\Http\Controllers\SubscriptionController@check');
