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
    Route::get('password-change', 'UserPasswordController@index')->name('change.password');
    Route::post('password-change', 'UserPasswordController@changePassword')->name('change.changePassword');


    Route::resource('plantillas', 'PlantillasController');
    Route::get('plantillas/state/{id}/{state}', 'PlantillasController@state');
    Route::get('plantillas/info/{id}', 'PlantillasController@getPlantilla');
    Route::get('plantillas/lista/{id}', 'PlantillasController@listado');

    Route::resource('citologias', 'CitologiaController');
    Route::post('citologias/config-serial', 'CitoSerialController@citologiaUpdate')->name('citologias.config');
    Route::get('citologia/listados', 'CitologiaController@listados');
    Route::get('citologia/busqueda', 'CitologiaController@searchPage');
    Route::get('citologias/busqueda/resultados/', 'CitologiaController@processForm');

    /***/Route::get('citologia/sobres/{id}', 'PrintController@sobresCitologia');
    /***/Route::get('citologia/formulario/{id}', 'PrintController@formatoCitologia');
    /**
     * Citologia ENG
     */
    /***/Route::get('citologia/formulario-end/{id}', 'PrintController@formatoCitologiasEng');
    /**
     * Duplicar Factura
     */
    Route::post('citologia/reescritura', 'CitologiaController@updateFacturaNum');

    /**
     * Version Ingles de formulario
     */
    Route::get('citologia-eng/{serial}', 'CitologiasEngController@editOrCreate');
    Route::post('citologia-ang/{serial}', 'CitologiasEngController@updateTrans');


    Route::resource('histopatologia', 'HistopatologiaController');
    Route::get('histopatologias/listados', 'HistopatologiaController@listados');
    Route::post('histopatologias/config-serial', 'CitoSerialController@histoUpdate')->name('histopatologia.config');
    Route::get('histopatologias/busqueda', 'HistopatologiaController@searchPage');
    Route::get('histopatologias/busqueda/resultados', 'HistopatologiaController@processForm');

    /***/Route::get('histopatologias/sobres/{id}', 'PrintController@sobreHistopatologia');
    /***/Route::get('histopatologias/formulario/{id}', 'PrintController@formatoHistopatologia');
    /***/Route::get('histopatologias/formulario-eng/{id}', 'PrintController@formatoHistoatologiaEng');

    Route::get('histo/images/edit/{id}', 'ImagesController@edit')->name('images.edit');

    Route::post('histo/images/', 'ImagesController@uploadForm');
    Route::put('histo/images/update/{id}', 'ImagesController@update');
    Route::get('histo/images/delete/{id}', 'ImagesController@delete');

    /**
     * Duplicar Factura Histopatología
     */
    Route::post('histo/reescritura', 'HistopatologiaController@updateFacturaNum');

    /**
     * Version Ingles de formulario
     */
    Route::get('histo-eng/{serial}', 'HistopatologiasEngController@editOrCreate');
    Route::post('histo-ang/{serial}', 'HistopatologiasEngController@updateTrans');

    /**
     * Ruta de busqueda por serial
     */
    Route::get('histo/serial/{serial}', 'HistopatologiaController@findBySerial');


    Route::resource('/muestras', 'MuestrasController');
    Route::get('muestra/listados', 'MuestrasController@listados');
    Route::get('muestras/print/{id}', 'MuestrasPrintController@printMuestras');
    Route::get('muestras/print-en/{id}', 'MuestrasPrintController@printMuestrasEng');



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

    Route::get('reportes/reporte-citologias-anormales', 'Reportes\ReporteCitologiasAnormalesController@index')->name('reporte.anormales.index');
    Route::post('reportes/reporte-citologias-anormales', 'Reportes\ReporteCitologiasAnormalesController@results')->name('reporte.anormales.result');

    Route::get('reportes/reporte-morfologia', 'Reportes\ReporteMorfologicoController@index')->name('reporte.morfo.index');
    Route::post('reportes/reporte-morfologia', 'Reportes\ReporteMorfologicoController@results')->name('reporte.morfo.results');

    Route::get('reportes/medico-informante', 'Reportes\ReportesMedicosHorasController@index')->name('medico.informante.index');
    Route::post('reportes/medico-informante', 'Reportes\ReportesMedicosHorasController@results')->name('medico.informante.results');
});