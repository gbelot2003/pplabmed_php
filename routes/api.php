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

Route::middleware('api')->post('/user', 'HistoApiController@user');
Route::middleware('api')->post('/uploadimage', 'HistoApiController@uploadImage');
Route::middleware('api')->post('/movilImages', 'HistoApiController@movilImages');


Route::middleware('api')->resource('/facturas', 'FactutasApiController');
