# Laravel User Management

Laravel Usermanagement package is smart and flexible way to boost your app development cycle.

## Overview

Simple app which enables user, roles and permisions management for your application. Software Tours Laravel User Management do two things:

1. standardize views for laravel default auth (enables reusage of same code registration from 3 differnet places)
2. removes foreing key restrictions for roles and permissions tables

## Insallation

We recommend instalation of package first on fresh laravel 5.2 app.

- composer require softwaretours/users
- Add service provider in config/app.php

`Bican\Roles\RolesServiceProvider::class,`

`Collective\Html\HtmlServiceProvider::class,`

`SoftwareTours\Users\Providers\UsersProvider::class,`

`App\Repositories\Users\BackendServiceProvider::class,` 

- Add aliases in config/app.php

`'Form' => Collective\Html\FormFacade::class,`

`'Html' => Collective\Html\HtmlFacade::class`

- php artisan vendor:publish —force
- Create new database and set credentials in .env file
- php artisan migrate --seed
- Set writable permision to `public/user` folder

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

## Dependencies

When instaling package, dependencies is automaticly instaled.

Laravel default auth
https://laravel.com/docs/5.2/authentication

Bican permisions and roles package
https://github.com/romanbican/roles

Laravel Collective Forms & Html
https://laravelcollective.com/docs/5.2/html
