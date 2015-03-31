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

Route::get('/', 'PagesController@index');

Route::get('home', 'PagesController@index');

Route::get('menu', 'PagesController@menu');
Route::get('menu/{type}', 'MenuController@displayType');

Route::get('catering', 'PagesController@catering');
Route::post('catering', 'CateringController@addToCart');

Route::get('merch', 'PagesController@merch');

Route::get('locations', 'PagesController@locations');

// Route::controllers([
// 	'auth' => 'Auth\AuthController',
// 	'password' => 'Auth\PasswordController',
// ]);
