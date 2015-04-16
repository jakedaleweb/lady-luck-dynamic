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

Route::get('/', 						'PagesController@index');

Route::get('home', 						'PagesController@index');

Route::get('menu', 						'PagesController@menu');
Route::get('menu/{type}', 				'MenuController@displayType');
Route::get('edit/menu/{id}', 			'AdminController@showEditMenu');
Route::post('edit/menu/{id}', 			'AdminController@editMenu');
Route::get('delete/menu/{id}', 			'AdminController@deleteMenu');
Route::get('add/menu', 					'AdminController@showAddMenu');
Route::post('add/menu', 				'AdminController@addMenu');

Route::get('catering', 					'PagesController@catering');
Route::get('catering/empty', 			'CateringController@deleteCart');
Route::get('catering/checkout', 		'CateringController@checkout');
Route::post('catering', 				'CateringController@cartFunctions');
Route::post('catering/checkout', 		'CateringController@processCaterForm');
Route::get('catering/checkout/success', 'CateringController@successOrder');
Route::get('catering/checkout/error', 	'CateringController@failOrder');

Route::get('merch', 					'PagesController@merch');
Route::get('merch/{id}', 				'MerchController@showItem');
Route::get('edit/merch/{id}', 			'AdminController@showEditMerch');
Route::post('edit/merch/{id}', 			'AdminController@editMerch');
Route::get('delete/merch/{id}', 		'AdminController@deleteMerch');
Route::get('add/merch', 				'AdminController@showAddMerch');
Route::post('add/merch', 				'AdminController@addMerch');


Route::get('locations', 				'PagesController@locations');
Route::get('getLocations', 				'PagesController@getLocations');
Route::get('edit/location/{id}', 		'AdminController@showEditLocation');
Route::post('edit/location/{id}', 		'AdminController@editLocation');
Route::get('delete/location/{id}', 		'AdminController@deleteLocation');
Route::get('add/location', 				'AdminController@showAddLocation');
Route::post('add/location', 			'AdminController@addLocation');

Route::get('contact', 					'PagesController@contact');
Route::get('edit/contact/{id}', 		'AdminController@showEditContact');
Route::post('edit/contact/{id}', 		['as' => 'contact.edit', 'uses' => 'AdminController@editContact']);
Route::get('delete/contact/{id}', 		'AdminController@deleteContact');
Route::get('add/contact', 				'AdminController@showAddContact');
Route::post('add/contact', 				'AdminController@addContact');

Route::get('orders', 					'AdminController@orders');
Route::get('orders/{id}', 				'AdminController@order');

Route::get('adminLogin', 				'PagesController@admin');
Route::post('adminLogin', 				'AdminController@verifyLogin');
Route::get('admin', 					'AdminController@show');
Route::get('logout', 					'AdminController@logout');
// Route::controllers([
// 	'auth' => 'Auth\AuthController',
// 	'password' => 'Auth\PasswordController',
// ]);
