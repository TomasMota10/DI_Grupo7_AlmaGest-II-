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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register','API\RegisterController@register');

Route::post('login','API\RegisterController@login');

// ORDERS API 

Route::get('orders/{id}','API\OrderController@show');

Route::post('orders','API\OrderController@store');

Route::put('orders/{id}', 'API\OrderController@update');

Route::delete('orders/{id}', 'API\OrderController@destroy');

// DELIVERY NOTES --> API

Route::get('deliverynotes/{id}','API\DeliverynotesController@show');

Route::post('deliverynotes', 'API\DeliverynotesController@store');

Route::put('deliverynotes/{id}', 'API\DeliverynotesController@update');

Route::delete('deliverynotes/{id}', 'API\DeliverynotesController@destroy');

// INVOICES --> API

Route::get('invoices/{id}','API\InvoicesController@show');

Route::post('invoices', 'API\InvoicesController@store');

Route::put('invoices/{id}', 'API\InvoicesController@update');

Route::delete('invoices/{id}', 'API\InvoicesController@destroy');

//Route::middleware('auth:api')->group( function () {
   // Route::resource('orders', 'API\OrderController');
//});