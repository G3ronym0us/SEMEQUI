@extends('layouts.template')
@section('contenido')
<h1>ADMINISTRACIÓN DE CONSECUTIVOS</h1>
        
<form method="POST" action="{{ url('administracion/consecutivos') }}">
  	{{ csrf_field() }}
  	
  	<div class="row">
    	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group">
      		<label>PREFIJO-DOC</label>
      		<input type="text" name="prefijo_doc" class="form-control bg-info text-white" required>
    	</div>
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 form-group">
    		<label>NOMBRE</label>
    		<input type="text" name="nom_consecutivo" class="form-control bg-info text-white" required>
    	</div>

    	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 form-group">
    		<label>NUMERO INICIO</label>
    		<input type="number" name="num_ini" class="form-control bg-info text-white" step="0.01" required>
    	</div>
    	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 form-group">
      		<label>NUMERO ACTUAL</label>
      		<input type="number" name="num_actual" class="form-control bg-info text-white" step="0.01" required>
    	</div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 form-group">
    		<label>NUMERO FINAL</label>
    		<input type="number" name="num_final" class="form-control bg-info text-white" step="0.01" required>
    	</div>
    	<div class="col-lg-1 col-md-1 col-sm-1">
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button> 
			</div>
        </div>  	
    </div>
</form>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><table class="table">
        <thead>
            <tr class="row">
              <th scope="col" class="col-lg-1 col-md-1 col-sm-1 col-xs-12">DOC</th>
              <th scope="col" class="col-lg-3 col-md-3 col-sm-3 col-xs-12">NOMBRE</th>
              <th scope="col" class="col-lg-2 col-md-2 col-sm-2 col-xs-12">N-INICIO</th>
              <th scope="col" class="col-lg-2 col-md-2 col-sm-2 col-xs-12">N-MACTUAL</th>
              <th scope="col" class="col-lg-2 col-md-2 col-sm-2 col-xs-12">N-FINAL</th>
              <th scope="col" class="col-lg-2 col-md-2 col-sm-2 col-xs-12"></th>
            </tr>
          </thead>
                                  <tbody>
                                    @foreach ($consecutivos as $con)
                                        <tr class="row">
                                            <td scope="col" class="col-lg-1 col-md-1 col-sm-1 col-xs-12">{{$con->prefijo_doc}}</td>
                                            <td scope="col" class="col-lg-3 col-md-3 col-sm-3 col-xs-12">{{$con->nom_consecutivo}}</td>
                                            <td scope="col" class="col-lg-2 col-md-2 col-sm-2 col-xs-12">{{$con->num_ini}}</td>
                                            <td scope="col" class="col-lg-2 col-md-2 col-sm-2 col-xs-12">{{$con->num_actual}}</td>
                                            <td scope="col" class="col-lg-2 col-md-2 col-sm-2 col-xs-12">{{$con->num_final}}</td>
                                            <td scope="col" class="col-lg-2 col-md-2 col-sm-2 col-xs-12"><a data-target="#modal-edit-{{$con->id_adm_consecutivo}}" data-toggle="modal"><button class="btn btn-info">Editar</button></a></td>    
                                    
            
          </td>
                                        </tr>

                                        @include('consecutivos.edit')
                                        @endforeach
                                    
                                  </tbody>
                                </table>
                        </div>
                </div>
        

@endsection