@extends('layouts.template')
@section('contenido')
<h1>ADMINISTRACIÓN DE ITEMS</h1>
        
<form method="POST" action="{{ url('administracion/items') }}">
  {{ csrf_field() }}
  <div class="row">
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group">
      <label>CODIGO No.</label>
      <input type="text" name="cod_item" class="form-control bg-info text-white" required>
    </div>
                	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 form-group">
                		<label>NOMBRE</label>
                		<input type="text" name="nom_item" class="form-control bg-info text-white" required>
                	</div>

                	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group">
                		<label>COSTO $:</label>
                		<input type="number" name="costo_item" class="form-control bg-info text-white" step="0.01" required>
                	</div>
                	<div class="col-lg-2 col-md-2 col-sm-2 form-check form-check-inline">
                          <input class="form-check-input" type="radio" id="servicio" name="servicio" value="true" checked="true">
                          <label class="form-check-label" for="inlineCheckbox1">SERVICIO</label>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 form-check form-check-inline">
                          <input class="form-check-input" type="radio" id="servicio" name="servicio" value="false ">
                          <label class="form-check-label" for="inlineCheckbox2">PRODUCTO</label>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="activo" name="activo" value="true" checked="true">
                          <label class="form-check-label" for="inlineCheckbox3">ACTIVO</label>
                        </div>
                        <div class="col-lg-1 col-md-1 col-sm-1">
                          <div class="form-group">
                            <button class="btn btn-primary" type="submit">Guardar</button> 
                          </div>
                        </div>
                       
                	
                </div>
                </form>


                <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <table class="table">
                                  <thead>
                                    <tr class="row">
                                      <th scope="col" class="col-lg-1 col-md-1 col-sm-1 col-xs-12">CODIGO</th>
                                      <th scope="col" class="col-lg-3 col-md-3 col-sm-3 col-xs-12">NOMBRE</th>
                                      <th scope="col" class="col-lg-2 col-md-2 col-sm-2 col-xs-12">COSTO</th>
                                      <th scope="col" class="col-lg-1 col-md-1 col-sm-1 col-xs-12">SERVICIO</th>
                                      <th scope="col" class="col-lg-1 col-md-1 col-sm-1 col-xs-12">PRODUCTO</th>
                                      <th scope="col" class="col-lg-1 col-md-1 col-sm-1 col-xs-12">ACTIVO</th>
                                      <th scope="col" class="col-lg-2 col-md-2 col-sm-2 col-xs-12">OPCIONES</th>
                                    </tr>
                                  </thead>0
                                  <tbody>
                                    @foreach ($items as $item)
                                        <tr class="row">
                                                <td scope="col" class="col-lg-1 col-md-1 col-sm-1 col-xs-12">{{$item->cod_item}}</td>
                                                <td scope="col" class="col-lg-3 col-md-3 col-sm-3 col-xs-12">{{$item->nom_item}}</td>
                                                <td scope="col" class="col-lg-2 col-md-2 col-sm-2 col-xs-12">{{$item->costo_item}}</td>
                                                @if($item->servicio == true)
                                                <td scope="col" class="col-lg-1 col-md-1 col-sm-1 col-xs-12">true</td>
                                                <td scope="col" class="col-lg-1 col-md-1 col-sm-1 col-xs-12"></td>
                                                @else
                                                <td scope="col" class="col-lg-1 col-md-1 col-sm-1 col-xs-12"></td>
                                                <td scope="col" class="col-lg-1 col-md-1 col-sm-1 col-xs-12">true</td>
                                                @endif
                                                <td scope="col" class="col-lg-1 col-md-1 col-sm-1 col-xs-12">{{$item->activo}}</td>
                                                <td scope="col" class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                    <a data-target="#modal-edit-{{$item->id_item}}" data-toggle="modal"><button class="btn btn-info">Editar</button></a>
            
          </td>
                                        </tr>

                                        @include('items.edit')
                                        @endforeach
                                    
                                  </tbody>
                                </table>
                        </div>
                </div>
        

@endsection