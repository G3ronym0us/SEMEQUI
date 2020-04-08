@extends('layouts.template')
@section('contenido')
<h1>ADMINISTRACIÓN DE CONSECUTIVOS</h1>
        
<form method="POST" action="{{ url('administracion/consecutivos') }}">
  	{{ csrf_field() }}
  	
  	<div class="row">
    	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group">
      		<label>PREFIJO-DOC</label>
      		<input type="text" name="prefijo_doc" id="prefijo_doc" class="form-control bg-info text-white" onkeyup="mayusculas(this);" required>
    	</div>
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 form-group">
    		<label>NOMBRE</label>
    		<select class="form-control bg-info text-white" name="nom_consecutivo" id="nom_consecutivo">
          <option value="COTIZACION">COTIZACION</option>
          <option value="ORDEN">ORDEN DE SERVICIO</option>
          <option value="FACTURACION">FACTURACION</option>
          <option value="CLIENTES">CLIENTES</option>
          <option value="EQUIPOS">EQUIPOS</option>
          <option value="ITEMS">ITEMS</option>
          <option value="AREAS">AREAS</option>
          <option value="FACTURACION">FACTURACION</option>
        </select>
    	</div>

    	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 form-group">
    		<label>NUMERO INICIO</label>
    		<input type="number" name="num_ini" id="num_ini" class="form-control bg-info text-white" onkeyup="actualizarActual();" step="0.01" required>
    	</div>
    	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 form-group">
      		<label>NUMERO ACTUAL</label>
      		<input type="number" name="num_actual" id="num_actual" class="form-control bg-info text-white" readonly="readonly" required>
    	</div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 form-group">
    		<label>NUMERO FINAL</label>
    		<input type="number" name="num_final" id="num_final" class="form-control bg-info text-white" step="0.01" required>
    	</div>
    	<div class="col-lg-2 col-md-2 col-sm-12">
			<div class="form-group">
        <label>&nbsp;</label>
				<button class="btn btn-primary form-control" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> GUARDAR</button> 
			</div>
        </div>  	
    </div>
</form>

<div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12z table-responsive">
    <table class="table table-striped table-bordered" id="consecutivos_table">
      <thead>
        <tr>
          <th>DOC</th>
          <th>NOMBRE</th>
          <th>N-INICIO</th>
          <th>N-MACTUAL</th>
          <th>N-FINAL</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($consecutivos as $con)
        <tr>
            <td>{{$con->prefijo_doc}}</td>
            <td>{{$con->nom_consecutivo}}</td>
            <td>{{$con->num_ini}}</td>
            <td>{{$con->num_actual}}</td>
            <td>{{$con->num_final}}</td>
            <td>
              <!--<a data-target="#modal-edit-{{$con->id_adm_consecutivo}}" data-toggle="modal"><button class="btn btn-info">EDITAR</button></a>-->
              <a data-toggle="tooltip" data-placement="top" title="ELIMINAR CONSECUTIVO"><button type="button" id="modal_eliminar" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-{{$con->id_adm_consecutivo}}"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
            </td>    
        </tr>
            @include('consecutivos.delete')
            @include('consecutivos.edit')
            @endforeach
        
      </tbody>
    </table>
  </div>
</div>
        

@endsection

@section('script')

<script type="text/javascript">
  $(document).ready(function() {
      $('#consecutivos_table').DataTable({
        language: {
          info: "_TOTAL_ REGISTROS",
          search: "BUSCAR",
          paginate: {
            next: "SIGUIENTE",
            previous: "ANTERIOR"
          },
          lengthMenu: 'MOSTRAR <select>'+
                      '<option value="10">10</option>'+
                      '<option value="25">25</option>'+
                      '<option value="50">50</option>'+
                      '</select> REGISTROS',
          loadingRecords:"CARGANDO...",
          processing:"PROCESANDO...",
          emptyTable:"NO HAY DATOS",
          zeroRecords:"NO HAY CONCIDENCIAS",
          infoEmpty:"",
          infoFiltered:""
        }

      });

      nombre = $('#nom_consecutivo').val();
      getConsecutivo(nombre);
      
  });

  function mayusculas(e) {
    e.value = e.value.toUpperCase();
  }

  function actualizarActual(){
    valor = $('#num_ini').val();
    $('#num_actual').val(valor);
  }

  $("#nom_consecutivo").change(function(){
    nombre = $('#nom_consecutivo').val();
    getConsecutivo(nombre);
  });

  function getConsecutivo(nom){
    $.get("/getConsecutivo/"+nom,function(response) {
      $('#prefijo_doc').val(response[0].prefijo_doc);
      $('#num_ini').val(response[0].num_ini);
      $('#num_actual').val(response[0].num_actual);
      $('#num_final').val(response[0].num_final);
  });
  }



</script>

@endsection