<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


/*
|--------------------------------------------------------------------------
| Rutas para el controlador auth
|--------------------------------------------------------------------------
|
*/
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

/*
|--------------------------------------------------------------------------
| Rutas MessageController
|--------------------------------------------------------------------------
|
| Aqui se encuentras las rutas para el controlador  MessageController
|
*/
Route::post('/addPost', 'Message\MessageController@store');

Route::post('/showPost', 'Message\MessageController@show');


//Route::get('/editPost/{id}', 'Message\MessageController@edit');
Route::post('/editPost/{id}', 'Message\MessageController@edit');
Route::post('/updatePost', 'Message\MessageController@update');





Route::post('/deletPost/{id}', 'Message\MessageController@destroy');


