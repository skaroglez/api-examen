<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Administration\CapturistsService;

class CapturistsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CapturistsService::class, function ($app) {
            return new CapturistsService();
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
