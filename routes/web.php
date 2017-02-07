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

Route::get('/', 'PagesController@index' );

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::resource('citologias', 'CitologiaController');
Route::resource('histopatologia', 'HistopatologiaController');
Route::resource('areas', 'AreaController');
Route::get('areas/state/{id}/{state}', 'AreaController@state');
Route::resource('firmas', 'FirmasController');
Route::get('firmas/state/{id}/{state}', 'FirmasController@state');
Route::resource('categorias', 'CategoryController');
Route::get('categorias/state/{id}/{state}', 'CategoryController@state');
Route::get('permisos', 'PermissionController@index');
Route::resource('roles', 'RolesController');
Route::resource('usuarios', 'UserController');
Route::get('usuarios/state/{id}/{state}', 'UserController@state');
Route::resource('gravidad', 'GravidadController');
Route::get('gravidad/state/{id}/{state}', 'UserController@state');
Route::resource('morfologia', 'MorfologiaController');
Route::get('morfologia/state/{id}/{state}', 'UserController@state');
Route::resource('topologia', 'TopologiaController');
Route::get('topologia/state/{id}/{state}', 'UserController@state');
