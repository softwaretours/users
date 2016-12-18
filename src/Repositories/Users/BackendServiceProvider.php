<?php


namespace App\Repositories\Users;

use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('App\Repositories\Users\UserInterface', 'App\Repositories\Users\UserRepository');
    }
}