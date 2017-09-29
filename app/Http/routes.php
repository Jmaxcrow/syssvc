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

Route::get('/', function () {
    return view('principal');
});

Route::get('clients/history', 'Clients\ClientController@showHistory' );

Route::resource('clients', 'Clients\ClientController');
Route::resource('telemarketing', 'Telemarketing\TelemarketingController');
Route::resource('sales', 'Sales\SalesController');
Route::resource('calls', 'Calls\CallsController');
Route::resource('dates', 'Dates\DatesController');
