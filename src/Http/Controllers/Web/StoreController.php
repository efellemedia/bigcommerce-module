<?php

/*
 * This file is part of the FusionCMS application.
 *
 * (c) efelle creative <appdev@efelle.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Modules\Bigcommerce\Http\Controllers\Web;

use Fusion\Http\Controllers\Controller;
use Modules\Bigcommerce\Models\Product;

class StoreController extends Controller
{
    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\View\Factory
     */
    public function index()
    {
        $products = Product::get();

        return view('bigcommerce::store.index', compact('products'));
    }

    public function show($slug)
    {
        $product = Product::with('related', 'images', 'variants', 'options', 'modifiers', 'videos', 'customfields', 'reviews', 'rules')->where('slug', $slug)->firstOrFail();
        $variant = $product->variants()->where('option_id', null)->first();

        return view('bigcommerce::store.show', compact('product', 'variant'));
    }
}
