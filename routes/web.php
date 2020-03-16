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



Route::resources([
    'administracion/items' => 'ItemController',
    'administracion/equipos' => 'EquiposController',
    'administracion/consecutivos' => 'ConsecutivosController',
    'administracion/clientes' => 'ClientesController',
    'administracion/areas' => 'AreasController',
    'administracion/area_equipo' => 'AreaEquipoController',
    'administracion/empresa' => 'EmpresaController'
]);