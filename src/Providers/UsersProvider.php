<?php

namespace SoftwareTours\Users\Providers;

use Illuminate\Support\ServiceProvider;

class UsersProvider extends ServiceProvider
{

    private function _updateRoutes()
    {
        $pathOrigin = base_path('app/Http/routes.php');
        $pathPackage = __DIR__ . '/../Http/routes.php';

        $routesOrigin = file_get_contents($pathOrigin);
        $routesPackage = file_get_contents($pathPackage);

        $routesPackage = str_replace('<?php', '', $routesPackage);
        $routesPackage = str_replace('<?', '', $routesPackage);
        $routesPackage = str_replace('?>', '', $routesPackage);

        file_put_contents($pathOrigin, $routesOrigin . $routesPackage);
    }

    private function _publish()
    {
        /**
         *  Publish database migrations
         */
        $this->publishes([
            __DIR__ . '/../Database' => base_path('database'),
        ], 'migrations');

        /**
         *  Publish Models
         */

        $this->publishes([
            __DIR__ . '/../Models' => base_path('app/Models'),
        ], 'models');

        /**
         *  Publish Repositories
         */

        $this->publishes([
            __DIR__ . '/../Repositories' => base_path('app/Repositories'),
        ], 'repositories');

        /**
         *  Publish Controllers and Routes
         */

        $this->publishes([
            __DIR__ . '/../Http/Controllers' => base_path('app/Http/Controllers'),
            __DIR__ . '/../Http/Requests' => base_path('app/Http/Requests'),
            __DIR__ . '/../Http/routes.php' => base_path('app/Http/routes.php'),
        ], 'controllers');

        /**
         *  Publish Views
         */

        $this->publishes([
            __DIR__ . '/../Resources/views' => base_path('resources/views'),
        ], 'views');

        /**
         *  Publish Assets
         */

        $this->publishes([
            __DIR__ . '/../Assets' => public_path('assets'),
        ], 'assets');

        /**
         *  Publish Event and Listener with provider
         */

        $this->publishes([
            __DIR__ . '/../Events' => base_path('app/Events'),
            __DIR__ . '/../Listeners' => base_path('app/Listeners'),
            __DIR__ . '/../Providers/EventServiceProvider.php' => base_path('app/Providers/EventServiceProvider.php'),
        ], 'events');

        /**
         *  Publish routes.php
         */

        $this->publishes([
            __DIR__ . '/../Assets' => public_path('assets'),
        ], 'assets');

    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         *  Publish files
         */

        $this->_publish();

        /**
         * Settings
         */

        require_once __DIR__ . '/../Class/PageFormat.php';

        view()->composer('*', function ($view) {

            /**
             *  Get controller name and action
             */
            $action = app('request')->route()->getAction();
            $controller = class_basename($action['controller']);
            list($controller, $action) = explode('@', $controller);
            $user = \Auth::user();

            $view->with(compact('controller', 'action', 'user'));


        });


    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
