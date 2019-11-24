<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'Site\ProductController@index')->name('homepage');
Route::get('/category/{slug}', 'Site\CategoryController@show')->name('category.show');
Route::get('/product/{slug}', 'Site\ProductController@show')->name('product.show');

Route::post('/product/add/cart', 'Site\ProductController@addToCart')->name('product.add.cart');
Route::get('/cart', 'Site\CartController@getCart')->name('checkout.cart');
Route::get('/cart/item/{id}/remove', 'Site\CartController@removeItem')->name('checkout.cart.remove');
Route::get('/cart/clear', 'Site\CartController@clearCart')->name('checkout.cart.clear');
Route::post('/checkout/order/test', 'Saf\MpesaController@STKPushSimulation')->name('checkout.place.order.test');
Route::group(['middleware' => ['auth']], function () {
    Route::get('/checkout', 'Site\CheckoutController@getCheckout')->name('checkout.index');
    Route::post('/checkout/order', 'Site\CheckoutController@placeOrder')->name('checkout.place.order');

    Route::get('checkout/payment/complete', 'Site\CheckoutController@complete')->name('checkout.payment.complete');

    Route::get('account/orders', 'Site\AccountController@getOrders')->name('account.orders');



// simulate  for LipA na Mpesa APi
    Route::post('build/trigger/payment','Saf\MpesaController@STKPushSimulation')->name('stk_trigger');


});
//mpesa callbacks
Route::post('build/receive/stk_payments','Saf\TransactionCallBacksController@processSTKPushRequestCallback')->name('stk-callback');

Route::view('payment status','site.pages.payment_status')->name('payment.status');
//vue tests
Route::view('/market-place', 'seller.welcome');
Auth::routes();
require 'admin.php';
require 'seller.php';

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
