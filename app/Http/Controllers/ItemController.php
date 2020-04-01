<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\ItemFormRequest;
use App\Item;
use DB;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item = Item::all();
        return view("items.index",["items"=>$item]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = Item::all();
        return view("items.create",["items"=>$items]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item=new Item;
        $item->cod_item=$request->get('cod_item');
        $item->nom_item=$request->get('nom_item');
        $item->costo_item=$request->get('costo_item');
        if ($request->get('servicio') == "true") {
            $item->servicio = true;
        }else{
            $item->servicio = false;
        }
        if ($request->get('activo') == "true") {
            $item->activo = true;
        }else{
            $item->activo = false;
        }
        

        $item->save();
        return Redirect::to('administracion/items');
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
        echo $id;
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
        $item=Item::findOrFail($id);

        $item->cod_item=$request->get('cod_item');
        $item->nom_item=$request->get('nom_item');
        $item->costo_item=$request->get('costo_item');
        if ($request->get('servicio') == "true") {
            $item->servicio = true;
        }else{
            $item->servicio = false;
        }
        if ($request->get('activo') == "true") {
            $item->activo = true;
        }else{
            $item->activo = false;
        }

        $item->update();
        return Redirect::to('administracion/items');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item=Item::findOrFail($id);
        $item->activo=0;
        $item->update();
        return Redirect::to('administracion/items');
    }

    public function activarItem($id)
    {
        $item = Item::findOrFail($id);
        $item->activo=1;

        $item->update(); 
        return Redirect::to('administracion/items');
        
    } 
}
