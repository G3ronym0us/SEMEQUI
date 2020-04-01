<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


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

Route::get('clientes', function(){
	
return datatables()
	->eloquent(App\Clientes::query())
	->addColumn('btn', 'clientes.actions')
	->rawColumns(['btn'])
	->toJson();
});

Route::get('equipos', function(){
	
return datatables()
	->eloquent(App\Equipos::query())
	->addColumn('btn', 'equipos.actions')
	->rawColumns(['btn'])
	->toJson();
});

