<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\ClientesFormRequest;
use App\Clientes;
use DB;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $clientes = Clientes::all();
        return view('clientes.index', ['clientes' => $clientes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $clientes = new Clientes;
        $clientes->id_municipio=$request->get('id_municipio');
        $clientes->cod_cliente=$request->get('cod_cliente');
        $clientes->nom_cliente=$request->get('nom_cliente');
        $clientes->nit_cliente=$request->get('nit_cliente');
        $clientes->tipo_cliente=$request->get('tipo_cliente');
        $clientes->dir_cliente=$request->get('dir_cliente');
        $clientes->tel_cliente=$request->get('tel_cliente');
        $clientes->cel_cliente=$request->get('cel_cliente');
        $clientes->correo_cliente=$request->get('correo_cliente');
        $clientes->status=$request->get('status');  

        $clientes ->save(); 
        return Redirect::to('administracion/clientes');
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
