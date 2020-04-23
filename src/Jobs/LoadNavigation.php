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
                'to'    => '/bigcommerce/products',
                'icon'  => 'shopping-cart'
            ]);
        }
    }
}
