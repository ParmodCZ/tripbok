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
	//media upload using DropZone
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
		Route::post('/delete', 'VehiclesController@delete')->name('post_delete_vehicles');
	});
	//drivers
	Route::Group(['prefix'=>'drivers'], function() {
		Route::get('/index', 'DriverController@index')->name('get_vehicles_index');
		Route::post('indexing', 'DriverController@index_ajax')->name('ajax_vehicles_index');
		Route::get('/add', 'DriverController@add')->name('get_add_vehicles');
		Route::post('/add', 'DriverController@add')->name('post_add_vehicles');
		Route::get('/edit/{id}', 'DriverController@edit')->name('get_edit_vehicles');
		Route::post('/edit/{id}', 'DriverController@edit')->name('post_edit_vehicles');
		Route::post('/delete', 'DriverController@delete')->name('post_delete_drivers');
	});
	//trips
	Route::Group(['prefix'=>'trips'], function() {
		Route::get('/index', 'TripController@index')->name('get_vehicles_index');
		Route::post('/indexing', 'TripController@index_ajax')->name('ajax_vehicles_index');
		Route::get('/add', 'TripController@add')->name('get_add_vehicles');
		Route::post('/add', 'TripController@add')->name('post_add_vehicles');
		Route::get('/edit/{id}', 'TripController@edit')->name('get_edit_vehicles');
		Route::post('/edit/{id}', 'TripController@edit')->name('post_edit_vehicles');
		Route::post('/delete', 'TripController@delete')->name('post_delete_trips');
	});
	//mails
	Route::Group(['prefix'=>'mails'], function() {
		Route::get('/composer', 'MailController@send')->name('get_send_mail');
		Route::post('/composer', 'MailController@send')->name('post_send_mail');
		Route::get('/add', 'MailController@add')->name('get_add_vehicles');
		Route::post('/add', 'MailController@add')->name('post_add_vehicles');
		Route::get('/sent', 'MailController@sent')->name('get_sent_mails');
		Route::post('/sent', 'MailController@sent_ajax')->name('ajax_sent_mails');
		Route::post('/delete', 'MailController@delete')->name('post_delete_mails');
	});
	//fares
	Route::Group(['prefix'=>'fares'], function() {
		Route::get('/index', 'FaresController@index')->name('get_vehicles_index');
		Route::post('/indexing', 'FaresController@index_ajax')->name('ajax_vehicles_index');
		Route::get('/add', 'FaresController@add')->name('get_add_vehicles');
		Route::post('/add', 'FaresController@add')->name('post_add_vehicles');
		Route::get('/edit/{id}', 'FaresController@edit')->name('get_edit_vehicles');
		Route::post('/edit/{id}', 'FaresController@edit')->name('post_edit_vehicles');
		Route::post('/delete', 'FaresController@delete')->name('post_delete_fares');
	});
	//coupons
	Route::Group(['prefix'=>'coupons'], function() {
		Route::get('/index', 'CouponController@index')->name('get_coupons_index');
		Route::post('/indexing', 'CouponController@index_ajax')->name('ajax_coupons_index');
		Route::get('/add', 'CouponController@add')->name('get_add_coupons');
		Route::post('/add', 'CouponController@add')->name('post_add_coupons');
		Route::get('/edit/{id}', 'CouponController@edit')->name('get_edit_coupons');
		Route::post('/edit/{id}', 'CouponController@edit')->name('post_edit_coupons');
		Route::post('/delete', 'CouponController@delete')->name('post_delete_coupons');
	});
	//passengers
	Route::Group(['prefix'=>'passengers'], function() {
		Route::get('/index', 'PassengerController@index')->name('get_passengers_index');
		Route::post('/indexing', 'PassengerController@index_ajax')->name('ajax_passengers_index');
		Route::get('/add', 'PassengerController@add')->name('get_add_passengers');
		Route::post('/add', 'PassengerController@add')->name('post_add_passengers');
		Route::get('/edit/{id}', 'PassengerController@edit')->name('get_edit_passengers');
		Route::post('/edit/{id}', 'PassengerController@edit')->name('post_edit_passengers');
		Route::post('/delete', 'PassengerController@delete')->name('post_delete_passengers');
	});


});

