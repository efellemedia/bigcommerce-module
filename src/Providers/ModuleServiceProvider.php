<?php

namespace Modules\Bigcommerce\Providers;

use Menu;
use Bonsai;
use Fusion\Models\User;
use Modules\Bigcommerce\Jobs\Requestor;
use Modules\Bigcommerce\Models\Customer;
use Caffeinated\Modules\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the module services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(module_path('bigcommerce', 'resources/lang', 'modules'), 'bigcommerce');
        $this->loadViewsFrom(module_path('bigcommerce', 'resources/views', 'modules'), 'bigcommerce');
        $this->loadMigrationsFrom(module_path('bigcommerce', 'database/migrations', 'modules'), 'bigcommerce');
        $this->loadConfigsFrom(module_path('bigcommerce', 'config', 'modules'));
        $this->loadFactoriesFrom(module_path('bigcommerce', 'database/factories', 'modules'));

        Bonsai::add('/modules/bigcommerce/css/bigcommerce.css');
        Bonsai::add('/modules/bigcommerce/js/bigcommerce.js');
    }

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(CommandServiceProvider::class);
        $this->app->register(EventServiceProvider::class);
        $this->app->register(SupportServiceProvider::class);
        $this->app->register(RouteServiceProvider::class);

        User::addRelationship('customer', function(User $user) {
            return $user->hasOne(Customer::class);
        });

        $this->app->singleton('requestor', function ($app) {
            return new Requestor;
        });
    }
}
