# Budgeting Web application

PHP-based web application using [Laravel framework](https://laravel.com/) and [AngularJS](https://angularjs.org/).

## Bits and pieces
List of all the packages and their function on this project
### Server-side
These packages are also listed in package.json (Node.js dependencies) and composer.json (PHP dependencies).

*Node.js is installed just to get access to Laravel-Elixir.*

**Laravel** *version 5.1.1*

> Laravel is a web application framework with expressive, elegant syntax. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.

**JWTAuth** *version 0.5.9*

> JSON Web Token authentication for Laravel & Lumen 

>  Why JWT?
  [**Cookies vs Tokens**](https://auth0.com/blog/2014/01/07/angularjs-authentication-with-cookies-vs-token/)

**Laravel-Elixir** *version 3.4.3*

> Laravel Elixir provides a clean, fluent API for defining basic Gulp tasks for your Laravel application.

**Gulp** *version 3.8.8*

> Build system automating tasks: minification and copying of all JavaScript files, static images. More capable of watching files to automatically rerun the task when a file changes.

### Client-side

**AngularJS** *version 1.3.13*

> AngularJS is a structural framework for dynamic web apps.

> Modules
> * angular-resource.js - The ngResource module provides interaction support with RESTful services via the $resource service.
> * angular-route.js - The ngRoute module provides routing and deeplinking services and directives for angular apps.
> * ng-storage.js - The ngStorage module provides access to localStorage and sessionStorage.

**Bootstrap** *version 3.3.2*

> Drag-n-drop package for responsivity (almost).

**jQuery** *version 1.11.2*

> Included because Bootstrap is dependant to it.

## Architecture

![Architecture](http://i.imgur.com/1SminRU.png)

The application is deployed on Heroku, so naturally DB is equivalent to Heroku PQ in this case.

## Class structure

Structure is pretty much defined by Laravel, so there isn't much maneuverability how to make the classes

![Classes](http://i.imgur.com/72WAkSL.png)

Models in the previous image are based on database tables as followed

![ER](http://i.imgur.com/mA9dGGs.png)


Output from *php artisan routes:list* gives us cross-section of the application's internals as which controller method is responsible for which us and so on.

    +--------+--------------------------------+------------------------------------+-------------------------+-------------------------------------------------------------+------------+
    | Domain | Method                         | URI                                | Name                    | Action                                                      | Middleware |
    +--------+--------------------------------+------------------------------------+-------------------------+-------------------------------------------------------------+------------+
    |        | GET|HEAD                       | /                                  |                         | Closure                                                     |            |
    |        | GET|HEAD                       | api/transaction                    | api.transaction.index   | PanamaBudget\Http\Controllers\TransactionController@index   | jwt.auth   |
    |        | POST                           | api/transaction                    | api.transaction.store   | PanamaBudget\Http\Controllers\TransactionController@store   | jwt.auth   |
    |        | GET|HEAD                       | api/transaction/create             | api.transaction.create  | PanamaBudget\Http\Controllers\TransactionController@create  | jwt.auth   |
    |        | GET|HEAD                       | api/transaction/{transaction}      | api.transaction.show    | PanamaBudget\Http\Controllers\TransactionController@show    | jwt.auth   |
    |        | DELETE                         | api/transaction/{transaction}      | api.transaction.destroy | PanamaBudget\Http\Controllers\TransactionController@destroy | jwt.auth   |
    |        | PATCH                          | api/transaction/{transaction}      |                         | PanamaBudget\Http\Controllers\TransactionController@update  | jwt.auth   |
    |        | PUT                            | api/transaction/{transaction}      | api.transaction.update  | PanamaBudget\Http\Controllers\TransactionController@update  | jwt.auth   |
    |        | GET|HEAD                       | api/transaction/{transaction}/edit | api.transaction.edit    | PanamaBudget\Http\Controllers\TransactionController@edit    | jwt.auth   |
    |        | GET|HEAD                       | api/user                           | api.user.index          | PanamaBudget\Http\Controllers\UserController@index          |            |
    |        | POST                           | api/user                           | api.user.store          | PanamaBudget\Http\Controllers\UserController@store          |            |
    |        | GET|HEAD                       | api/user/create                    | api.user.create         | PanamaBudget\Http\Controllers\UserController@create         |            |
    |        | GET|HEAD                       | api/user/getByToken                |                         | PanamaBudget\Http\Controllers\UserController@getByToken     |            |
    |        | POST                           | api/user/login                     |                         | PanamaBudget\Http\Controllers\UserController@login          |            |
    |        | PUT                            | api/user/{user}                    | api.user.update         | PanamaBudget\Http\Controllers\UserController@update         |            |
    |        | DELETE                         | api/user/{user}                    | api.user.destroy        | PanamaBudget\Http\Controllers\UserController@destroy        |            |
    |        | GET|HEAD                       | api/user/{user}                    | api.user.show           | PanamaBudget\Http\Controllers\UserController@show           |            |
    |        | PATCH                          | api/user/{user}                    |                         | PanamaBudget\Http\Controllers\UserController@update         |            |
    |        | GET|HEAD                       | api/user/{user}/edit               | api.user.edit           | PanamaBudget\Http\Controllers\UserController@edit           |            |
    |        | GET|HEAD                       | partials/index                     |                         | Closure                                                     |            |
    |        | GET|HEAD                       | partials/{category}/{action?}      |                         | Closure                                                     |            |
    |        | GET|HEAD                       | partials/{category}/{action}/{id}  |                         | Closure                                                     |            |
    |        | GET|HEAD|POST|PUT|PATCH|DELETE | {undefinedRoute}                   |                         | Closure                                                     |            |
    +--------+--------------------------------+------------------------------------+-------------------------+-------------------------------------------------------------+------------+

jwt.auth middleware is there to check that user is logged in, so non-authorized users can't see any of the transactions.
