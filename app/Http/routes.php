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

Route::get('/', function() {
	return view('auth/login');
})->name('/');

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::get('auth/confirm/email/{email}/confirm_token/{confirm_token}', 'Auth\AuthController@confirmRegister');
Route::put('auth/changePassword', 'Auth\AuthController@changePassword')->name('auth/changePassword');
Route::group(['middleware' => 'auth'], function () {
	Route::resource('clients', 'Clients\ClientController');
	Route::resource('telemarketing', 'Telemarketing\TelemarketingController');
	Route::resource('sales', 'Sales\SalesController');
	Route::resource('calls', 'Calls\CallsController');
	Route::resource('dates', 'Dates\DatesController');
});
Route::get('/home', [
    'middleware' => 'auth',
    'uses' => 'PrincipalController@getRole'
]);
Route::get('auth/login', function() {
		return view('auth/login', ['message' => 'Datos Incorrectos. Intente Nuevamente']);
});







