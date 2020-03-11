@extends('layouts.template')
@section('contenido')

        <h1>ADMINISTRACIÓN DE EMPRESA</h1>
        
                <form method="POST" action="{{ url('administracion/items') }}">

                {{ csrf_field() }}
                <div class="row">
                	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group">
                		<label>CODIGO No.</label>
                		<input type="text" name="cod_item" class="form-control bg-info text-white">
                	</div>
                	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 form-group">
                		<label>NOMBRE</label>
                		<input type="text" name="nom_item" class="form-control bg-info text-white">
                	</div>

                	<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 form-group">
                		<label>COSTO $:</label>
                		<input type="text" name="costo_item" class="form-control bg-info text-white">
                	</div>
                	<div class="col-lg-2 col-md-2 col-sm-2 form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="servicio" value="true">
                          <label class="form-check-label" for="inlineCheckbox1">SERVICIO</label>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="producto" value="true">
                          <label class="form-check-label" for="inlineCheckbox2">PRODUCTO</label>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="activo" value="true" disabled>
                          <label class="form-check-label" for="inlineCheckbox3">ACTIVO</label>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                        <button class="btn btn-primary" type="submit">Guardar</button>
                                        <button class="btn btn-danger" type="reset">Cancelar</button>
                                </div>
                        </div>
                       
                	
                </div>
                </form>+


                <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <table class="table">
                                  <thead>
                                    <tr>
                                      <th scope="col" class="col-lg-1 col-md-1 col-sm-1 col-xs-12">CODIGO</th>
                                      <th scope="col" class="col-lg-2 col-md-2 col-sm-2 col-xs-12">NOMBRE</th>
                                      <th scope="col" class="col-lg-2 col-md-2 col-sm-2 col-xs-12">COSTO</th>
                                      <th scope="col" class="col-lg-2 col-md-2 col-sm-2 col-xs-12">SERVICIO</th>
                                      <th scope="col" class="col-lg-3 col-md-3 col-sm-3 col-xs-12">PRODUCTO</th>
                                      <th scope="col" class="col-lg-2 col-md-2 col-sm-2 col-xs-12">ACTIVO</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ($items as $item)
                                        <tr>
                                                <td>{{$item->cod_item}}</td>
                                                <td>{{$item->nom_item}}</td>
                                                <td>{{$item->costo_item}}</td>
                                                <td>{{$item->servicio}}</td>
                                                <td>{{$item->activo}}</td>
                                                <td>
                                                        <a href="{{URL::action('ArticuloController@edit',$art->idarticulo)}}"><button class="btn btn-info">Editar</button></a>
                                                        <a href="" data-target="#modal-delete-{{$art->idarticulo}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                                                </td>
                                        </tr>
                                        @include('almacen.articulo.modal')
                                        @endforeach
                                    
                                  </tbody>
                                </table>
                        </div>
                </div>
        

@endsection