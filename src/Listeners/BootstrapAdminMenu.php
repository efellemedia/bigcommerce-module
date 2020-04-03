<?php

namespace Modules\Bigcommerce\Listeners;

use Menu;
use Exception;
use App\Events\ServingFusion;
use Illuminate\Support\Facades\Log;

class BootstrapAdminMenu
{
    /**
     * Handle the event.
     *
     * @param  ServingFusion $event
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

    /**
     * Handle a job failure.
     *
     * @param  ServingFusion $event
     * @param  Exception     $exception
     * @return void
     */
    public function failed(ServingFusion $event, Exception $exception)
    {
        Log::error('[Event Listener]', [
            'event'   => __CLASS__,
            'message' => $exception->getMessage()
        ]);
    }
}