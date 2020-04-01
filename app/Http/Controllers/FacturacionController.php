<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\OrdenFormRequest;
use App\Facturacion;
use App\DetalleCotizacion;
use App\Clientes;
use App\Equipos;
use DB;

class FacturacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facturas=DB::table('facturacion as f')
                    ->join('adm_clientes as cli', 'f.clientes_id','=','cli.id')->get();
        return view("facturacion.index",["facturas"=>$facturas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Clientes::all();
        return view("facturacion.create",["clientes"=>$clientes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

     public function getOrdenes(Request $request, $id)
    {
        if ($request->ajax()) {
            $ordenes=DB::table('orden_servicio')
            ->where('clientes_id','=',$id)
            ->where('estado','=','PENDIENTE')
            ->get();
         return response()->json($ordenes);
        }
        
    } 

    public function agregarOrden(Request $request, $id)
    {
        if ($request->ajax()) {
            $cotizacion=DB::table('detalles_orden_servicio as do')
            ->join('adm_equipo as eq','eq.id_equipo','=','do.equipo_id')
            ->where('orden_servicio_id','=',$id)
            ->get();
         return response()->json($cotizacion);
        }
        
    } 
}
