# Laravel User Management

Laravel Usermanagement package is smart and flexible way to boost your app development cycle.

## Overview

Simple app which enables user, roles and permisions management for your application. Software Tours Laravel User Management do two things:

1.0 standardize views for laravel default auth (enables reusage of same code registration from 3 differnet places)
2.0 removes foreing key restrictions for roles and permissions tables

## Insallation

We recommend instalation of package first on fresh laravel 5.2 app.

3.0 composer require softwaretours/users
4.0 Add service provider in config/app.php

`Bican\Roles\RolesServiceProvider::class,`

`Collective\Html\HtmlServiceProvider::class,`

`SoftwareTours\Users\Providers\UsersProvider::class,`

`App\Repositories\Users\BackendServiceProvider::class,` 

4.1 Add aliases in config/app.php

`'Form' => Collective\Html\FormFacade::class,`

`'Html' => Collective\Html\HtmlFacade::class`

5.0 php artisan vendor:publish —force
6.0 Create new database and set credentials in .env file
7.0 php artisan migrate --seed

NOTE: When you run php artisan vendor:publish it do following commands:

- Overrides /app/http/routes.php
- Database migrations (removes foreing key restrictions for bican package)
- Models
- Repositories
- Controles
- Models
- Views
- Assets (css, img, and js files for html layout)
- Event and Listener with provider


