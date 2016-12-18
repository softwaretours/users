<?php


namespace App\Repositories\Users\Permissions;

use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('App\Repositories\Users\Permissions\PermissionInterface', 'App\Repositories\Users\Permissions\PermissionRepository');
    }
}