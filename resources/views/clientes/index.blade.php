@extends('layouts.template')
@section('contenido')
<h1>ADMINISTRACIÓN DE CLIENTES</h1>
        
<form method="POST" action="{{ url('administracion/clientes') }}">
  	{{ csrf_field() }}
  	
  	<div class="row">
    	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 form-group">
      		<label>CODIGO No.</label>
      		<input type="text" name="cod_cliente" class="form-control bg-info text-white" required>
    	</div>
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 form-group">
    		<label>DEPARTAMENTO:</label>
    		<select name="id_departamento" class="form-control bg-info text-white">
          <option value="1">PASTO</option>  
        </select>
    	</div>

    	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 form-group">
    		<label>MUNICIPIO:</label>
    		<select name="id_municipio" class="form-control bg-info text-white">
          <option value="1">MARINO</option>  
        </select>
    	</div>
    	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 form-group">
      		<label>NIT/CC:</label>
      		<input type="number" name="nit_cliente" class="form-control bg-info text-white" step="0.01" required>
    	</div>
      <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 form-group">
    		<label>TIPO:</label>
    		<select name="tipo_cliente" class="form-control bg-info text-white">
          <option value="NATURAL">NATURAL</option>
          <option value="JURIDICO">JURIDICO</option>  
        </select>
    	</div>
      <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 form-group">
          <label>CLIENTE:</label>
          <input type="text" name="nom_cliente" class="form-control bg-info text-white" step="0.01" required>
      </div>
      <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 form-group">
        <label>DIRECCION</label>
        <input type="text" name="dir_cliente" class="form-control bg-info text-white" step="0.01" required>
      </div>

      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 form-group">
        <label>TELEFONO:</label>
        <input type="tel" name="tel_cliente" class="form-control bg-info text-white" step="0.01" required>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 form-group">
          <label>CELULAR:</label>
          <input type="tel" name="cel_cliente" class="form-control bg-info text-white" step="0.01" required>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group">
        <label>CORREO</label>
        <input type="email" name="correo_cliente" class="form-control bg-info text-white" step="0.01" required>
      </div>
      <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 form-group">
        <label>STATUS:</label>
        <select name="status" class="form-control bg-info text-white">
          <option value="activo">ACTIVO</option>
          <option value="inactivo">INACTIVO</option>  
        </select>
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
              <th scope="col" class="col-lg-1 col-md-1 col-sm-1 col-xs-12">CODIGO</th>
              <th scope="col" class="col-lg-2 col-md-2 col-sm-2 col-xs-12">UBICACION</th>
              <th scope="col" class="col-lg-1 col-md-1 col-sm-1 col-xs-12">IDEN</th>
              <th scope="col" class="col-lg-1 col-md-1 col-sm-1 col-xs-12">CLIENTE</th>
              <th scope="col" class="col-lg-2 col-md-2 col-sm-2 col-xs-12">DIRECCION</th>
              <th scope="col" class="col-lg-1 col-md-1 col-sm-1 col-xs-12">TELEFONO</th>
              <th scope="col" class="col-lg-1 col-md-1 col-sm-1 col-xs-12">CELULAR</th>
              <th scope="col" class="col-lg-1 col-md-1 col-sm-1 col-xs-12">CORREO</th>
              <th scope="col" class="col-lg-1 col-md-1 col-sm-1 col-xs-12">ESTADO</th>
              <th scope="col" class="col-lg-1 col-md-1 col-sm-1 col-xs-12"></th>
            </tr>
          </thead>
                                  <tbody>
                                    @foreach ($clientes as $cliente)
                                        <tr class="row">
                                            <td scope="col" class="col-lg-1 col-md-1 col-sm-1 col-xs-12">{{$cliente->cod_cliente}}</td>
                                            <td scope="col" class="col-lg-2 col-md-2 col-sm-2 col-xs-12">{{$cliente->id_municipio}}</td>
                                            <td scope="col" class="col-lg-1 col-md-1 col-sm-1 col-xs-12">{{$cliente->nit_cliente}}</td>
                                            <td scope="col" class="col-lg-1 col-md-1 col-sm-1 col-xs-12">{{$cliente->nom_cliente}}</td>
                                            <td scope="col" class="col-lg-2 col-md-2 col-sm-2 col-xs-12">{{$cliente->dir_cliente}}</td>
                                            <td scope="col" class="col-lg-1 col-md-1 col-sm-1 col-xs-12">{{$cliente->tel_cliente}}</td>
                                            <td scope="col" class="col-lg-1 col-md-1 col-sm-1 col-xs-12">{{$cliente->cel_cliente}}</td>
                                            <td scope="col" class="col-lg-1 col-md-1 col-sm-1 col-xs-12">{{$cliente->correo_cliente}}</td>
                                            <td scope="col" class="col-lg-1 col-md-1 col-sm-1 col-xs-12">{{$cliente->status}}</td>
                                            <td scope="col" class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
                                              <a data-target="#modal-equipos-{{$cliente->id_cliente}}" data-toggle="modal">
                                                <button class="btn btn-info">Equipos</button>
                                              </a>
                                              <a data-target="#modal-areas-{{$cliente->id_cliente}}" data-toggle="modal">
                                                <button class="btn btn-info">Areas</button>
                                              </a>
                                            </td>    
                                    
            
          </td>
                                        </tr>

                                        <?php $areas = App\Clientes::find($cliente->id)->areas; ?>
                                        <?php $equipos = App\Equipos::all(); ?>


                                        @include('clientes.equipos')
                                        @include('clientes.areas')
                                        @endforeach
                                    
                                  </tbody>
                                </table>
                        </div>
                </div>
        

@endsection