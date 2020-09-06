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

Route::get('/',  'SiteController@index')->name('index');

Route::get('/app',  'AdminController@app')->name('app'); 
Route::get('/novo-orcamento',  'AdminController@puxaUltima')->name('novo-orcamento');
Route::get('/formulario/{id}',  'AdminController@formulario')->name('formulario');
Route::post('/form-servico',  'AdminController@form_servico')->name('form-servico');
Auth::routes();

