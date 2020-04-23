<?php

Route::prefix('bigcommerce/products')->group(function() {
	Route::get('{product}/customfields', 'ProductCustomFieldController@index');
	Route::get('{product}/reviews', 'ProductReviewController@index');
	Route::get('{product}/images', 'ProductImageController@index');
	Route::get('{product}/related', 'ProductController@index');
	Route::get('', 'ProductController@index');
});