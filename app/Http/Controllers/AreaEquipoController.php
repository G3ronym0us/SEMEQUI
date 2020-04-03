<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\AreaEquipoFormRequest;
use App\AreaEquipo;
use DB;

class AreaEquipoController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $areas = new AreaEquipo;
        if ($request->get('ajax')) {
            $areas->areas_id=$request->get('area_id_me');
            $areas->equipos_id=$request->get('equipo_id_me');
        }else{
            $areas->areas_id=$request->get('area_id');
        $areas->equipos_id=$request->get('equipo_id');
        }
        
        $areas->serial=$request->get('serial');
        $areas->placa=$request->get('placa');
        $areas->descripcion=$request->get('descripcion');

        $areas ->save(); 
        if ($request->get('ajax')) {
            return response()->json($areas);
        }else{
            return Redirect::to('administracion/clientes');
        }
        
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

    public function getEquiposForArea($id)
    {
        $rel = DB::table('rel_area_equipo as rel')
                          ->join('adm_areas as aa','aa.id','=','rel.areas_id')
                          ->join('adm_equipo as ae','ae.id_equipo','=','rel.equipos_id')
                          ->where('aa.clientes_id','=',$id)
                          ->select('aa.nombre_area','ae.nom_equipo','rel.*')
                          ->get(); 
        return response()->json($rel);   
    }
}
