<?php

/*
 * This file is part of the FusionCMS application.
 *
 * (c) efelle creative <appdev@efelle.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Modules\Bigcommerce\Providers;

use Modules\Bigcommerce\Support\Cart;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use Modules\Bigcommerce\Support\Customer;

class SupportServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton('bigcommerce_cart', function ($app) {
            return $this->app->make(Cart::class);
        });

        $this->app->singleton('bigcommerce_customer', function ($app) {
            return $this->app->make(Customer::class);
        });

        AliasLoader::getInstance()->alias('bigcommerce_cart', Cart::class);
        AliasLoader::getInstance()->alias('bigcommerce_customer', Customer::class);
    }
}
