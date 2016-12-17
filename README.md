# Laravel User Management

Laravel Usermanagement package is smart and flexible way to boost your app development cycle.

## Overview

 * Uses Laravel default auth system and Bical Roles and Permissions package
 * Full user management with roles and permissions (Crud)

## Insallation

We recommend instalation of package first on fresh laravel 5.2 app.

 1. composer require softwaretours/users
 2. Register providers in your config/app.php
    SoftwareTours\Users\Providers\UsersProvider::class,
 3. php artisan vendor:publish --force
