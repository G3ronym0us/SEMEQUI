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



Route::get('/', 'EmpresaController@index');

Route::get('users', 'UsersController@index');

Route::get('users-list', 'UsersController@usersList'); 



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
    'facturacion/facturacion' => 'FacturacionController'
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

Route::get('/operacion/informes', 'OrdenController@generarInformes');

Route::get('/agregarCotizacion/{id}', 'OrdenController@agregarCotizacion');
Route::get('/agregarOrden/{id}', 'FacturacionController@agregarOrden');
Route::post('/agregarClase', 'EquiposController@agregarClase');


Route::get('clientes-list', 'ClientesController@ClientesList'); 

Route::post('/administracion/activar/{id}', 'ClientesController@activarClientes');
Route::post('/administracion/activarEquipo/{id}', 'EquiposController@activarEquipo');
Route::post('/administracion/activarItem/{id}', 'ItemController@activarItem');

Route::name('print')->get('/facturacion/informes', 'GeneradorController@imprimirFactura');