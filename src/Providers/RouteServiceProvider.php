<?php

namespace Modules\Bigcommerce\Providers;

use Illuminate\Support\Facades\Route;
use Modules\Bigcommerce\Http\Middleware\CartInteraction;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'Modules\Bigcommerce\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the module.
     *
     * @return void
     */
    public function map()
    {
        $this->mapDatatableRoutes();
        $this->mapWebRoutes();
        $this->mapApiRoutes();
    }

    /**
     * Define the "datatable" routes for the module.
     *
     * @return void
     */
    protected function mapDatatableRoutes()
    {
        Route::group([
            'middleware' => 'api',
            'namespace'  => $this->namespace . '\DataTable',
            'prefix'     => 'datatable',
        ], function ($router) {
            require module_path('bigcommerce', 'routes/datatable.php', 'modules');
        });
    }

    /**
     * Define the "web" routes for the module.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::group([
            'middleware' => 'web',
            'namespace'  => $this->namespace . '\Web',
        ], function ($router) {
            require module_path('bigcommerce', 'routes/web.php', 'modules');
        });
    }

    /**
     * Define the "api" routes for the module.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::group([
            'middleware' => 'api',
            'namespace'  => $this->namespace . '\API',
            'prefix'     => 'api',
        ], function ($router) {
            require module_path('bigcommerce', 'routes/api.php', 'modules');
        });
    }
}
