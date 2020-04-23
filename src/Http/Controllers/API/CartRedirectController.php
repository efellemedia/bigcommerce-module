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
use Modules\Bigcommerce\Facades\Cart;
use Modules\Bigcommerce\Http\Resources\CartRedirectResource;

class CartRedirectController extends Controller
{
    /**
     * Get current BigCommerce cart.
     *
     * @param  Request  $request
     * @return Response
     */
    public function __invoke(Request $request)
    {
        if ($redirects = Cart::redirects()) {
            return new CartRedirectResource($redirects);
        }

        return response()->json('Cart redirects do not exist.', '404');
    }
}