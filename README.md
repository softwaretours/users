# Laravel User Management

Laravel User Management package is smart and flexible way to boost your app development cycle.

## Overview

Simple app which enables user, roles and permissions management for your application. Software Tours Laravel User Management do two things:

1. standardize views for laravel default auth (enabled reuse of same code registration from 3 different places)
2. remove foreign key restrictions for roles and permissions tables

## Insallation

We recommend installation of package first on fresh laravel 5.2 app.

- composer require softwaretours/users
- Add service provider in config/app.php

`Bican\Roles\RolesServiceProvider::class,`

`Collective\Html\HtmlServiceProvider::class,`

`SoftwareTours\Users\Providers\UsersProvider::class,`

- Add aliases in config/app.php

`'Form' => Collective\Html\FormFacade::class,`

`'Html' => Collective\Html\HtmlFacade::class,`

- php artisan vendor:publish --force
- Add service provider in config/app.php

`App\Repositories\Users\BackendServiceProvider::class,` 

- composer dump-autoload
- Create new database and set credentials in .env file
- php artisan migrate --seed
- Set writable permission to `public/user` folder

---

We recommend setting `bootstrap` and `storage` folders permission after installation.

NOTE: When you run php artisan vendor:publish it do following commands:

- Overrides /app/http/routes.php
- Database migrations (remove foreign key restrictions for bican package)
- Models
- Repositories
- Controles
- Models
- Views
- Assets (css, img, and js files for html layout)
- Event, Listener and EventProvider

## Dependencies

Laravel User Management is build on top of Laravel default auth https://laravel.com/docs/5.2/authentication. It uses 2 package for adding User Management CRUD functionality.

Dependencies is automatically required and installed by composer.json.

1. Bican permisions and roles package
https://github.com/romanbican/roles

2. Laravel Collective Forms & Html
https://laravelcollective.com/docs/5.2/html

## Credentials

Username: `app@software.tours`

Password: `app`

### TODO

Create composer `post-update-cmd` which updates and publish entire package all except views: layout, nav, footer and dashboard. (https://getcomposer.org/doc/articles/scripts.md).
