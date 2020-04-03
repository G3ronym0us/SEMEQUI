<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\ConsecutivosFormRequest;
use App\Consecutivos;
use DB;

class ConsecutivosController extends Controller
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
        $consecutivos = Consecutivos::all();
        return view('consecutivos.index', ['consecutivos' => $consecutivos]);
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

        $nom_consecutivo = $request->get('nom_consecutivo');
        $consecutivo = DB::table('adm_consecutivo')
                                ->where('nom_consecutivo','=',$nom_consecutivo)
                                ->get();

        if (count($consecutivo) > 0) {
            foreach ($consecutivo as $con) {
                $id = $con->id_adm_consecutivo;
                $consecutivos=Consecutivos::findOrFail($id);
            }
        }else{
            $consecutivos = new Consecutivos;
        }

        $consecutivos->prefijo_doc=$request->get('prefijo_doc');
        $consecutivos->nom_consecutivo=$request->get('nom_consecutivo');
        $consecutivos->num_ini=$request->get('num_ini');
        $consecutivos->num_actual=$request->get('num_actual');
        $consecutivos->num_final=$request->get('num_final'); 

        
        if (count($consecutivo) > 0) {
            $consecutivos ->update();
        }else{
            $consecutivos ->save();
        } 
        return Redirect::to('administracion/consecutivos');
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
        $consecutivos=Consecutivos::findOrFail($id);
        $consecutivos->prefijo_doc=$request->get('prefijo_doc');
        $consecutivos->nom_consecutivo=$request->get('nom_consecutivo');
        $consecutivos->num_ini=$request->get('num_ini');
        $consecutivos->num_actual=$request->get('num_actual');
        $consecutivos->num_final=$request->get('num_final'); 

        $consecutivos ->save(); 
        return Redirect::to('administracion/consecutivos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $consecutivos = Consecutivos::find($id);
        $consecutivos->delete();
        return Redirect::to('administracion/consecutivos');
    }

    public function getConsecutivo($nom)
    {
        $consecutivo = DB::table('adm_consecutivo')
                                ->where('nom_consecutivo','=',$nom)
                                ->get();
        return response()->json($consecutivo);
    }
}
