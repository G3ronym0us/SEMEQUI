<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\OrdenFormRequest;
use Barryvdh\DomPDF\Facade as PDF;
use App\Orden;
use App\Consecutivos;
use App\Cotizacion;
use App\DetalleOrden;
use App\Clientes;
use App\Equipos;
use App\Item;
use App\observacionesOrden;
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
                    ->join('users as u', 'u.id','=','o.tecnico_id')
                    ->select('o.*', 'c.nom_cliente','u.name')
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
                    ->where('nom_consecutivo','=','ORDEN')
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
                $orden->contacto=$request->get('contacto');
                $orden->estado=$request->get('estado');
                
                $orden->save();

                $rel_id = $request->get('rel_id');
                $cantidad = $request->get('cantidad');
                $item_id = $request->get('item_id');
                $valor_unitario = $request->get('valor_unitario');
                $valor_total = $request->get('valor_total');
                $cotizaciones = $request->get('cotizaciones_p');

                $cont = 0;

                while ($cont < count($rel_id)) {
                    $detalle = new DetalleOrden();
                    $detalle->orden_servicio_id= $orden->id;
                    $detalle->item_id= $item_id[$cont];
                    $detalle->rel_id= $rel_id[$cont];
                    $detalle->cantidad= $cantidad[$cont];
                    $detalle->valor_unitario= $valor_unitario[$cont];
                    $detalle->valor_total= $valor_total[$cont];
                    $detalle->completo=false;
                    $detalle->save();
                    $cont++;

                }

            if ($cotizaciones != null) {
                for ($i=0; $i < count($cotizaciones) ; $i++) { 
                    $cotizacion = Cotizacion::findOrFail($cotizaciones[$i]);
                    $cotizacion->estado = 'PROCESADA/ORDEN';
                    $cotizacion->update();
                }
            }

                $id_consecutivo = $request->get('id_consecutivo_or');
        $num_actual = $request->get('num_actual_or');
        $con = Consecutivos::findOrFail($id_consecutivo);
        $con->num_actual = (int)$num_actual + 1;
        $con->update();


        return response()->json($orden->id);

        //return Redirect::to('operacion/orden_servicio');
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
        $items = Item::all();

        return view("orden.edit",["orden"=>$orden, "items"=>$items]);
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
        $orden = Orden::findOrFail($id);
        $orden->clientes_id=$request->get('clientes_id');
        $orden->cod_orden=$request->get('cod_orden');
        $orden->total=$request->get('total');
        $orden->estado=$request->get('estado');
        $orden->update();

        $equipo_id = $request->get('equipo_id');
        $cantidad = $request->get('cantidad');
        $item_id = $request->get('item_id');
        $area_id = $request->get('area_id');
        $valor_unitario = $request->get('valor_unitario');
        $valor_total = $request->get('valor_total');
        $id_detalle = $request->get('id');
        $cotizaciones = $request->get('cotizaciones_p');

        $cont = 0;
        $detalles = DB::table('detalles_orden_servicio')->where('orden_servicio_id','=',$id)->select('id')->get();
        while ($cont < count($equipo_id)) {
            if ($id_detalle[$cont]) {
                foreach ($detalles as $det) {
                    $buscar = array_search($det->id,$id_detalle,false);
                    if (is_numeric($buscar)) {

                    }else{
                        DetalleOrden::destroy($det->id);      
                    }
                }
            }else{
                $detalle = new DetalleOrden();
                $detalle->orden_servicio_id= $orden->id;
                $detalle->item_id= $item_id[$cont];
                $detalle->area_id= $area_id[$cont];
                $detalle->equipo_id= $equipo_id[$cont];
                $detalle->cantidad= $cantidad[$cont];
                $detalle->valor_unitario= $valor_unitario[$cont];
                $detalle->valor_total= $valor_total[$cont];
                $detalle->completo= false;
                $detalle->save();
            }   
            $cont++;

                }
        




        return Redirect::to('operacion/orden_servicio');
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
                ->join('rel_area_equipo as rel','rel.id','=','dc.rel_id')
                ->join('adm_areas as a','a.id','=','rel.areas_id')
                ->join('adm_equipo as eq','eq.id_equipo','=','rel.equipos_id')
                ->join('adm_item as it','it.id_item','=','dc.item_id')
            ->where('dc.cotizacion_id','=',$id)
            ->select('dc.*','eq.*','rel.serial','a.nombre_area','a.id as id_area','rel.placa','rel.descripcion', 'it.*')
            ->get();
         return response()->json($cotizacion);
        }
            
    }

    public function getDetallesOrden(Request $request, $id)
    {
        if ($request->ajax()) {
            $orden=DB::table('detalles_orden_servicio as dos')
                    ->join('rel_area_equipo as rel','rel.id','=','dos.rel_id')
                    ->join('adm_areas as a','a.id','=','rel.areas_id')
                    ->join('adm_equipo as eq','eq.id_equipo','=','rel.equipos_id')
                    ->join('adm_item as it','it.id_item','=','dos.item_id')
                    ->select('dos.*','eq.*','a.id as id_area','a.nombre_area','rel.serial','rel.placa','rel.descripcion', 'it.*')
                    ->where('dos.orden_servicio_id','=',$id)
                    ->get();
         return response()->json($orden);
        }
        
    } 

    public function generarInformes()
    {
        $ordenes = DB::table('orden_servicio as os')
                        ->join('adm_clientes as cl', 'os.clientes_id','=','cl.id')
                        ->join('users as us', 'us.id','=','os.tecnico_id')
                        ->join('municipios as m', 'm.id','=','cl.id_municipio')
                        ->join('departamentos as d', 'm.departamento_id','=','d.id')
                        ->select('os.*','cl.nom_cliente','us.name','m.nom_municipio','d.nom_departamento')
                        ->get();

        $tecnicos = DB::table('users')
                        ->where('rol','=','TECNICO')
                        ->get();

        $clientes = Clientes::all();
        $departamentos = DB::table('departamentos')->get();

        return view("orden.informes",["ordenes"=>$ordenes, "tecnicos"=>$tecnicos, "clientes"=>$clientes, "departamentos"=>$departamentos]);
        
        
    }

    public function filtrarOrden(Request $request)
    {


        $ordenes = Orden::query();
        $ordenes = $ordenes->join('adm_clientes as cl', 'orden_servicio.clientes_id','=','cl.id')->join('users as us', 'us.id','=','orden_servicio.tecnico_id')->join('municipios as m', 'm.id','=','cl.id_municipio')->join('departamentos as d', 'm.departamento_id','=','d.id')->select('orden_servicio.*','cl.nom_cliente','us.name','m.nom_municipio','d.nom_departamento');
                        

        if($request->get('tecnico')){
            $tecnico = $request->get('tecnico');
            $tecnico_id = $request->get('tecnico_id');
            $ordenes = $ordenes->where($tecnico,'=',$tecnico_id);
        }

        if($request->get('cliente')){
            $cliente_id = $request->get('cliente_id');
            $ordenes = $ordenes->where('cl.id','=',$cliente_id);
        }

        if($request->get('fecha')){
            $fecha_inicio = $request->get('fecha_inicio');
            $fecha_fin = $request->get('fecha_fin');
            $ordenes = $ordenes->where('orden_servicio.created_at','>=',$fecha_inicio);
            $ordenes = $ordenes->where('orden_servicio.created_at','<=',$fecha_fin);
        }

        if($request->get('f_estado')){
            $estado = $request->get('estado');
            $ordenes = $ordenes->where('orden_servicio.estado','=',$estado);
        }

        if($request->get('f_ubicacion')){
            $id_municipio = $request->get('id_municipio');
            $ordenes = $ordenes->where('id_municipio','=',$id_municipio);
        }

        $ordenes = $ordenes->get();
        $tecnicos = DB::table('users')
                        ->where('rol','=','TECNICO')
                        ->get();

        $clientes = Clientes::all();
        $departamentos = DB::table('departamentos')->get();

        //return view("orden.informes",["ordenes"=>$ordenes, "tecnicos"=>$tecnicos, "clientes"=>$clientes, "departamentos"=>$departamentos]);
        $pdf = PDF::loadView('orden.informePDF', compact(['ordenes']))->setPaper('letter', 'landscape');
        return $pdf->stream('Informe-de-Ordenes',array('Attachment'=>0));

        
    }

    public function getOrden(Request $request, $id)
    {
        if ($request->ajax()) {
            $orden = Orden::findOrFail($id);
         return response()->json($orden);
        }
        
    }    

    public function completarOrden(Request $request){

        $orden_id = $request->get('orden_id');
        $detalles = $request->get('detalles');
        $id_detalle = $request->get('id_detalle');
        $observaciones = $request->get('observaciones');

        $orden = Orden::findOrFail($orden_id);
        $orden->estado = 'COMPLETADA';
        $orden->update();

        for ($i=0; $i < count($id_detalle) ; $i++) { 
            $indice = array_search($id_detalle[$i],$detalles,false);
            if(empty($indice)){
                $detalle_orden = DetalleOrden::findOrFail($id_detalle[$i]);
                $detalle_orden->completo = false;
                $detalle_orden->update();

                $observacion = new observacionesOrden;
                $observacion->detalle_orden_id = $id_detalle[$i];
                $observacion->observacion = $observaciones[$i];
                $observacion->save();
                
            }else{
                $detalle_orden = DetalleOrden::findOrFail($id_detalle[$i]);
                $detalle_orden->completo = true;
                $detalle_orden->update();
            }
        }
        

        return Redirect::to('operacion/orden_servicio');


    }

     public function getCodigoOr()
    {
        $cod = DB::table('adm_consecutivo')
                    ->select('*')
                    ->where('nom_consecutivo','=','ORDEN')
                    ->first();
         return response()->json($cod);
        
        
    } 
}
