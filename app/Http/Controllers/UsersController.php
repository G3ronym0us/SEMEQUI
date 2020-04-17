<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth as Auth;
use App\User;
use App\Rol;
use DB;

class UsersController extends Controller
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
        $users = User::All();
        $roles = Rol::All();
        return view('seguridad.usuarios.index',[ 'users'=>$users, 'roles'=>$roles ]);
    }
    public function usersList()
    {
        $users = DB::table('users')->select('*');
        return datatables()->of($users)
            ->make(true);
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
        $clientes = new User;
        $clientes->email=$request->get('email');
        $clientes->name=$request->get('name');
        $clientes->password=Hash::make($request->get('password'));
        $clientes->rol=$request->get('rol');

        $clientes ->save(); 
         return Redirect::to('seguridad/usuarios');
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
        $user = User::findOrFail($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->rol = $request->get('rol');
        $user->update();

        return Redirect::to('seguridad/usuarios');
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

    public function cPassword(Request $request)
    {
        $id = Auth::user()->id;
        $user = User::findOrFail($id);
        $user->password = $request->get('cpassword');
        $user->update();

        return Redirect::to('/');
    }

    public function comprobarPAssword(Request $request, $password)
    {
        $aPassword = Auth::user()->password;
        if (Hash::check($password, $aPassword)) {
            $result = true;
        }else{
            $result = false;
        }
            return response()->json($result);

    }
}
