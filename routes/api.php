<?php

use Illuminate\Http\Request;

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
Route::post('/checkout/order/test', 'Saf\MpesaController@STKPushSimulation')->name('checkout.place.order.test');
Route::post('build/receive/stk_payments','Saf\TransactionCallBacksController@processSTKPushRequestCallback')->name('stk-callback');
