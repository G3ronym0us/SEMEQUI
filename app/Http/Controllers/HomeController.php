<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Orden;
use App\Clientes;
use DB;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function showDashboard(){

        $mes_actual = Carbon::now();
        $mes_pasado = Carbon::now()->subMonth();
        $dos_meses = Carbon::now()->subMonths(2);

        //PARA ORDENES DE SERVICIO
        $ordenes_actual = DB::table('orden_servicio')
                            ->where('created_at','<',$mes_actual)
                            ->where('created_at','>',$mes_pasado)
                            ->get();
        $cant_ordenes_actual = count($ordenes_actual);

        $ordenes_pasado = DB::table('orden_servicio')
                            ->where('created_at','<',$mes_pasado)
                            ->where('created_at','>',$dos_meses)
                            ->get();

        if ($ordenes_pasado) {
            $cant_ordenes_pasado = count($ordenes_pasado);
        }else{
            $cant_ordenes_pasado = null;
        }

        if ($cant_ordenes_pasado == null) {
            $porcentaje_ordenes = 100;
        }else{
            $porcentaje_ordenes = (($cant_ordenes_actual / $cant_ordenes_pasado) * 100) - 100;
            if ($porcentaje_ordenes > 100) {
                $porcentaje_ordenes = 100;
            }
        }


        //PARA VENTAS
        $ventas_actual = DB::table('facturacion')
                            ->where('created_at','<',$mes_actual)
                            ->where('created_at','>',$mes_pasado)
                            ->select(DB::raw('SUM(total) as total_f'))
                            ->first();
        $ventas_actual = $ventas_actual->total_f;

        $total_pasado = DB::table('facturacion')
                            ->where('created_at','<',$mes_pasado)
                            ->where('created_at','>',$dos_meses)
                            ->select(DB::raw('SUM(total) as total_f'))
                            ->first();
        if ($total_pasado->total_f == null) {
            $porcentaje_ventas = 100;
        }else{
            $porcentaje_ventas = (($total_actual->total_f / $total_pasado->total_f) * 100) - 100;
            if ($porcentaje_ventas > 100) {
                $porcentaje_ventas = 100;
            }
        }

        //PARA CLIENTES
        $clientes_actual = DB::table('adm_clientes')
                            ->where('created_at','<',$mes_actual)
                            ->where('created_at','>',$mes_pasado)
                            ->get();
        $cant_clientes_actual = count($clientes_actual);

        $clientes_pasados = DB::table('adm_clientes')
                            ->where('created_at','<',$mes_pasado)
                            ->where('created_at','>',$dos_meses)
                            ->get();

        if ($clientes_pasados) {
            $cant_clientes_pasado = count($clientes_pasados);
        }else{
            $cant_clientes_pasado = null;
        }

        if ($cant_clientes_pasado == null) {
            $porcentaje_clientes = 100;
        }else{
            $porcentaje_clientes = (($cant_clientes_actual / $cant_clientes_pasado) * 100) - 100;
            if ($porcentaje_clientes > 100) {
                $porcentaje_clientes = 100;
            }
        }
        
        return view('layouts.dashboard',['cant_ordenes' => $cant_ordenes_actual, 'porcentaje_ordenes' => $porcentaje_ordenes, 'ventas_actual' => $ventas_actual, 'porcentaje_ventas' => $porcentaje_ventas, 'cant_clientes' => $cant_clientes_actual, 'porcentaje_clientes' => $porcentaje_clientes]);
    }
}
