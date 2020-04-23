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

use Illuminate\Http\Request;
use Fusion\Http\Controllers\Controller;

class CartController extends Controller
{
    /**
     * Show the current users cart.
     *
     * @return \Illuminate\View\Factory
     */
    public function index()
    {
        $customer  = auth()->user()->customer ?? null;
        $cart      = fusion()->get('bigcommerce/carts')->data ?? null;

        return view('bigcommerce::cart.index', compact('cart', 'customer'));
    }

    /**
     * Store a new line item in the cart.
     * 
     * @return \Illuminate\Http\Response;
     */
    public function store(Request $request)
    {
        $response = fusion()->post('bigcommerce/carts', [
            'line_items' => $request->get('line_items'),
        ]);
        
        return redirect('cart');
    }

    public function destroy(Request $request, $item)
    {
        $response = fusion()->delete('bigcommerce/carts/'.$item);

        return redirect('cart');
    }
}