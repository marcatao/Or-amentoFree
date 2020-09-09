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
Route::post('/formulario/{id}',  'AdminController@formulario_save')->name('formulario');

Route::get('/lista-servico','AdminController@lista_servico')->name('lista-servico');
Route::get('/form-servico/{id}','AdminController@form_servico')->name('form-servico');
Route::post('/form-servico/{id}','AdminController@form_servico_store')->name('form-servico');
Route::delete('/form-servico/{id}','AdminController@form_servico_delete')->name('form-servico');

Route::get('/enviados',  'AdminController@enviados')->name('enviados');


Route::get('/email/{id}',  'AdminController@email')->name('email');
Auth::routes();

