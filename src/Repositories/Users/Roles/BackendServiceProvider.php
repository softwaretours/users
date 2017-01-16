<?php


namespace App\Repositories\Users\Roles;

use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('App\Repositories\Users\Roles\RolesInterface', 'App\Repositories\Users\Roles\RolesRepository');
    }
}