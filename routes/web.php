<?php

use Illuminate\Support\Facades\Route;

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



Route::get('/', 'HomeController@showDashboard');

Route::get('users', 'UsersController@index');

Route::get('users-list', 'UsersController@usersList'); 

Auth::routes();

Route::resources([
    'administracion/items' => 'ItemController',
    'administracion/equipos' => 'EquiposController',
    'administracion/consecutivos' => 'ConsecutivosController',
    'administracion/clientes' => 'ClientesController',
    'administracion/areas' => 'AreasController',
    'administracion/area_equipo' => 'AreaEquipoController',
    'administracion/empresa' => 'EmpresaController',
    'operacion/orden_servicio' => 'OrdenController',
    'facturacion/cotizacion' => 'CotizacionController',
    'facturacion/facturacion' => 'FacturacionController',
    'seguridad/usuarios' => 'UsersController',
    'seguridad/roles' => 'RolController'
]);

Route::get('/obtenerEquipos', 'OrdenController@obtenerEquipos');

Route::get('cotizacion/con_orden/{id}', 'CotizacionController@con_orden');

Route::get('/getArea/{id}', 'CotizacionController@getArea');
Route::get('/getEquipos/{id}', 'CotizacionController@getEquipos');
Route::get('/getCotizaciones/{id}', 'OrdenController@getCotizaciones');
Route::get('/getDetallesOrden/{id}', 'OrdenController@getDetallesOrden');
Route::get('/getOrdenes/{id}', 'FacturacionController@getOrdenes');
Route::get('/getMunicipios/{id}', 'ClientesController@getMunicipios');
Route::get('/getConsecutivo/{nom}', 'ConsecutivosController@getConsecutivo');
Route::get('/getItem/{id}', 'CotizacionController@getItem');
Route::get('/getUbicacion/{id}', 'CotizacionController@getUbicacion');
Route::get('/getCodigoCliente/', 'CotizacionController@getCodigoCliente');
Route::get('/getCodigoArea/', 'CotizacionController@getCodigoArea');
Route::get('/getDepartamentos/', 'CotizacionController@getDepartamentos');
Route::get('/getDatosCliente/{id}', 'ClientesController@getDatosCliente');
Route::get('/getEquiposList/', 'EquiposController@getEquiposList');
Route::get('/getEquiposForArea/{id}', 'AreaEquipoController@getEquiposForArea');
Route::get('/getCodigo/{nom_consecutivo}', 'CotizacionController@getCodigo');
Route::get('/getTipoCliente/{id}', 'ClientesController@getTipoCliente');
Route::get('/getOrden/{id}', 'OrdenController@getOrden');
Route::get('/getTarifa/{id}', 'CotizacionController@getTarifa');
Route::get('/getClientes/', 'ClientesController@getClientes');
Route::get('/getCodigoCot/', 'CotizacionController@getCodigoCot');
Route::get('/getCodigoOr/', 'OrdenController@getCodigoOr');
Route::get('/getCodigoFac/', 'FacturacionController@getCodigoFac');

Route::get('/comprobarPassword/{password}', 'UsersController@comprobarPassword');

Route::get('/operacion/informes', 'OrdenController@generarInformes');
Route::get('/informes/filtrarOrden/', 'OrdenController@filtrarOrden');

Route::get('/facturacion/informes', 'FacturacionController@generarInformes');
Route::get('/informes/filtrarFacturas/', 'FacturacionController@filtrarFacturas');

Route::get('/agregarCotizacion/{id}', 'OrdenController@agregarCotizacion');
Route::get('/agregarOrden/{id}', 'FacturacionController@agregarOrden');
Route::get('/agregarFacturacion/{id}', 'FacturacionController@agregarFacturacion');
Route::post('/agregarClase', 'EquiposController@agregarClase');

Route::get('/imprimir/cotizacion/{id}', 'GeneradorController@imprimirCotizacion');
Route::get('/imprimir/orden_servicio/{id}', 'GeneradorController@imprimirOrden');
Route::get('/imprimir/facturacion/{id}', 'GeneradorController@imprimirFacturacion');

Route::post('/completar/orden_servicio/', 'OrdenController@completarOrden');
Route::post('/seguridad/usuarios/cPassword', 'UsersController@cPassword');


Route::get('clientes-list', 'ClientesController@ClientesList'); 

Route::post('/administracion/activar/{id}', 'ClientesController@activarClientes');
Route::post('/administracion/activarEquipo/{id}', 'EquiposController@activarEquipo');
Route::post('/administracion/activarItem/{id}', 'ItemController@activarItem');

Route::get('/dashboard', 'HomeController@showDashboard'); 


Route::get('/home', 'HomeController@index')->name('home');
