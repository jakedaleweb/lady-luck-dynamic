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
Route::get('edit/menu/{id}', 'AdminController@editMenu');
Route::post('edit/menu/{id}', 'AdminController@editMenu');
Route::get('delete/menu/{id}', 'AdminController@deleteMenu');

Route::get('catering', 'PagesController@catering');
Route::get('catering/empty', 'CateringController@deleteCart');
Route::get('catering/checkout', 'CateringController@checkout');
Route::post('catering', 'CateringController@cartFunctions');
Route::post('catering/checkout', 'CateringController@processCaterForm');
Route::get('catering/checkout/success', 'CateringController@successOrder');

Route::get('merch', 'PagesController@merch');
Route::get('merch/{id}', 'MerchController@showItem');


Route::get('locations', 'PagesController@locations');
Route::get('getLocations', 'PagesController@getLocations');

Route::get('contact', 'PagesController@contact');

Route::get('adminLogin', 'PagesController@admin');
Route::post('adminLogin', 'AdminController@verifyLogin');
Route::get('admin', 'AdminController@show');
Route::get('logout', 'AdminController@logout');
// Route::controllers([
// 	'auth' => 'Auth\AuthController',
// 	'password' => 'Auth\PasswordController',
// ]);
