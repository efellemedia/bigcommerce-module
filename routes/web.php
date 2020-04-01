<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your module. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// BigCommerce Webhooks
Route::post('/bigcommerce/webhooks', 'WebhookController@handle');

// Store
Route::get('/store', 'StoreController@index');
Route::get('/store/{product}', 'StoreController@show');

// Cart
Route::get('/cart', 'CartController@index');
Route::post('/cart', 'CartController@store');
Route::delete('/cart/{item}', 'CartController@destroy');