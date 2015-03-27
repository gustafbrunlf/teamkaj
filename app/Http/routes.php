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

//Route::get('products', 'ProductsController@index');
//
//Route::get('products/create', 'ProductsController@create');
//
//Route::post('products', 'ProductsController@store');
//
//Route::get('products/pages/{id}','ProductsController@showpages');
//
//Route::get('products/{id}', 'ProductsController@show');

Route::resource('products', 'ProductsController');



Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
