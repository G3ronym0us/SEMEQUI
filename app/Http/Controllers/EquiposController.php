<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\EquiposFormRequest;
use App\Equipos;
use DB;

class EquiposController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $equipos = Equipos::all();
        return view('equipos.index', ['equipos' => $equipos]);
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
        $equipos=new Equipos;
            $equipos->id_clase_equipo=$request->get('id_clase_equipo');
            $equipos->cod_equipo=$request->get('cod_equipo');
            $equipos->nom_equipo=$request->get('nom_equipo');
            $equipos->marca=$request->get('marca');
            $equipos->caracteristica_equipo=$request->get('caracteristica_equipo');
            $equipos->activo=$request->get('activo');
            $equipos->obs_equipo=$request->get('obs_equipo'); 

            $equipos->save(); 
            return Redirect::to('administracion/equipos');
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
        $equipos=Equipos::findOrFail($id);
            $equipos->id_clase_equipo=$request->get('id_clase_equipo');
            $equipos->cod_equipo=$request->get('cod_equipo');
            $equipos->nom_equipo=$request->get('nom_equipo');
            $equipos->marca=$request->get('marca');
            $equipos->caracteristica_equipo=$request->get('caracteristica_equipo');
            $equipos->activo=$request->get('activo');
            $equipos->obs_equipo=$request->get('obs_equipo'); 

            $equipos->update(); 
            return Redirect::to('administracion/equipos');
    
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
}
