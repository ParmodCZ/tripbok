<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

 // Route::middleware('auth:api')->get('/user', function (Request $request) {
     // return $request->user();
 // });

Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');

Route::group(['middleware' => 'auth:api'], function(){
	Route::get('profile', 'API\UserController@profile');
	Route::post('update/profile', 'API\UserController@updateprofile');
	Route::post('logout', 'API\UserController@logoutApi');
	Route::post('trips-list', 'API\UserController@alltrips');
	Route::post('trips-detail', 'API\UserController@tripdetail');
	Route::post('driver-detail', 'API\UserController@driverdetail');
	Route::post('home', 'API\UserController@nearbyDriver');
	Route::post('tripbook', 'API\UserController@tripBook');
	Route::get('tripbook/{trip_id}', 'API\UserController@confirmDriver');
	Route::post('payment', 'PaymentController@testPayment');
	Route::post('payment/response', 'PaymentController@paymentResponse');
});