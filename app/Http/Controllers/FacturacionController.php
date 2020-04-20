<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\OrdenFormRequest;
use Barryvdh\DomPDF\Facade as PDF;
use App\Facturacion;
use App\DetalleFactura;
use App\Consecutivos;
use App\Cotizacion;
use App\Orden;
use App\Clientes;
use App\Equipos;
use App\Item;
use DB;

class FacturacionController extends Controller
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
        $facturas=DB::table('facturacion as f')
                    ->join('adm_clientes as cli', 'f.clientes_id','=','cli.id')
                    ->select('f.*', 'cli.nom_cliente')
                    ->get();
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
        $cod = DB::table('adm_consecutivo')
                    ->select('*')
                    ->where('nom_consecutivo','=','FACTURACION')
                    ->get();
        $items = Item::all();

        return view("facturacion.create",["clientes"=>$clientes, "cod"=>$cod, "items"=>$items]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $factura = new Facturacion;
        $factura->clientes_id=$request->get('clientes_id');
        $factura->cod_factura=$request->get('cod_factura');
        $factura->total=$request->get('total');
        $factura->observacion=$request->get('observacion');
        $factura->forma_pago=$request->get('forma_pago');
        $factura->estado=$request->get('estado');
        $factura->save();

        $rel_id = $request->get('rel_id');
        $cantidad = $request->get('cantidad');
        $item_id = $request->get('item_id');
        $valor_unitario = $request->get('valor_unitario');
        $valor_total = $request->get('valor_total');
        $cotizaciones = $request->get('cotizaciones_list');
        $ordenes = $request->get('ordenes_list');

        $cont = 0;

        while ($cont < count($rel_id)) {
            $detalle = new DetalleFactura();
            $detalle->factura_id= $factura->id_facturacion;
            $detalle->item_id= $item_id[$cont];
            $detalle->rel_id= $rel_id[$cont];
            $detalle->cantidad= $cantidad[$cont];
            $detalle->valor_unitario= $valor_unitario[$cont];
            $detalle->valor_total= $valor_total[$cont];
            $detalle->save();
            $cont++;

        }

        if ($cotizaciones != null) {
            for ($i=0; $i < count($cotizaciones) ; $i++) { 
                $cotizacion = Cotizacion::findOrFail($cotizaciones[$i]);
                $cotizacion->estado = 'PROCESADA/FACTURA';
                $cotizacion->update();
            }
        }
        
        if ($ordenes != null) {
            for ($i=0; $i < count($ordenes) ; $i++) { 
                $orden = Orden::findOrFail($ordenes[$i]);
                $orden->estado = 'PROCESADA/FACTURA';
                $orden->update();
            }
        }
        

        $id_consecutivo = $request->get('id_consecutivo_fac');
        $num_actual = $request->get('num_actual_fac');
        $con = Consecutivos::findOrFail($id_consecutivo);
        $con->num_actual = (int)$num_actual + 1;
        $con->update();

        return response()->json($factura->id_facturacion);

        //return Redirect::to('facturacion/facturacion');
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
        $facturacion=DB::table('facturacion as fa')
        ->join('adm_clientes as cl', 'fa.clientes_id','=','cl.id')
        ->join('municipios as m', 'm.id','=','cl.id_municipio')
        ->join('departamentos as d', 'm.departamento_id','=','d.id')
        ->where('fa.id_facturacion','=',$id)
        ->get();

        $items = Item::all();

        return view("facturacion.edit",["facturacion"=>$facturacion, "items"=>$items]);
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
        $factura = Facturacion::findOrFail($id);
        $factura->total=$request->get('total');
        $factura->update();

        $rel_id = $request->get('rel_id');
        $cantidad = $request->get('cantidad');
        $item_id = $request->get('item_id');
        $valor_unitario = $request->get('valor_unitario');
        $valor_total = $request->get('valor_total');
        $id_detalle = $request->get('id');

        $cont = 0;
        $detalles = DB::table('detalles_factura')->where('factura_id','=',$id)->select('id')->get();

       while ($cont < count($rel_id)) {
            if ($id_detalle[$cont]) {
                foreach ($detalles as $det) {
                    $buscar = array_search($det->id,$id_detalle,false);

                    if (is_numeric($buscar)) {

                    }else{
                        DetalleFactura::destroy($det->id);      
                    }
                }
            }else{
                $detalle = new DetalleFactura();
                $detalle->factura_id= $factura->id_facturacion;
                $detalle->item_id= $item_id[$cont];
                $detalle->rel_id= $rel_id[$cont];
                $detalle->cantidad= $cantidad[$cont];
                $detalle->valor_unitario= $valor_unitario[$cont];
                $detalle->valor_total= $valor_total[$cont];
                $detalle->save();
            }   
             $cont++;

        }

        return Redirect::to('facturacion/facturacion');
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
            ->where('estado','=','COMPLETADA')
            ->get();
         return response()->json($ordenes);
        }
        
    } 

    public function agregarOrden(Request $request, $id)
    {
        if ($request->ajax()) {
            $orden=DB::table('detalles_orden_servicio as dos')
            ->join('rel_area_equipo as rel','rel.id','=','dos.rel_id')
            ->join('adm_areas as a','a.id','=','rel.areas_id')
            ->join('adm_equipo as eq','eq.id_equipo','=','rel.equipos_id')
            ->join('adm_item as it','it.id_item','=','dos.item_id')
            ->select('dos.*','eq.*','a.id as id_area','a.nombre_area','rel.serial','rel.placa','rel.descripcion', 'it.*')
            ->where('dos.orden_servicio_id','=',$id)
            ->where('dos.completo','=',true)
            ->get();
         return response()->json($orden);
        }
        
    }

    public function agregarFacturacion(Request $request, $id)
    {
        if ($request->ajax()) {
            $orden=DB::table('detalles_factura as df')
            ->join('rel_area_equipo as rel','rel.id','=','df.rel_id')
            ->join('adm_areas as a','a.id','=','rel.areas_id')
            ->join('adm_equipo as eq','eq.id_equipo','=','rel.equipos_id')
            ->join('adm_item as it','it.id_item','=','df.item_id')
            ->select('df.*','eq.*','a.id as id_area','a.nombre_area','rel.serial','rel.placa','rel.descripcion', 'it.*')
            ->where('df.factura_id','=',$id)
            ->get();
         return response()->json($orden);
        }
        
    } 

    public function generarInformes()
    {
        $facturas = DB::table('facturacion as f')
                        ->join('adm_clientes as cl', 'f.clientes_id','=','cl.id')
                        ->join('municipios as m', 'm.id','=','cl.id_municipio')
                        ->join('departamentos as d', 'm.departamento_id','=','d.id')
                        ->select('f.*','cl.nom_cliente','m.nom_municipio','d.nom_departamento')
                        ->get();

        $clientes = Clientes::all();
        $departamentos = DB::table('departamentos')->get();

        return view("facturacion.informes",["facturas"=>$facturas, "clientes"=>$clientes, "departamentos"=>$departamentos]);
        
        
    }

    public function filtrarFacturas(Request $request)
    {


        $facturas = Facturacion::query();
        $facturas = $facturas->join('adm_clientes as cl', 'facturacion.clientes_id','=','cl.id')->join('municipios as m', 'm.id','=','cl.id_municipio')->join('departamentos as d', 'm.departamento_id','=','d.id')->select('facturacion.*','cl.nom_cliente','m.nom_municipio','d.nom_departamento');

        if($request->get('cliente')){
            $cliente_id = $request->get('cliente_id');
            $facturas = $facturas->where('cl.id','=',$cliente_id);
        }

        if($request->get('fecha')){
            $fecha_inicio = $request->get('fecha_inicio');
            $fecha_fin = $request->get('fecha_fin');
            $facturas = $facturas->where('facturacion.created_at','>=',$fecha_inicio);
            $facturas = $facturas->where('facturacion.created_at','<=',$fecha_fin);
        }

        if($request->get('f_estado')){
            $estado = $request->get('estado');
            $facturas = $facturas->where('facturacion.estado','=',$estado);
        }

        if($request->get('f_ubicacion')){
            $id_municipio = $request->get('id_municipio');
            $facturas = $facturas->where('id_municipio','=',$id_municipio);
        }

        $facturas = $facturas->get();
        $tecnicos = DB::table('users')
                        ->where('rol','=','TECNICO')
                        ->get();

        $clientes = Clientes::all();
        $departamentos = DB::table('departamentos')->get();

        //return view("facturacion.informes",["facturas"=>$facturas, "tecnicos"=>$tecnicos, "clientes"=>$clientes, "departamentos"=>$departamentos]);
        $pdf = PDF::loadView('facturacion.informePDF', compact(['facturas']))->setPaper('letter', 'landscape');
        return $pdf->stream('Informe-de-Facturaciones',array('Attachment'=>0));

        
    }

   public function getCodigoFac()
    {
        $cod = DB::table('adm_consecutivo')
                    ->select('*')
                    ->where('nom_consecutivo','=','FACTURACION')
                    ->first();
         return response()->json($cod);
        
        
    } 
}
