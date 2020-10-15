<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Administration\UsersServices;
use App\Services\Administration\RoleService;
use App\Services\Administration\UserService;

class AdministrationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UsersServices::class, function($app){
            return new UsersServices();
        });

        $this->app->bind(RoleService::class, function($app){
            return new RoleService();
        });

        $this->app->bind(UserService::class, function($app){
            return new UserService();
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
