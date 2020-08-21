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

$router->group(['prefix' => '/api_v1'], function () use ($router) {
  $router->group(['prefix' => '/livros'], function () use ($router) {
    $router->get('/', 'BooksController@list');
    $router->get('/{id}', 'BooksController@show');
    $router->post('/', 'BooksController@create');
    $router->put('/{id}', 'BooksController@edit');
    $router->delete('/{id}', 'BooksController@delete');
  });

  $router->group(['prefix' => '/generos'], function () use ($router) {
    $router->get('/', 'GenresController@list');
    $router->get('/{id}', 'GenresController@show');
    $router->post('/', 'GenresController@create');
    $router->put('/{id}', 'GenresController@edit');
    $router->delete('/{id}', 'GenresController@delete');
  });

  $router->group(['prefix' => '/autores'], function () use ($router) {
    $router->get('/', 'AuthorsController@list');
    $router->get('/{id}', 'AuthorsController@show');
    $router->post('/', 'AuthorsController@create');
    $router->put('/{id}', 'AuthorsController@edit');
    $router->delete('/{id}', 'AuthorsController@delete');
  });

  $router->group(['prefix' => '/editoras'], function () use ($router) {
    $router->get('/', 'PublishingHousesController@list');
    $router->get('/{id}', 'PublishingHousesController@show');
    $router->post('/', 'PublishingHousesController@create');
    $router->put('/{id}', 'PublishingHousesController@edit');
    $router->delete('/{id}', 'PublishingHousesController@delete');
  });
});
