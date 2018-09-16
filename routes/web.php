<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/


//$router->group(['middleware' => 'ExampleMiddleware'], function () use ($router) {
//    $router->get('/', function () use ($router)    {
//        // Uses Auth Middleware
//        return $router->app->version();
//    });
//
//    $router->get('user/profile', function () use ($router) {
//        // Uses Auth Middleware
//        return $router->app->version();
//    });
//});

//$router->get('/', function () use ($router) {
//    return $router->app->version();
//});

$router->get('/test/{id}', function ($id) {
    if (is_numeric($id)) {
        return "Hi there with id: $id";
    }
    return redirect('/test/');
});

$router->get('/test/', function () {
    return "Wrong api useage!! syntax: /test/{number}";
});

$router->get('name/{name:[A-Za-z]+}', function ($name) { // you can use regex
    return "Your namei is: $name";
});

$router->get('/error', function () {
    return "error";
});

//$router->get('/profile', [
//    'middleware' => 'ExampleMiddleware',
//    'uses' => 'UserController@show'
//]);


// /profile request is wrapped with the example middleware
$router->group(['middleware' => 'example'], function () use ($router) {
    $router->get('/profile', function ()    {
        return "something";
    });
});

// request through UserController 's test method
$router->get('user/test/{id}', 'UserController@test');
