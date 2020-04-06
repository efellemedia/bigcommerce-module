<?php

Route::prefix('bigcommerce/categories')->group(function() {
	Route::get('{category}/products', 'ProductController@index');
	Route::get('', 'CategoryController@index');
});

Route::prefix('bigcommerce/products')->group(function() {
	Route::get('{product}/customfields', 'ProductCustomFieldController@index');
	Route::get('{product}/categories', 'CategoryController@index');
	Route::get('{product}/reviews', 'ProductReviewController@index');
	Route::get('{product}/images', 'ProductImageController@index');
	Route::get('{product}/related', 'ProductController@index');
	Route::get('', 'ProductController@index');
});