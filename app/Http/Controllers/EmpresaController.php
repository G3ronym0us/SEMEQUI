<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\EmpresaFormRequest;
use App\Empresa;
use DB;

class EmpresaController extends Controller
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
        $empresa = Empresa::all();
        return view('empresa.index', ['empresa' => $empresa]);
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
            $empresa = Empresa::first();
            if (!($empresa)) {
                $empresa=new Empresa;
            }
            $empresa->id_municipio=$request->get('id_municipio');
            $empresa->cod_empresa=$request->get('cod_empresa');
            $empresa->nit_empresa=$request->get('nit_empresa');
            $empresa->nom_empresa=$request->get('nom_empresa');
            $empresa->dir_empresa=$request->get('dir_empresa');
            $empresa->tel_empresa=$request->get('tel_empresa');
            $empresa->cel_empresa=$request->get('cel_empresa');
            $empresa->mail=$request->get('mail');
            if($request->hasFile('logo')){
                $file=$request->file('logo');
                $file->move(public_path().'/img/empresa/',$file->getClientOriginalName());
                $empresa->logo=$file->getClientOriginalName();
            } 
            if (!($empresa)) {
                $empresa->save();    
            }else{
                $empresa->update();
            }
        
        return Redirect::to('administracion/empresa');
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
        $empresa=Empresa::findOrFail($id);

            $empresa->id_municipio=$request->get('id_municipio');
            $empresa->cod_empresa=$request->get('cod_empresa');
            $empresa->nit_empresa=$request->get('nit_empresa');
            $empresa->nom_empresa=$request->get('nom_empresa');
            $empresa->dir_empresa=$request->get('dir_empresa');
            $empresa->tel_empresa=$request->get('tel_empresa');
            $empresa->cel_empresa=$request->get('cel_empresa');
            $empresa->mail=$request->get('mail');
            $empresa->logo=$request->get('logo'); 

            $empresa->update();
            return Redirect::to('administracion/empresa');
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
