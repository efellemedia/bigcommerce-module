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
use App\Http\Controllers\Controller;
use Modules\Bigcommerce\Models\Category;
use Modules\Bigcommerce\Http\Resources\ProductResource;
use Modules\Bigcommerce\Http\Resources\CategoryResource;

class CategoryController extends Controller
{
	/**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return JsonResource
     */
    public function index(Request $request)
    {
    	return CategoryResource::collection(
            Category::orderBy('name')->paginate(25)
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  Category $category
     * @return JsonResource
     */
    public function show(Request $request, Category $category)
    {
        return new CategoryResource($category);
    }
}