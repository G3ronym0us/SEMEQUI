@extends('layouts.template')
@section('contenido')
<h1>ADMINISTRACIÓN DE EQUIPOS</h1>
        
<form method="POST" action="{{ url('administracion/equipos') }}">
  	{{ csrf_field() }}
  	
  	<div class="row">
    	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group">
      		<label>CODIGO No.</label>
      		<input type="text" name="cod_equipo" class="form-control bg-info text-white" required>
    	</div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group">
    		<label>NOMBRE</label>
    		<input type="text" name="nom_equipo" class="form-control bg-info text-white" required>
    	</div>

    	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group">
    		<label>CLASE</label>
    		<input type="text" name="id_clase_equipo" class="form-control bg-info text-white" step="0.01" required>
    	</div>
    	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group">
      		<label>MARCA</label>
      		<input type="text" name="marca" class="form-control bg-info text-white" required>
    	</div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group">
    		<label>CARACTERISTICAS</label>
    		<textarea name="caracteristica_equipo"></textarea>
    	</div>

    	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group">
    		<label>OBSERVACIONES</label>
    		<textarea name="obs_equipo"></textarea>
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
                                      <th scope="col" class="col-lg-2 col-md-2 col-sm-2 col-xs-12">NOMBRE</th>
                                      <th scope="col" class="col-lg-1 col-md-1 col-sm-1 col-xs-12">CLASE</th>
                                      <th scope="col" class="col-lg-1 col-md-1 col-sm-1 col-xs-12">MARCA</th>
                                      <th scope="col" class="col-lg-3 col-md-3 col-sm-3 col-xs-12">CARACTERISTICAS</th>
                                      <th scope="col" class="col-lg-2 col-md-2 col-sm-2 col-xs-12">OBSERVACIONES</th>
                                      <th scope="col" class="col-lg-1 col-md-1 col-sm-1 col-xs-12">ACTIVO</th>
                                      <th scope="col" class="col-lg-1 col-md-1 col-sm-1 col-xs-12"></th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ($equipos as $eq)
                                        <tr class="row">
                                                <td scope="col" class="col-lg-1 col-md-1 col-sm-1 col-xs-12">{{$eq->cod_equipo}}</td>
                                                <td scope="col" class="col-lg-2 col-md-2 col-sm-2 col-xs-12">{{$eq->nom_equipo}}</td>
                                                <td scope="col" class="col-lg-1 col-md-1 col-sm-1 col-xs-12">{{$eq->id_clase_equipo}}</td>
                                                <td scope="col" class="col-lg-1 col-md-1 col-sm-1 col-xs-12">{{$eq->marca}}</td>
                                                <td scope="col" class="col-lg-3 col-md-3 col-sm-3 col-xs-12">{{$eq->caracteristica_equipo}}</td>
                                                <td scope="col" class="col-lg-2 col-md-2 col-sm-2 col-xs-12">{{$eq->obs_equipo}}</td>
                                                <td scope="col" class="col-lg-1 col-md-1 col-sm-1 col-xs-12">{{$eq->activo}}</td>
                                                <td scope="col" class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
                                    <a data-target="#modal-edit-{{$eq->id_equipo}}" data-toggle="modal"><button class="btn btn-info">Editar</button></a>
            
          </td>
                                        </tr>

                                        @include('equipos.edit')
                                        @endforeach
                                    
                                  </tbody>
                                </table>
                        </div>
                </div>
        

@endsection