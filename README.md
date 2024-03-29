<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
  <a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# CRUD with Built-in Authentication Laravel

## Demo Video
https://www.youtube.com/watch?v=hyhPdOhBLe4

## Key Features
- Built-in Authentication with Laravel Breeze Blade component package.
- Customized Frontend for Login, Registration, Forgot Password, and Reset Password Pages.
- Uses Mailtrap.io for forgot and reset password functionalities.
- CRUD operations for all tables in the schema (including join tables).
- Handles filters and pagination through query strings.

## Table of Contents
- [Routes](#routes)
- [Controllers](#controllers)
- [Models](#models)
- [Database Schema](#database-schema)
- [Installation](#installation)

## Routes
#### Authentication Routes
- Built-in Laravel authentication using the Laravel Breeze package.
You need to install this package using Composer.

- How to use Built-in Laravel authentication with customized login and registration pages?
The answer is at the end of this document.

#### Cars Routes (Resource Controller)
#### Manufacturers Routes (Resource Controller)
#### Vehicle Types Routes (Resource Controller)
- Run `php artisan:route list` to view all the routes with their names and methods. A snapshot is included in the README in the repo.

## Controllers
#### CarsController
- Manages car-related operations, including listing, creating, updating, and deleting cars.
- index function is handling the filteration model request passed through query string. While rest of functions are quite simple.

#### ManufacturersController
- Manages manufacturer-related operations, including listing, creating, updating, and deleting manufacturers.

#### TypesController
- Manages vehicle type-related operations, including listing, creating, updating, and deleting vehicle types.

## Models
#### Car Model
- Represents car data and relationships.
- Contains public functions for using ORM with manufacturers and vehicle types.
- Fields: `owner`, `manufacturer_id`, `type_id`, `price`.

#### Manufacturer Model
- Represents car manufacturer data.
- Contains a public function for using ORM (hasMany) with cars.
- Fields: `manufacturer_name`.

#### Type Model
- Represents vehicle type data.
- Contains a public function for using ORM (hasMany) with cars.
- Fields: `vehicle_name`.

## Database Schema
**Cars**
- Fields: `id`, `owner`, `manufacturer_id (foreign key)`, `type_id (foreign key)`, `price`.

**Manufacturers**
- Fields: `id`, `manufacturer_name`.

**Types**
- Fields: `id`, `vehicle_name`.

## Installation
1. Clone the repository.
2. Configure your environment variables if required.
3. Install the Laravel Breeze package for Built-in Authentication.
4. Run migrations and seed the database.
 `php artisan migrate`
`php artisan db:seed`



## Views
- Cars
    - create.blade
    - deletepage.blade
    - index.blade (main page you will hit after login)
    - edit.blade
- carslayout
     - header.blade.php
     - sidebar.blade.php
    - layout.blade.php

- Manufacturers (Same as Cars blade)
- Vehicles (Same as Cars blade)
- Auth (Built-in)
    - Login.blade.php
    - register.blade.php
    - forgot.blade.php
    - reset.blade.php

## Use of Mailtrap.io
For sending emails to users in case of forgotten passwords.

## Passing Filters Query
Passing filters query inside query string and handling them in the index method of CarsController.

## Customizing Login and Registration Pages with Built-in Auth
In your login or registration pages, change the form submit action (basically changing the routes) and ensure that the name and other attributes of input fields in your form match those in the built-in pages.

## Author
[Nouman Yousaf]
