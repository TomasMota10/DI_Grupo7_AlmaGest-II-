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

Route::get('/register/verify/{code}', 'Auth\RegisterController@verify');

Route::resource('/usuarios','UserController');

Route::resource('/articulos','ArticleController');

Route::resource('/company','CompanyController');

Route::get('/company/ficha/{id}','CompanyController@downloadFicha');

Route::get('/company/catalogo/{id}', 'CompanyController@downloadCatalogo');

Route::post('/company/sendEmail', 'CompanyController@sendEmail');

Route::get('/usuarios/activate/{id}','UserController@activate');

Route::get('/usuarios/desactivate/{id}','UserController@desactivate');

Route::get('/usuarios/{id}/softdelete','UserController@softDelete');

Route::get('/articulos/{id}/softdelete','ArticleController@softDelete');

Route::get('/register/form','Auth\RegisterController@index');


#Route::get('/home', 'HomeController@index')->name('home');
