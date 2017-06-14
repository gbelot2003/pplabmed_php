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

Route::group(['middleware' => 'auth'], function(){
    Route::get('/home', 'HomeController@index');

    Route::resource('firmas', 'FirmasController');
    Route::get('firmas/state/{id}/{state}', 'FirmasController@state');

    Route::resource('categorias', 'CategoryController');
    Route::get('categorias/state/{id}/{state}', 'CategoryController@state');

    Route::get('permisos', 'PermissionController@index');
    Route::resource('roles', 'RolesController');

    Route::resource('usuarios', 'UserController');
    Route::get('usuarios/state/{id}/{state}', 'UserController@state');


    Route::resource('plantillas', 'PlantillasController');
    Route::get('plantillas/state/{id}/{state}', 'PlantillasController@state');
    Route::get('plantillas/info/{id}', 'PlantillasController@getPlantilla');
    Route::get('plantillas/lista/{id}', 'PlantillasController@listado');

    Route::resource('citologias', 'CitologiaController');
    Route::post('citologias/config-serial', 'CitoSerialController@citologiaUpdate')->name('citologias.config');
    Route::get('citologia/listados', 'CitologiaController@listados');
    Route::get('citologia/busqueda', 'CitologiaController@searchPage');
    Route::post('Citologias/busqueda', 'CitologiaController@processForm');
    Route::any('citologia/resultados/{serial}/{factura_id}/{nombre}/{edad}/{sexo}/{corrreo}/{correo2}/{direccion}/{medico}/{otros}/{gravidad}/{icito}/{para}/{abortos}/{fur}/{fup}/{finfo}/{fmues}/{firma1}/{firma2}/{otrosb}/{informe}/{diagnostico}', 'CitologiaController@search');
    /***/Route::get('citologia/sobres/{id}', 'PrintController@sobresCitologia');
    /***/Route::get('citologia/formulario/{id}', 'PrintController@formatoCitologia');

    Route::resource('histopatologia', 'HistopatologiaController');
    Route::get('histopatologias/listados', 'HistopatologiaController@listados');
    Route::post('histopatologias/config-serial', 'CitoSerialController@histoUpdate')->name('histopatologia.config');
    Route::get('histopatologias/busqueda', 'HistopatologiaController@searchPage');
    Route::post('histopatologia/process', 'HistopatologiaController@processForm');
    Route::get('histopatologias/resultados/{serial}/{factura_id}/{nombre}/{edad}/{sexo}/{corrreo}/{correo2}/{direccion}/{medico}/{topo}/{mor1}/{mor2}/{firma}/{firma2}/{diag}/{muestra}/{finfo}/{fbiop}/{fmuest}/{informe}', 'HistopatologiaController@search');
    /***/Route::get('histopatologias/sobres/{id}', 'PrintController@sobreHistopatologia');
    /***/Route::get('histopatologias/formulario/{id}', 'PrintController@formatoHistopatologia');

    Route::get('histo/images/edit/{id}', 'ImagesController@edit')->name('images.edit');

    Route::post('histo/images/', 'ImagesController@uploadForm');
    Route::put('histo/images/update/{id}', 'ImagesController@update');
    Route::get('histo/images/delete/{id}', 'ImagesController@delete');

    Route::resource('facturas', 'FacturasController');
    Route::get('factura/listados', 'FacturasController@listados');

    Route::get('reportes/hoja-de-citologia', 'Reportes\ReporteCitologiaController@index')->name('reporte.cito.index');
    Route::post('reportes/hoja-de-citologia', 'Reportes\ReporteCitologiaController@results')->name('reporte.cito.results');

    Route::get('reportes/hoja-de-citologia-agencia', 'Reportes\ReportePorSedeController@index')->name('reporte.sedes.index');
    Route::post('reportes/hoja-de-citologia-agencia', 'Reportes\ReportePorSedeController@results')->name('reporte.sedes.result');

    Route::get('reportes/reporte-biopcia', 'Reportes\ReporteBiopciaController@index')->name('reporte.histo.index');
    Route::post('reportes/reporte-biopcia', 'Reportes\ReporteBiopciaController@results')->name('reporte.histo.results');

    Route::get('reportes/reporte-entrega-muestras', 'Reportes\ReporteMuestrasController@index')->name('reporte.muestras.index');
    Route::post('reportes/reporte-entrega-muestras', 'Reportes\ReporteMuestrasController@results')->name('reporte.muestras.results');

    Route::get('reportes/identificador-citologia', 'Reportes\ReportesIdentificadorCitologiaController@index')->name('reporte.identificador.index');
    Route::post('reportes/identificador-citologia', 'Reportes\ReportesIdentificadorCitologiaController@results')->name('reporte.identificador.results');

    Route::get('reportes/reporte-Citologias-anormales', 'Reportes\ReporteCitologiasAnormalesController@index')->name('reporte.anormales.index');
    Route::post('reportes/reporte-Citologias-anormales', 'Reportes\ReporteCitologiasAnormalesController@results')->name('reporte.anormales.result');

    Route::get('reportes/reporte-morfologia', 'Reportes\ReporteMorfologicoController@index')->name('reporte.morfo.index');
    Route::post('reportes/reporte-morfologia', 'Reportes\ReporteMorfologicoController@results')->name('reporte.morfo.results');

});