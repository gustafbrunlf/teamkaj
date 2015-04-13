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


use Illuminate\Support\Facades\Auth;

Route::get('/', 'ProductsController@index');

Route::get('home', 'HomeController@index');


//Route::get('superadmin/createadmin', 'AdminController@create');
//
//Route::delete('superadmin/{id}', 'AdminController@destroy');
//
//Route::patch('superadmin/{id}', 'AdminController@update');
//
//Route::get('superadmin/{id}/edit', 'AdminController@edit');
//
//Route::get('superadmin','AdminController@index');
//
//Route::post('superadmin', 'AdminController@store');

Route::get('superadmin/deleteadmin/{slug}', 'AdminController@deleteadmin');

Route::resource('superadmin', 'AdminController');

// Route::get('products', 'ProductsController@index');

// Route::get('products/create', 'ProductsController@create');

// Route::post('products', 'ProductsController@store');

// Route::get('products/pages/{slug}','ProductsController@showpages');

// Route::get('products/{slug}/edit', 'ProductsController@edit');

// Route::patch('products/{slug}', 'ProductsController@update');

// Route::get('products/{slug}', 'ProductsController@show');

// Route::delete('products/{slug}', 'ProductsController@destroy');

Route::get('products/deleteproduct/{slug}', 'ProductsController@deleteproduct');

Route::resource('products', 'ProductsController');

// Route::get('category/{slug}', 'CategoriesController@show');

Route::get('categories/deletecategory/{slug}', 'CategoriesController@deletecategory');

Route::resource('categories', 'CategoriesController');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Event::listen('auth.login', function($event)
{
    Auth::user()->last_login = new DateTime;
    Auth::user()->save();
});