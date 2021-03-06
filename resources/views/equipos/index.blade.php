@extends('layouts.template')
@section('contenido')
<h1>ADMINISTRACIÓN DE EQUIPOS</h1>
        
<form method="POST" action="{{ url('administracion/equipos') }}">
  {{ csrf_field() }}
  <div class="row">
  	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 form-group">
      @foreach($cod as $c)
        <span class="text-danger">*</span><label>CODIGO No.</label>
        <input type="text" name="id_consecutivo" id="id_consecutivo" value="{{ $c->id_adm_consecutivo }}" hidden>
        <input type="text" name="num_actual" id="num_actual" value="{{ $c->num_actual }}" hidden>
        <input type="text" name="cod_equipo"  class="form-control bg-info text-white" value="{{ $c->prefijo_doc.' - '.$c->num_actual }}" readonly="readonly" required>
      @endforeach
  	</div>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 form-group">
  		<span class="text-danger">*</span><label>NOMBRE</label>
  		<input type="text" name="nom_equipo" class="form-control bg-info text-white" onkeyup="mayusculas(this);" required>
  	</div>
  	<div class="col-lg-3 col-md-3 col-sm-10 col-xs-10 form-group">
  		<span class="text-danger">*</span><label>CLASE DE EQUIPO</label>
  		<select id="clase_equipo" name="clase_equipo" class="form-control bg-info text-white selectpicker" data-live-search="true" required>
        @foreach($clase_equipos as $ce)
          <option value="{{ $ce->id_clase_equipo }}">{{ $ce->nom_clase_equipo }}</option>
        @endforeach  
      </select>

  	</div>
    <div class="col-lg-1 col-md-1 col-sm-2 col-xs-2 form-group">
      <label>&nbsp;</label>
      <button class="btn btn-primary form-control" data-toggle="modal" data-target="#modal-agregar-clase"><i class="fa fa-plus-circle" aria-hidden="true"></i> CLASE</button>
      
    </div>
  	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 form-group">
    		<span class="text-danger">*</span><label>MARCA</label>
    		<input type="text" name="marca" class="form-control bg-info text-white" onkeyup="mayusculas(this);" required>
  	</div>

    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 form-group">
  		<label>CARACTERISTICAS</label>
  		<textarea name="caracteristica_equipo" class="form-control bg-info text-white" onkeyup="mayusculas(this);"></textarea>
  	</div>
  	<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 form-group">
  		<label>OBSERVACIONES</label>
  		<textarea name="obs_equipo" class="form-control bg-info text-white" onkeyup="mayusculas(this);"></textarea>
  	</div>
    <div class="col-lg-2 col-md-2 col-sm-2 form-group">
      <label>&nbsp;</label>
      <button class="btn btn-primary form-control" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i>GUARDAR</button> 
    </div>
    <div class="col-lg-12 col-md-12  col-sm-12 col-xs-12 form-group">
              <span class="text-danger">* Campos Obligatorios</span>
              </div>

  </div>
</form>

@include('equipos.clases')

<br><br>

<div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  table-responsive">
    <table class=" table table-striped table-bordered" id="equipos">
      <thead class="thead-dark">
        <tr>
          <th>CODIGO</th>
          <th>NOMBRE</th>
          <th>CLASE</th>
          <th>MARCA</th>
          <th>CARACTERISTICAS</th>
          <th>OBSERVACIONES</th>
          <th>&nbsp;</th>
        </tr>
      </thead>
      <tbody>
        @foreach($equipos as $cl)
        @if($cl->activo == 0)
        <tr class="table-danger">
        @else
        <tr>
        @endif
          <td>{{ $cl->cod_equipo }}</td>
          <td>{{ $cl->nom_equipo }}</td>
          <td>{{ $cl->nom_clase_equipo }}</td>
          <td>{{ $cl->marca }}</td>
          <td>{{ $cl->caracteristica_equipo }}</td>
          <td>{{ $cl->obs_equipo }}</td>
          <td style="white-space:nowrap;">
            <a data-toggle="tooltip" data-placement="top" title="EDITAR EQUIPO"><button type="button" id="modal_editar" class="btn btn-primary" data-toggle="modal" data-target="#modal-edit-{{$cl->id_equipo}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
            @if(Auth::user()->rol == 'ADMINISTRADOR')
              @if($cl->activo == 1)
              <a data-toggle="tooltip" data-placement="top" title="DESACTIVAR EQUIPO"><button type="button" id="modal_eliminar" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-{{$cl->id_equipo}}"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
              @else
              <a data-toggle="tooltip" data-placement="top" title="ACTIVAR EQUIPO"><button type="button" id="modal_eliminar" class="btn btn-success" data-toggle="modal" data-target="#modal-activar-{{$cl->id_equipo}}"><i class="fa fa-arrow-up" aria-hidden="true"></i></button></a>
              @endif
            @endif
          </td>
        </tr>
        @include('equipos.activar')
        @include('equipos.edit')
        @include('equipos.delete')
        @endforeach
      </tbody>
    </table>
  </div>
</div>    

@endsection

@section('script')
  <script type="text/javascript">
    $(document).ready(function() {
        $('#equipos').DataTable({
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


          },
        order: [[0, "desc"]]

        });

        $("#form_agregar_clase").submit(function(e) {

          e.preventDefault();
          var form = $(this);
          var url = form.attr('action');

          $.ajax({
           url: url,
           method:'POST',
           data:form.serialize(),
           success:function(response){
              if(response.success){
                  nueva_clase = '<option value="'+response.id+'" selected>'+response.nom_clase_equipo+'</option>';
                  $('#clase_equipo').append(nueva_clase);
                  $('#clase_equipo').selectpicker('refresh');
                  $('#modal-agregar-clase').modal('hide');
              }else{
                  alert("Error")
              }

           },
           error:function(error){
              console.log(error)
           }
        });

          

          



        });



        
    });

    function mayusculas(e) {
      e.value = e.value.toUpperCase();
    }

  </script>
@endsection