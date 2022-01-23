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

Auth::routes();

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/register/form','Auth\RegisterController@index');

Route::get('/register/verify/{code}', 'Auth\RegisterController@verify');

// USUARIOS 
Route::resource('/usuarios','UserController');

Route::get('/usuarios/activate/{id}','UserController@activate');

Route::get('/usuarios/desactivate/{id}','UserController@desactivate');

Route::get('/usuarios/{id}/softdelete','UserController@softDelete');

// ARTICULOS
Route::resource('/articulos','ArticleController');

Route::get('/articulos/{id}/softdelete','ArticleController@softDelete');

// COMPAÑIAS
Route::resource('/company','CompanyController');

Route::get('/company/ficha/{id}','CompanyController@downloadFicha');

Route::get('/company/catalogo/{id}', 'CompanyController@downloadCatalogo');

Route::post('/company/sendEmail', 'CompanyController@sendEmail');

// PEDIDOS
Route::get('/orders','OrderController@index');

// ALBARANES
Route::get('/deliverynotes','DeliverynotesController@index');

// FACTURAS
Route::get('/invoices','InvoicesController@index');

#Route::get('/home', 'HomeController@index')->name('home');
