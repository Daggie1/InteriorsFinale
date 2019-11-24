<?php

use App\Models\Counties;

Route::group(['prefix'  =>  'seller'], function () {

    Route::get('login', 'Seller\LoginController@showLoginForm')->name('seller.login');
    Route::post('login', 'Seller\LoginController@login')->name('seller.login.post');
    Route::get('register', 'Seller\LoginController@showRegisterForm')->name('seller.register');
    Route::post('register', 'Seller\LoginController@create')->name('seller.register.post');
    Route::get('logout', 'Seller\LoginController@logout')->name('seller.logout');
    Route::group(['middleware' => ['auth:seller']], function () {

        Route::get('/','Seller\DashboardController@@index')->name('seller.dashboard')->middleware(['shop','subscription']);
        Route::get('/dashboard','Seller\DashboardController@index')->name('seller.dashboard.show')->middleware(['shop','subscription']);


 Route::group(['prefix' => 'products',
                    'middleware'=>['shop','subscription']], function () {

           Route::get('/', 'Seller\ProductController@index')->name('seller.products.index');
           Route::get('/create', 'Seller\ProductController@create')->name('seller.products.create');
           Route::post('/store', 'Seller\ProductController@store')->name('seller.products.store');
           Route::get('/edit/{id}', 'Seller\ProductController@edit')->name('seller.products.edit');
           Route::post('/update', 'Seller\ProductController@update')->name('seller.products.update');

           Route::post('images/upload', 'Seller\ProductImageController@upload')->name('seller.products.images.upload');
           Route::get('images/{id}/delete', 'Seller\ProductImageController@delete')->name('seller.products.images.delete');
           Route::get('attributes/load', 'Seller\ProductAttributeController@loadAttributes');
           Route::post('attributes', 'Seller\ProductAttributeController@productAttributes');
           Route::post('attributes/values', 'Seller\ProductAttributeController@loadValues');
           Route::post('attributes/add', 'Seller\ProductAttributeController@addAttribute');
           Route::post('attributes/delete', 'Seller\ProductAttributeController@deleteAttribute');

        });

        Route::group(['prefix' => 'orders',
            'middleware'=>['shop','subscription']], function () {
           Route::get('/', 'Seller\OrderController@index')->name('seller.orders.index');
           Route::get('/{order}/show', 'Seller\OrderController@show')->name('seller.orders.show');
        });

        Route::group(['prefix' => 'transactions',
            'middleware'=>['shop','subscription']], function () {
            Route::get('/', function () {
                $data=[
                    'pageTitle'=>'Transactions',
                    'subTitle'=>'List of all transactions'
                ];
                return view('seller.transaction.index',$data);
                    })->name('seller.transaction');

        });
        Route::group(['prefix' => 'shop'], function () {
           Route::get('/', 'Seller\ShopController@index')->name('seller.shop')->middleware(['shop','subscription']);
            Route::get('/create', 'Seller\ShopController@showCreateShopPage')->name('seller.shop.create');
            Route::post('/store', 'Seller\ShopController@create')->name('seller.shop.create.post');
            Route::get('/edit/{id}', 'Seller\ShopController@edit')->name('seller.shop.edit')->middleware(['shop','subscription']);
        });
        Route::group(['prefix' => 'subscription',
            'middleware'=>'shop'], function () {
Route::view('/','seller.subscribe.index')->name('seller.subscription.index');
        });

        //mpesa
        // simulate  for LipA na Mpesa APi
        Route::post('build/trigger/payment','Saf\Sellers\MpesaController@STKPushSimulation')->name('seller.stk_trigger');
        Route::view('payment_tatus','seller.subscribe.payment_status')->name('seller.payment_status');
    });
    //Lipa na mpesa callbacks
    Route::post('build/receive/stk_payments','Saf\Sellers\TransactionCallBacksController@processSTKPushRequestCallback')->name('seller.stk-callback');
});
