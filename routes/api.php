<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your module. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/bigcommerce/categories', 'CategoryController@index');
Route::get('/bigcommerce/categories/{category}', 'CategoryController@show');
Route::patch('/bigcommerce/categories/{category}', 'CategoryController@update');

Route::get('/bigcommerce/products', 'ProductController@index');
Route::get('/bigcommerce/products/{product}', 'ProductController@show');

Route::group(['prefix' => '/bigcommerce/settings'], function() {
	Route::patch('fieldsets', 'Settings\FieldsetController@update');
});

// Customer endpoints
Route::group(['prefix' => '/bigcommerce/customers'], function() {
	Route::get('', 'CustomerController@index');
	Route::get('/{customer}', 'CustomerController@show');
	Route::post('/{customer}/validate', 'CustomerController@validatePassword');
});

// Cart endpoints
Route::group(['prefix' => '/bigcommerce/carts'], function() {
	Route::get('redirects', 'CartRedirectController');
	Route::get('', 'CartController@show');
	Route::post('', 'CartController@store');
	Route::put('/{itemId}', 'CartController@update');
	Route::delete('/{itemId}', 'CartController@destroy');

});
