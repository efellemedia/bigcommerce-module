<?php

/*
 * This file is part of the FusionCMS application.
 *
 * (c) efelle creative <appdev@efelle.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

 /*
|--------------------------------------------------------------------------
| DataTable Routes
|--------------------------------------------------------------------------
|
| Here is where you can register datatable routes for your application.
| These routes are loaded by the RouteServiceProvider within a group
| which is assigned the "api" middleware group. Enjoy building!
|
*/


Route::get('bigcommerce/categories', 'CategoryController@index');
Route::get('bigcommerce/categories/{category}/products', 'CategoryProductController@index');
Route::get('bigcommerce/products', 'ProductController@index');
Route::get('bigcommerce/products/{product}/reviews', 'ProductReviewController@index');
