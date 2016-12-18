# Laravel User Management

Laravel Usermanagement package is smart and flexible way to boost your app development cycle.

## Overview

Simple app which enables user, roles and permisions management for your application. Software Tours Laravel User Management do two things:

1. standardize views for laravel default auth (enables reusage of same code registration from 3 differnet places)
2. removes foreing key restrictions for roles and permissions tables

## Insallation

We recommend instalation of package first on fresh laravel 5.2 app.

1. composer require softwaretours/users
2. Add service provider in config/app.php
Bican\Roles\RolesServiceProvider::class,
Collective\Html\HtmlServiceProvider::class,
SoftwareTours\Users\Providers\UsersProvider::class,
App\Repositories\Users\BackendServiceProvider::class,    
3. Add aliases in config/app.php
'Form' => Collective\Html\FormFacade::class,
'Html' => Collective\Html\HtmlFacade::class
4. php artisan vendor:publish —force
5. Create new database and set credentials in .env file
6. php artisan migrate --seed

NOTE: When you run php artisan vendor:publish it overrides app/http/routes.php file and copies:

- Overrides /app/http/routes.php
- Database migrations (removes foreing key restrictions for bican package)
- Models
- Repositories
- Controles
- Models
- Views
- Assets (css, img, and js files for html layout)
- Event and Listener with provider

Happy coding :)
