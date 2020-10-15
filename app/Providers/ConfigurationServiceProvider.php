<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Configuracion\MenuService;
use App\Services\Configuracion\ModuleService;
use App\Services\Configuracion\StatusService;

class ConfigurationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(MenuService::class, function ($app) {
            return new MenuService();
        });

        $this->app->bind(ModuleService::class, function($app){
            return new ModuleService();
        });

        $this->app->bind(StatusService::class, function($app){
            return new StatusService();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
