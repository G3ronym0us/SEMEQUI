<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\EquiposFormRequest;
use App\Equipos;
use App\ClaseEquipo;
use App\Consecutivos;
use DB;

class EquiposController extends Controller
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
        $cod = DB::table('adm_consecutivo')
                    ->select('*')
                    ->where('nom_consecutivo','=','EQUIPOS')
                    ->get();
         $equipos = DB::table('adm_equipo as e')
            ->join('adm_clase_equipo as ce', 'e.id_clase_equipo', '=', 'ce.id_clase_equipo')
            ->select('e.*', 'ce.nom_clase_equipo')
            ->get();

        $clase_equipos = DB::table('adm_clase_equipo')->get();
        return view('equipos.index', ['equipos' => $equipos, 'clase_equipos' => $clase_equipos, 'cod' => $cod]);
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
            $equipos->id_clase_equipo=$request->get('clase_equipo');
            $equipos->cod_equipo=$request->get('cod_equipo');
            $equipos->nom_equipo=$request->get('nom_equipo');
            $equipos->marca=$request->get('marca');
            $equipos->caracteristica_equipo=$request->get('caracteristica_equipo');
            $equipos->activo=1;
            $equipos->obs_equipo=$request->get('obs_equipo'); 

            $equipos->save(); 

            $id_consecutivo = $request->get('id_consecutivo');
        $num_actual = $request->get('num_actual');
        $con = Consecutivos::findOrFail($id_consecutivo);
        $con->num_actual = (int)$num_actual + 1;
        $con->update();

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
        $equipos = Equipos::findOrFail($id);
        $equipos->activo=0;

        $equipos->update(); 
        return Redirect::to('administracion/equipos');
    }

    public function activarEquipo($id)
    {
        $equipos = Equipos::findOrFail($id);
        $equipos->activo=1;

        $equipos->update(); 
        return Redirect::to('administracion/equipos');
        
    } 

    public function agregarClase(Request $request)
    {

        $clase_equipo=new ClaseEquipo;

        $clase_equipo->nom_clase_equipo=$request->nom_clase_equipo;
        $clase_equipo->des_clase_equipo=$request->des_clase_equipo;
        $clase_equipo->activo=1;

        $clase_equipo->save();

        return response()->json(
            [
                'success' => true,
                'message' => 'Data inserted successfully',
                'id' => $clase_equipo->id_clase_equipo
            ]
        );
    }

    public function getEquiposList(){
        $equipos = Equipos::all();
        return response()->json($equipos);
    }
}
