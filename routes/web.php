<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->get('/', function () use ($router) {
    return response("Bad Request", 400);
});

/**
 * Task API Requests 
 */

$router->get('/tasks',           'TaskController@index');
$router->post('/tasks',          'TaskController@create');
$router->get('/tasks/{task}',    'TaskController@show');
$router->patch('/tasks/{task}',  'TaskController@update');
$router->delete('/tasks/{task}', 'TaskController@destroy');
