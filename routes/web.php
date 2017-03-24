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
    Route::get('gravidad/state/{id}/{state}', 'GravidadController@state');

    Route::resource('plantillas', 'PlantillasController');
    Route::get('plantillas/state/{id}/{state}', 'PlantillasController@state');
    Route::get('plantillas/info/{id}', 'PlantillasController@getPlantilla');
    Route::get('plantillas/lista/{id}', 'PlantillasController@listado');

    Route::resource('citologias', 'CitologiaController');
    Route::post('citologias/config-serial', 'CitoSerialController@citologiaUpdate')->name('citologias.config');
    Route::get('citologia/listados', 'CitologiaController@listados');
    Route::get('citologia/busqueda', 'CitologiaController@searchPage');
    Route::post('citologias/busqueda', 'CitologiaController@processForm');
    Route::any('citologia/resultados/{serial}/{factura_id}/{nombre}/{edad}/{sexo}/{corrreo}/{correo2}/{direccion}/{medico}/{otros}/{gravidad}/{icito}/{para}/{abortos}/{fur}/{fup}/{finfo}/{fmues}/{firma1}/{firma2}/{otrosb}/{informe}/{diagnostico}', 'CitologiaController@search');

    Route::resource('histopatologia', 'HistopatologiaController');
    Route::post('histopatologia/process', 'HistopatologiaController@processForm');
    Route::get('histopatologias/listados', 'HistopatologiaController@listados');
    Route::post('histopatologias/config-serial', 'CitoSerialController@histoUpdate')->name('histopatologia.config');
    Route::get('histopatologias/busqueda', 'HistopatologiaController@searchPage');
    Route::get('histopatologias/resultados/{serial}/{factura_id}/{nombre}/{edad}/{sexo}/{corrreo}/{correo2}/{direccion}/{medico}', 'HistopatologiaController@search');


    Route::resource('facturas', 'FacturasController');
    Route::get('factura/listados', 'FacturasController@listados');

    Route::post('histo/images/', 'ImagesController@uploadForm');

    Route::get('read', 'FilesController@readFiles');

    Route::get('reportes/hoja-de-citologia', 'ReportesController@hojaCitoForm');
    Route::post('reportes/hoja-de-citologia', 'ReportesController@processHojaTrabajo');
    Route::get('reportes/hoja-de-citologia-resultados/{inicio}/{final}/{idCito?}/{direccion?}/{pdf?}', 'ReportesController@resultHojaCito');

    Route::get('reportes/hoja-de-citologia-agencia', 'ReportesController@hojaCitoDeptoForm');
    Route::post('reportes/hoja-de-citologia-agencia', 'ReportesController@hojaCitoDeptoProcess');
    Route::get('reportes/hoja-de-citologia-resultados-agencias/{inicio}/{final}/{direccion?}/{pdf?}', 'ReportesController@hojaCitoDeptoResults');

    Route::get('reportes/identificador-citologia', 'ReportesController@identificadorCito');
    Route::post('reportes/identificador-citologia', 'ReportesController@identificadorProcess');
    Route::get('reportes/identificador-citologia-resultados/{inicio?}/{final?}', 'ReportesController@identificadorResults');

    Route::get('reportes/reporte-biopcia', 'ReportesController@biopciaForm');
    Route::post('reportes/reporte-biopcia', 'ReportesController@biopciaProcess');
    Route::get('reportes/reporte-biopcia/resultado/{inicio?}/{final?}/{pdf?}', 'ReportesController@biociaResult');



});