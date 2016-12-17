# Laravel User Management

Laravel Usermanagement package is smart and flexible way to boost your app development cycle.

## Overview

 * Load default migrations and create tables and inital data
 * Laravel default auth system
 * Full user management (Crud)
 * User permission and roles

## Insallation

We recommend instalation of package first on fresh laravel 5.2 app.

 1. composer require softwaretours/users
 2. Register providers in your config/app.php
    SoftwareTours\Lum\Providers\LumProvider::class,
 3. php artisan vendor:publish --force
