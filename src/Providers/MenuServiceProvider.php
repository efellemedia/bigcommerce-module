<?php

namespace Modules\Bigcommerce\Providers;

use Menu;
use Illuminate\Support\ServiceProvider;

class MenuServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the module services.
     *
     * @return void
     */
    public function boot()
    {
        if (app_installed() && config('app.env') !== 'testing') {
            $this->createAdminNavigation();
        }
    }

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Register the base admin navigation.
     *
     * @return void
     */
    protected function createAdminNavigation()
    {
        $menu = Menu::get('admin');

        $menu->add('BigCommerce')->data([
            'to'    => '/bigcommerce',
            'icon'  => 'shopping-cart'
        ]);

        $menu->bigcommerce->add('Dashboard')->data([
            'to' => '/bigcommerce',
        ]);
        
        $menu->bigcommerce->add('Products')->data([
            'to' => '/bigcommerce/products',
        ]);

        $menu->bigcommerce->add('Categories')->data([
            'to' => '/bigcommerce/categories',
        ]);
    }
}
