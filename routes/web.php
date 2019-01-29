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

// $router->get('/', function () use ($router) {
//     return $router->app->version();
// });


// A priori, on aurait 5 routes à créer dans un premier temps

$router->get('/', [
    'uses' => 'MainController@home', 
    'as' => 'home'
]);

$router->get('/quizz/{id}', [
    'uses' => 'QuizController@quizz', 
    'as' => 'quizz'
]);

$router->post('/quizz/{id}', [
    'uses' => 'QuizController@quizz', 
    'as' => 'quizz'
]);

$router->get('/signup', [
    'uses' => 'UserController@signup', 
    'as' => 'signup'
]);

$router->post('/signup', [
    'uses' => 'UserController@signup', 
    'as' => 'signup'
]);

$router->get('/signin', [
    'uses' => 'UserController@signin', 
    'as' => 'signin'
]);

$router->post('/signin', [
    'uses' => 'UserController@signin', 
    'as' => 'signin'
]);

$router->get('/logout', [
    'uses' => 'UserController@logout', 
    'as' => 'logout'
]);
