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

Route::get('/', 'PrincipalController@index')->name('/');

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::get('auth/confirm/email/{email}/confirm_token/{confirm_token}', 'Auth\AuthController@confirmRegister');
Route::put('auth/changePassword', 'Auth\AuthController@changePassword')->name('auth/changePassword');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('clients', 'Clients\ClientController');
	Route::resource('telemarketing', 'Telemarketing\TelemarketingController');
	Route::get('/principal/getOut', 'PrincipalController@getOut');
	Route::get('telemarketingfa/choosesellertowork', 'Telemarketing\TelemarketingFunctionsController@chooseSellerToWork');
	Route::get('telemarketingfa/choosedSeller/id/{id}', 'Telemarketing\TelemarketingFunctionsController@choosedSeller');
	Route::get('telemarketingfa/leaveSeller', 'Telemarketing\TelemarketingFunctionsController@leaveSeller');
	Route::resource('sales', 'Sales\SalesController');
	Route::get('sales/chooseTelemarketing/list', 'Sales\SalesController@showTelemarketersAvaliables');
	Route::get('sales/chooseTelemarketing/id/{id}', 'Sales\SalesController@chooseTelemarketing');
	Route::resource('calls', 'Calls\CallsController');
	Route::resource('dates', 'Dates\DatesController');

});
Route::get('/principal', [
    'middleware' => 'auth',
    'uses' => 'PrincipalController@index'
]);






