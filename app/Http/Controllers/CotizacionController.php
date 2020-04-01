<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\OrdenFormRequest;
use App\Cotizacion;
use App\Consecutivos;
use App\DetalleCotizacion;
use App\Clientes;
use App\Equipos;
use App\Item;
use DB;

class CotizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cotizaciones=DB::table('cotizacion as co')
                    ->join('adm_clientes as cli', 'co.cliente_id','=','cli.id')
                    ->get();

        return view("cotizacion.index",["cotizaciones"=>$cotizaciones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cod = DB::table('adm_consecutivo')
                    ->select('*')
                    ->where('nom_consecutivo','=','COTIZACION')
                    ->get();
        $clientes = Clientes::all();
        $items = Item::all();
        $equipos=DB::table('adm_equipo as e')
        ->join('rel_area_equipo as r', 'e.id_equipo','=','r.equipos_id')
        ->get();

        return view("cotizacion.create",["clientes"=>$clientes, "equipos"=>$equipos, "items"=>$items, "cod"=>$cod]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cot = new Cotizacion;
                $cot->cliente_id=$request->get('clientes_id');
                $cot->cod_cotizacion=$request->get('cod_cotizacion');
                $cot->total=$request->get('total');
                $cot->estado=$request->get('estado');
                $cot->save();

                $equipo_id = $request->get('equipo_id');
                $cantidad = $request->get('cantidad');
                $item_id = $request->get('item_id');
                $valor_unitario = $request->get('valor_unitario');
                $valor_total = $request->get('valor_total');

                $cont = 0;

                while ($cont < count($equipo_id)) {
                    $detalle = new DetalleCotizacion();
                    $detalle->cotizacion_id= $cot->id_cotizacion;
                    $detalle->equipo_id= $equipo_id[$cont];
                    $detalle->item_id= $item_id[$cont];
                    $detalle->cantidad= $cantidad[$cont];
                    $detalle->valor_unitario= $valor_unitario[$cont];
                    $detalle->valor_total= $valor_total[$cont];
                    $detalle->save();
                    $cont++;

                }

                $id_consecutivo = $request->get('id_consecutivo');
        $num_actual = $request->get('num_actual');
        $con = Consecutivos::findOrFail($id_consecutivo);
        $con->num_actual = (int)$num_actual + 1;
        $con->update();




        return Redirect::to('facturacion/cotizacion');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /*$cotizacion=DB::table('cotizacion as co')
        ->join('adm_clientes as cl', 'co.cliente_id','=','cl.id')
        ->where('co.id_cotizacion','=',$id)
        ->get();

        $detalles=DB::table('detalles_cotizacion as dc')
        ->join('adm_equipo as eq', 'dc.equipo_id','=','eq.id_equipo')
        ->join('rel_area_equipo as r', 'dc.equipo_id','=','r.equipos_id')
        ->where('dc.cotizacion_id','=',$id)
        ->get();

        return view("cotizacion.show",["cotizacion"=>$cotizacion, "detalles"=>$detalles]);*/
        $cotizacion=DB::table('detalles_cotizacion as dc')
            ->join('cotizacion as c','c.id_cotizacion','=','dc.cotizacion_id')
            ->join('adm_areas as a','a.clientes_id','=','c.cliente_id')
            ->join('adm_equipo as eq','eq.id_equipo','=','dc.equipo_id')
            ->join('rel_area_equipo as re','a.id','=','re.areas_id')
            ->where('dc.cotizacion_id','=',$id)
            ->get();

            dd($cotizacion);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cotizacion=DB::table('cotizacion as co')
        ->join('adm_clientes as cl', 'co.cliente_id','=','cl.id')
        ->join('municipios as m', 'm.id','=','cl.id_municipio')
        ->join('departamentos as d', 'm.departamento_id','=','d.id')
        ->where('co.id_cotizacion','=',$id)
        ->get();

        $detalles=DB::table('detalles_cotizacion as dc')
        ->join('adm_equipo as eq', 'dc.equipo_id','=','eq.id_equipo')
        ->join('rel_area_equipo as r', 'dc.equipo_id','=','r.equipos_id')
        ->where('dc.cotizacion_id','=',$id)
        ->get();

        return view("cotizacion.edit",["cotizacion"=>$cotizacion, "detalles"=>$detalles]);
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

        $cotizacion = Cotizacion::findOrFail($id);
        $cotizacion->total = $request->get('total');
        $cotizacion->update();


                $equipo_id = $request->get('equipo_id');
                $cantidad = $request->get('cantidad');
                $valor_unitario = $request->get('valor_unitario');
                $valor_total = $request->get('valor_total');
                $id_detalle = $request->get('id');

                $cont = 0;

                while ($cont < count($equipo_id)) {
                    if ($id_detalle[$cont]) {

                    }else{
                        $detalle = new DetalleCotizacion();
                        $detalle->cotizacion_id= $id;
                        $detalle->equipo_id= $equipo_id[$cont];
                        $detalle->cantidad= $cantidad[$cont];
                        $detalle->valor_unitario= $valor_unitario[$cont];
                        $detalle->valor_total= $valor_total[$cont];
                        $detalle->save();
                    }
                    $cont++;

                }




        return Redirect::to('facturacion/cotizacion');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cotizacion = Cotizacion::findOrFail($id);
        $cotizacion->estado='INACTIVO';

        $cotizacion->update(); 
        return Redirect::to('facturacion/cotizacion');
    }

    public function con_orden($id)
    {
        $cotizacion=DB::table('cotizacion as co')
        ->join('adm_clientes as cl', 'co.cliente_id','=','cl.id')
        ->where('co.id_cotizacion','=',$id)
        ->get();

        $detalles=DB::table('detalles_cotizacion as dc')
        ->join('adm_equipo as eq', 'dc.equipo_id','=','eq.id_equipo')
        ->join('rel_area_equipo as r', 'dc.equipo_id','=','r.equipos_id')
        ->where('dc.cotizacion_id','=',$id)
        ->get();

        $equipos = Equipos::all();

        return view("Orden.create",["cotizacion"=>$cotizacion, "equipos"=>$equipos, "detalles"=>$detalles]);
    }

    public function getArea(Request $request, $id)
    {
        if ($request->ajax()) {
            $areas=DB::table('adm_areas')
            ->where('clientes_id','=',$id)
            ->get();
         return response()->json($areas);
        }
        
    } 
     public function getEquipos(Request $request, $id)
    {
        if ($request->ajax()) {
            $equipos=DB::table('rel_area_equipo as r')
            ->join('adm_equipo as eq', 'r.equipos_id','=','eq.id_equipo')
            ->where('r.areas_id','=',$id)
            ->get();
         return response()->json($equipos);
        }
        
    } 

    public function getItem(Request $request, $id)
    {
        if ($request->ajax()) {
            $item = Item::findOrFail($id);
         return response()->json($item);
        }
        
    } 

    public function getUbicacion(Request $request, $id)
    {
        if ($request->ajax()) {
            $equipos=DB::table('adm_clientes as ac')
            ->join('municipios as m', 'm.id','=','ac.id_municipio')
            ->join('departamentos as d', 'd.id','=','m.departamento_id')
            ->where('ac.id','=',$id)
            ->select('m.nom_municipio','d.nom_departamento')
            ->get();
         return response()->json($equipos);
        }
        
    } 

}
