<?php

namespace Modules\Bigcommerce\Jobs;

use Menu;
use Illuminate\Foundation\Bus\Dispatchable;

class LoadNavigation
{
    use Dispatchable;

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if ($menu = Menu::get('admin')) {
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
}
