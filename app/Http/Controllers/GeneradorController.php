<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use DB;

class GeneradorController extends Controller
{
    public function imprimirFactura(){
     	$pdf = \PDF::loadView('cotizacion.informePDF');
     	return $pdf->download('ejemplo.pdf');

     	$detalles=DB::table('detalles_factura as df')
            ->join('facturacion as f','f.id','=','df.factura_id')
            ->join('adm_areas as a','a.clientes_id','=','f.clientes_id')
            ->join('adm_equipo as eq','eq.id_equipo','=','df.equipo_id')
            ->join('adm_item as it','it.id_item','=','df.item_id')
            ->join('rel_area_equipo as re',function($join){
                $join->on('a.id','=','re.areas_id');
                $join->on('eq.id_equipo','=','re.equipos_id');
            })
            ->select('df.*','eq.*','re.serial','re.placa','re.descripcion', 'it.*')
            ->where('df.factura_id','=',$id)
            ->get();
	}

	public function imprimirCotizacion($id){

		$cotizacion=DB::table('cotizacion as co')
        ->join('adm_clientes as cl', 'co.cliente_id','=','cl.id')
        ->join('municipios as m', 'm.id','=','cl.id_municipio')
        ->join('departamentos as d', 'm.departamento_id','=','d.id')
        ->where('co.id_cotizacion','=',$id)
        ->select('co.*','cl.nom_cliente','m.nom_municipio','d.nom_departamento')
        ->get();

        $detalles=DB::table('detalles_cotizacion as dc')
            ->join('cotizacion as c','c.id_cotizacion','=','dc.cotizacion_id')
            ->join('adm_areas as a','a.id','=','dc.area_id')
            ->join('adm_equipo as eq','eq.id_equipo','=','dc.equipo_id')
            ->join('adm_item as it','it.id_item','=','dc.item_id')
            ->join('rel_area_equipo as re',function($join){
                $join->on('a.id','=','re.areas_id');
                $join->on('eq.id_equipo','=','re.equipos_id');
            })
            ->where('dc.cotizacion_id','=',$id)
            ->select('dc.*','eq.*','a.nombre_area','re.serial','re.placa','re.descripcion', 'it.*')
            ->get();

   

		//return view("cotizacion.show",["cotizacion" => $cotizacion, "detalles" => $detalles]);
		$pdf = PDF::loadView('cotizacion.show', compact(['cotizacion','detalles']));
     	return $pdf->stream('my.pdf',array('Attachment'=>0));
	}

        public function imprimirOrden($id){

        $orden=DB::table('orden_servicio as os')
        ->join('adm_clientes as cl', 'os.clientes_id','=','cl.id')
        ->join('municipios as m', 'm.id','=','cl.id_municipio')
        ->join('departamentos as d', 'm.departamento_id','=','d.id')
        ->where('os.id','=',$id)
        ->select('os.*','cl.nom_cliente','m.nom_municipio','d.nom_departamento')
        ->get();

        $detalles=DB::table('detalles_orden_servicio as dos')
            ->join('orden_servicio as os','os.id','=','dos.orden_servicio_id')
            ->join('adm_areas as a','a.id','=','dos.area_id')
            ->join('adm_equipo as eq','eq.id_equipo','=','dos.equipo_id')
            ->join('adm_item as it','it.id_item','=','dos.item_id')
            ->join('rel_area_equipo as re',function($join){
                $join->on('a.id','=','re.areas_id');
                $join->on('eq.id_equipo','=','re.equipos_id');
            })
            ->select('dos.*','eq.*','a.nombre_area','re.serial','re.placa','re.descripcion', 'it.*')
            ->where('dos.orden_servicio_id','=',$id)
            ->get();

   

        //return view("cotizacion.show",["cotizacion" => $cotizacion, "detalles" => $detalles]);
        $pdf = PDF::loadView('orden.show', compact(['orden','detalles']));
        return $pdf->stream('my.pdf',array('Attachment'=>0));
    }

    public function imprimirFacturacion($id){

        $facturas=DB::table('facturacion as fac')
        ->join('adm_clientes as cl', 'fac.clientes_id','=','cl.id')
        ->join('municipios as m', 'm.id','=','cl.id_municipio')
        ->join('departamentos as d', 'm.departamento_id','=','d.id')
        ->where('fac.id_facturacion','=',$id)
        ->select('fac.*','cl.nom_cliente','m.nom_municipio','d.nom_departamento')
        ->first();

        $detalles=DB::table('detalles_factura as df')
            ->join('facturacion as fac','fac.id_facturacion','=','df.factura_id')
            ->join('adm_areas as a','a.id','=','df.area_id')
            ->join('adm_equipo as eq','eq.id_equipo','=','df.equipo_id')
            ->join('adm_item as it','it.id_item','=','df.item_id')
            ->join('rel_area_equipo as re',function($join){
                $join->on('a.id','=','re.areas_id');
                $join->on('eq.id_equipo','=','re.equipos_id');
            })
            ->select('df.*','eq.*','a.nombre_area','re.serial','re.placa','re.descripcion', 'it.*')
            ->where('df.factura_id','=',$id)
            ->get();

   

        //return view("cotizacion.show",["cotizacion" => $cotizacion, "detalles" => $detalles]);
        $pdf = PDF::loadView('facturacion.show', compact(['facturas','detalles']));
        return $pdf->stream('Factura_'.$facturas->cod_factura.'.pdf',array('Attachment'=>0));
    }
}