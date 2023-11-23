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
    return $router->app->version();
});

$router->get('/api/lagu', 'LaguController@getAllData');
$router->get('/api/lagu/{id}', 'LaguController@getDataById');
$router->post('/api/lagu', 'LaguController@store');
$router->put('/api/lagu/{id}', 'LaguController@update');
$router->delete('/api/lagu/{id}', 'LaguController@destroy');

$router->get('/api/genre', 'GenreController@getAllData');
$router->get('/api/genre/{id}', 'GenreController@getDataById');
$router->post('/api/genre', 'GenreController@store');
$router->put('/api/genre/{id}', 'GenreController@update');
$router->delete('/api/genre/{id}', 'GenreController@destroy');

