<?php

/*
 * This file is part of the FusionCMS application.
 *
 * (c) efelle creative <appdev@efelle.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Modules\Bigcommerce\Http\Controllers\API;

use Illuminate\Http\Request;
use Fusion\Http\Controllers\Controller;
use Modules\Bigcommerce\Models\Product;
use Modules\Bigcommerce\Http\Resources\ProductResource;
use Modules\Bigcommerce\Http\Resources\ProductVariantResource;

class ProductController extends Controller
{
	/**
     * Display a listing of the resource.
     *
     * @param  Request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
    	return ProductResource::collection(
            Product::orderBy('name')->paginate(25)
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  Product  $product
     * @return JsonResponse
     */
    public function show(Request $request, Product $product)
    {
        return new ProductResource($product);
    }
}