<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\ClientesFormRequest;
use App\Clientes;
use App\Areas;
use App\Consecutivos;
use DB;

class ClientesController extends Controller
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
                    ->where('nom_consecutivo','=','CLIENTES')
                    ->get();
       $clientes = Clientes::all();
       $departamentos = DB::table('departamentos')->select('*')->get();
       return view('clientes.index', ['clientes' => $clientes, 'departamentos' => $departamentos, 'cod' => $cod]);
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

        if ($request->get('tipo_cliente') == 'NATURAL') {
            
            $areas = new Areas;
            $areas->clientes_id=$clientes->id;
            $areas->cod_area=1;
            $areas->nombre_area='PERSONAL';
            $areas ->save(); 

        }

        $id_consecutivo = $request->get('id_consecutivo');
        $num_actual = $request->get('num_actual');
        $con = Consecutivos::findOrFail($id_consecutivo);
        $con->num_actual = (int)$num_actual + 1;
        $con->update();

        if ($request->get('ajax')) {
            return response()->json($clientes->id);
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
        $clientes = Clientes::findOrFail($id);
        $clientes->cod_cliente=$request->get('cod_cliente');
        $clientes->nom_cliente=$request->get('nom_cliente');
        $clientes->nit_cliente=$request->get('nit_cliente');
        $clientes->dir_cliente=$request->get('dir_cliente');
        $clientes->tel_cliente=$request->get('tel_cliente');
        $clientes->cel_cliente=$request->get('cel_cliente');
        $clientes->correo_cliente=$request->get('correo_cliente');

        $clientes->update(); 
        return Redirect::to('administracion/clientes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $clientes = Clientes::findOrFail($id);
        $clientes->status='INACTIVO';

        $clientes->update(); 
        return Redirect::to('administracion/clientes');
    }

    public function ClientesList()
    {
        $clientes = DB::table('adm_clientes')->select('*');
        return datatables()->of($clientes)
            ->make(true);
    }

      public function getMunicipios(Request $request, $id)
    {
        if ($request->ajax()) {
            $municipios=DB::table('municipios')
            ->where('departamento_id','=',$id)
            ->get();
         return response()->json($municipios);
        }
        
    } 

     public function activarClientes($id)
    {
        $clientes = Clientes::findOrFail($id);
        $clientes->status='ACTIVO';

        $clientes->update(); 
        return Redirect::to('administracion/clientes');
        
    } 
    public function getDatosCliente(Request $request, $id)
    {
        if ($request->ajax()) {
            $cliente = Clientes::findOrFail($id);
            return response()->json($cliente);
        }
        
    } 
}
