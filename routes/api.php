<?php

Route::prefix('bigcommerce/products')->group(function() {
	Route::get('', 'ProductController@index');
	Route::get('{product}', 'ProductController@show');
});

Route::prefix('bigcommerce/customers')->group(function() {
	Route::get('', 'CustomerController@index');
	Route::get('/{customer}', 'CustomerController@show');
	Route::post('/{customer}/validate', 'CustomerController@validatePassword');
});

Route::prefix('bigcommerce/carts')->group(function() {
	Route::get('redirects', 'CartRedirectController');
	Route::get('', 'CartController@show');
	Route::post('', 'CartController@store');
	Route::put('/{itemId}', 'CartController@update');
	Route::delete('/{itemId}', 'CartController@destroy');

});
