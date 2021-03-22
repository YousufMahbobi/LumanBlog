<?php

/** @var \Laravel\Lumen\Routing\Router $router */

namespace App\Http\Controllers;

use App\Http\Controllers\PostsController;

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

$router->get('/', function ()  {
    return view('index');
});

$router->group(['prefix' => 'api/v1'], function () use ($router) 
{
    // Post Routes
    $router->group(['prefix' => 'posts', 'middleware' => 'auth'], function () use ($router)
    {
        
        $router->post('add', 'PostsController@createPost');

        $router->put('edit/{id}', 'PostsController@updatePost');

        $router->delete('delete/{id}', 'PostsController@deletePost');

        $router->get('index', 'PostsController@index');

        $router->get('view/{id}', 'PostsController@viewPost');
     
    });

    // User Routes
    $router->group(['prefix' => 'users'], function () use ($router)
    {
        $router->post('add', 'UserController@add');

        $router->put('edit/{id}', 'UserController@update');

        $router->delete('delete/{id}', 'UserController@delete');

        $router->get('index', 'UserController@index');

        $router->get('view/{id}', 'UserController@view');
    });

});

