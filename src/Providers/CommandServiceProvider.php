<?php

namespace Modules\Bigcommerce\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Bigcommerce\Console\Commands\Sync;
use Modules\Bigcommerce\Console\Commands\Reset;
use Modules\Bigcommerce\Console\Commands\Refresh;
use Modules\Bigcommerce\Console\Commands\Webhooks;

class CommandServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('module.bigcommerce.sync', function ($app) {
            return new Sync;
        });

        $this->app->singleton('module.bigcommerce.refresh', function ($app) {
            return new Refresh;
        });

        $this->app->singleton('module.bigcommerce.reset', function ($app) {
            return new Reset;
        });

        $this->app->singleton('module.bigcommerce.webhooks', function ($app) {
            return new Webhooks;
        });
        
        $this->commands(['module.bigcommerce.sync']);
        $this->commands(['module.bigcommerce.refresh']);
        $this->commands(['module.bigcommerce.reset']);
        $this->commands(['module.bigcommerce.webhooks']);
    }
}