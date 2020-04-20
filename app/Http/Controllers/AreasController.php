<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\AreasFormRequest;
use App\Areas;
use App\Consecutivos;
use DB;


class AreasController extends Controller
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
        $areas = new Areas;

        if ($request->get('ajax')) {
            $areas->cod_area=$request->get('cod_area_ma');
            $areas->nombre_area=$request->get('nombre_area_ma'); 
            $areas->clientes_id=$request->get('id_cliente_ma');       
        }else{
            $areas->cod_area=$request->get('cod_area');
            $areas->nombre_area=$request->get('nombre_area');
            $areas->clientes_id=$request->get('id_cliente');
        }

        
        $areas ->save();

        if ($request->get('ajax')) {
            $id_consecutivo = $request->get('id_consecutivo_ma');
            $num_actual = $request->get('num_actual_ma');
        }else{
            $id_consecutivo = $request->get('id_consecutivo_ar');
            $num_actual = $request->get('num_actual_ar');
        }
        
        $con = Consecutivos::findOrFail($id_consecutivo);
        $con->num_actual = (int)$num_actual + 1;
        $con->update();

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
}
