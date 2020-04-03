<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\OrdenFormRequest;
use App\Orden;
use App\Consecutivos;
use App\Cotizacion;
use App\DetalleOrden;
use App\Clientes;
use App\Equipos;
use App\Item;
use DB;

class OrdenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ordenes=DB::table('orden_servicio as o')
                    ->join('adm_clientes as c', 'o.clientes_id','=','c.id')
                    ->select('o.*', 'c.nom_cliente')
                    ->get();
                    return view("Orden.index",["ordenes"=>$ordenes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Clientes::all();
        $cod = DB::table('adm_consecutivo')
                    ->select('*')
                    ->where('nom_consecutivo','=','COTIZACION')
                    ->get();
        $items = Item::all();
        $tecnicos = DB::table('users')
        ->select('*')
        ->where('rol','=','TECNICO')
        ->get();

        return view("Orden.create",["clientes"=>$clientes, "cod"=>$cod, "items"=>$items, "tecnicos"=>$tecnicos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
      

                $orden = new Orden;
                $orden->clientes_id=$request->get('clientes_id');
                $orden->tecnico_id=$request->get('tecnico_id');
                $orden->cod_orden=$request->get('cod_orden');
                $orden->total=$request->get('total');
                $orden->estado=$request->get('estado');
                $orden->save();

                $equipo_id = $request->get('equipo_id');
                $cantidad = $request->get('cantidad');
                $item_id = $request->get('item_id');
                $valor_unitario = $request->get('valor_unitario');
                $valor_total = $request->get('valor_total');
                $cotizaciones = $request->get('cotizaciones');

                $cont = 0;

                while ($cont < count($equipo_id)) {
                    $detalle = new DetalleOrden();
                    $detalle->orden_servicio_id= $orden->id;
                    $detalle->item_id= $item_id[$cont];
                    $detalle->equipo_id= $equipo_id[$cont];
                    $detalle->cantidad= $cantidad[$cont];
                    $detalle->valor_unitario= $valor_unitario[$cont];
                    $detalle->valor_total= $valor_total[$cont];
                    $detalle->save();
                    $cont++;

                }

                for ($i=0; $i < count($cotizaciones) ; $i++) { 
                    $cotizacion = Cotizacion::findOrFail($cotizaciones[$i]);
                    $cotizacion->estado = 'PROCESADA/ORDEN';
                    $cotizacion->update();
                }

                $id_consecutivo = $request->get('id_consecutivo');
        $num_actual = $request->get('num_actual');
        $con = Consecutivos::findOrFail($id_consecutivo);
        $con->num_actual = (int)$num_actual + 1;
        $con->update();




        return Redirect::to('operacion/orden_servicio');
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
        $orden=DB::table('orden_servicio as os')
        ->join('adm_clientes as cl', 'os.clientes_id','=','cl.id')
        ->join('municipios as m', 'm.id','=','cl.id_municipio')
        ->join('departamentos as d', 'm.departamento_id','=','d.id')
        ->where('os.id','=',$id)
        ->select('os.*','cl.nom_cliente','m.nom_municipio','d.nom_departamento')
        ->get();

        return view("orden.edit",["orden"=>$orden]);
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

    public function obtenerEquipos(Request $request){
        return response()->json(['response' => 'Hola']);
    }

    public function getCotizaciones(Request $request, $id)
    {
        if ($request->ajax()) {
            $cotizaciones=DB::table('cotizacion')
            ->where('cliente_id','=',$id)
            ->where('estado','=','PENDIENTE')
            ->get();
         return response()->json($cotizaciones);
        }
        
    } 

    public function agregarCotizacion(Request $request, $id)
    {
        if ($request->ajax()) {
            $cotizacion=DB::table('detalles_cotizacion as dc')
            ->join('cotizacion as c','c.id_cotizacion','=','dc.cotizacion_id')
            ->join('adm_areas as a','a.clientes_id','=','c.cliente_id')
            ->join('adm_equipo as eq','eq.id_equipo','=','dc.equipo_id')
            ->join('adm_item as it','it.id_item','=','dc.item_id')
            ->join('rel_area_equipo as re',function($join){
                $join->on('a.id','=','re.areas_id');
                $join->on('eq.id_equipo','=','re.equipos_id');
            })
            ->where('dc.cotizacion_id','=',$id)
            ->select('dc.*','eq.*','re.serial','re.placa','re.descripcion', 'it.*')
            ->get();
         return response()->json($cotizacion);
        }
        
            //->select('a.id','re.areas_id','eq.id_equipo','re.equipos_id')
    }

    public function getDetallesOrden(Request $request, $id)
    {
        if ($request->ajax()) {
            $orden=DB::table('detalles_orden_servicio as dos')
            ->join('orden_servicio as os','os.id','=','dos.orden_servicio_id')
            ->join('adm_areas as a','a.clientes_id','=','os.clientes_id')
            ->join('adm_equipo as eq','eq.id_equipo','=','dos.equipo_id')
            ->join('adm_item as it','it.id_item','=','dos.item_id')
            ->join('rel_area_equipo as re',function($join){
                $join->on('a.id','=','re.areas_id');
                $join->on('eq.id_equipo','=','re.equipos_id');
            })
            ->select('dos.*','eq.*','re.serial','re.placa','re.descripcion', 'it.*')
            ->where('dos.orden_servicio_id','=',$id)
            ->get();
         return response()->json($orden);
        }
        
    } 

    public function generarInformes(Request $request, $id)
    {
        $ordenes = DB::table('orden_servicio as os')
                        ->join('adm_clientes as cl', 'os.clientes_id','=','cl_id')
                        ->select('os.*','cl.');
        
        
    }   
}
