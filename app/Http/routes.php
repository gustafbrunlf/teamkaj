<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|auth
*/


use Illuminate\Support\Facades\Auth;

Route::get('/', 'ProductsController@index');

Route::get('home', 'ProductsController@index');

Route::get('superadmin/deleteadmin/{slug}', 'AdminController@deleteadmin');


Route::resource('superadmin', 'AdminController');

Route::post('sort', 'ProductsController@index');

Route::post('products/overview', 'ProductsController@overview');

Route::get('products/deleteproduct/{slug}', 'ProductsController@deleteproduct');

Route::get('products/overview', 'ProductsController@overview');

Route::resource('products', 'ProductsController');

Route::get('categories/deletecategory/{slug}', 'CategoriesController@deletecategory');

Route::post('categories/{slug}', 'CategoriesController@show');

Route::resource('categories', 'CategoriesController');

// Route::get('productspublishDashboard', 'ProductsController@showPublishDashboard');
// Route::patch('productspublishDashboard', 'ProductsController@updatePublishDashboard');
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get("passwords/reset","Auth\PasswordController@postEmail");

Event::listen('auth.login', function($event)
{
    Auth::user()->last_login = new DateTime;
    Auth::user()->save();
});