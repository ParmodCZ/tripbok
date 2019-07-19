<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::Group(['prefix'=>'admin'], function() {
	Route::get('/', 'HomeController@index')->name('admin');

	Route::Group(['prefix'=>'vehicles'], function() {
		Route::get('/add', 'VehiclesController@add')->name('get_add_vehicles');
		Route::post('/add', 'VehiclesController@add')->name('post_add_vehicles');
	});





});

