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
	//media upload using ajax
	Route::Group(['prefix'=>'media'], function() {
		Route::post('/add', 'MediaController@add')->name('ajax_media_index');
	});
	//vehicles
	Route::Group(['prefix'=>'vehicles'], function() {
		Route::get('/index', 'VehiclesController@index')->name('get_vehicles_index');
		Route::post('/indexing', 'VehiclesController@index_ajax')->name('ajax_vehicles_index');
		Route::get('/add', 'VehiclesController@add')->name('get_add_vehicles');
		Route::post('/add', 'VehiclesController@add')->name('post_add_vehicles');
		Route::get('/edit/{id}', 'VehiclesController@edit')->name('get_edit_vehicles');
		Route::post('/edit/{id}', 'VehiclesController@edit')->name('post_edit_vehicles');
	});
	//drivers
	Route::Group(['prefix'=>'drivers'], function() {
		Route::get('/index', 'DriverController@index')->name('get_vehicles_index');
		Route::post('/indexing', 'DriverController@index_ajax')->name('ajax_vehicles_index');
		Route::get('/add', 'DriverController@add')->name('get_add_vehicles');
		Route::post('/add', 'DriverController@add')->name('post_add_vehicles');
		Route::get('/edit/{id}', 'DriverController@edit')->name('get_edit_vehicles');
		Route::post('/edit/{id}', 'DriverController@edit')->name('post_edit_vehicles');
	});
	//trips
	Route::Group(['prefix'=>'trips'], function() {
		Route::get('/index', 'TripController@index')->name('get_vehicles_index');
		Route::post('/indexing', 'TripController@index_ajax')->name('ajax_vehicles_index');
		Route::get('/add', 'TripController@add')->name('get_add_vehicles');
		Route::post('/add', 'TripController@add')->name('post_add_vehicles');
		Route::get('/edit/{id}', 'TripController@edit')->name('get_edit_vehicles');
		Route::post('/edit/{id}', 'TripController@edit')->name('post_edit_vehicles');
	});


});

