@extends('layouts.template')
@section('contenido')
<h1>ADMINISTRACIÓN DE CLIENTES</h1>
        
<form method="POST" action="{{ url('administracion/clientes') }}">
	{{ csrf_field() }}
	
	<div class="row">

  	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 form-group">
      @foreach($cod as $c)
    		<span class="text-danger">*</span><label>CODIGO No.</label>
        <input type="text" name="id_consecutivo" id="id_consecutivo" value="{{ $c->id_adm_consecutivo }}" hidden>
        <input type="text" name="num_actual" id="num_actual" value="{{ $c->num_actual }}" hidden>
    		<input type="text" name="cod_cliente"  class="form-control bg-info text-white" value="{{ $c->prefijo_doc.' - '.$c->num_actual }}" readonly="readonly" required>
      @endforeach
  	</div>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 form-group">
  		<span class="text-danger">*</span><label>DEPARTAMENTO:</label>
  		<select name="id_departamento"  id="id_departamento" class="form-control bg-info text-white selectpicker" data-live-search="true">
        @foreach($departamentos as $d)
          @if($d->nom_departamento == 'NARIÑO')
            <option value="{{ $d->id }}" selected>{{ $d->nom_departamento }}</option>
          @else
            <option value="{{ $d->id }}">{{ $d->nom_departamento }}</option>
          @endif
        @endforeach  
      </select>
  	</div>

  	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 form-group">
  		<span class="text-danger">*</span><label>MUNICIPIO:</label>
  		<select name="id_municipio" id="id_municipio" class="form-control bg-info text-white selectpicker" data-live-search="true">
         
      </select>
  	</div>
  	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 form-group">
    		<span class="text-danger">*</span><label>NIT/CC:</label>
    		<input type="number" name="nit_cliente" class="form-control bg-info text-white" step="0.01" required>
  	</div>
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 form-group">
  		<span class="text-danger">*</span><label>TIPO:</label>
  		<select name="tipo_cliente" class="form-control bg-info text-white">
        <option value="NATURAL">NATURAL</option>
        <option value="JURIDICO">JURIDICO</option>  
      </select>
  	</div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group">
        <span class="text-danger">*</span><label>CLIENTE:</label>
        <input type="text" name="nom_cliente" onkeyup="mayusculas(this);" class="form-control bg-info text-white" step="0.01" required>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group">
      <span class="text-danger">*</span><label>DIRECCION</label>
      <input type="text" name="dir_cliente" onkeyup="mayusculas(this);" class="form-control bg-info text-white" step="0.01" required>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 form-group">
      <span class="text-danger">*</span><label>STATUS:</label>
      <select name="status" class="form-control bg-info text-white">
        <option value="ACTIVO">ACTIVO</option>
        <option value="INACTIVO">INACTIVO</option>  
      </select>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 form-group">
      <label>TELEFONO:</label>
      <input type="tel" name="tel_cliente" title="INGRESE UN NUMERO TELEFONICO" class="form-control bg-info text-white" >
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 form-group">
        <label>CELULAR:</label>
        <input type="tel" name="cel_cliente" class="form-control bg-info text-white" title="INGRESE UN NUMERO TELEFONICO">
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group">
      <label>CORREO</label>
      <input type="email" name="correo_cliente" onkeyup="mayusculas(this);" class="form-control bg-info text-white">
    </div>
    

  	<div class="col-lg-2 col-md-2 col-sm-2">
			<div class="form-group">
        <label>&nbsp;</label>
				<button class="btn btn-success form-control" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;GUARDAR</button> 
			</div>
    </div>
    <div class="col-lg-12 col-md-12  col-sm-12 col-xs-12 form-group">
              <span class="text-danger">* Campos Obligatorios</span>
              </div>  	
  </div>
</form>

<br><br>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table-responsive">
      <table class="table table-striped table-bordered" id="clientes">
        <thead class="thead-dark">
          <tr>
            <th>CODIGO</th>
            <th>IDEN</th>
            <th>CLIENTE</th>
            <th>DIRECCION</th>
            <th>TELEFONO</th>
            <th>CELULAR</th>
            <th>CORREO</th>
            <th>OPCIONES</th>
          </tr>
        </thead>
        <tbody>
          @foreach($clientes as $cl)
          @if($cl->status == 'INACTIVO')
          <tr class="table-danger">
          @else
            <tr>
          @endif
              <td>{{ $cl->cod_cliente }}</td>
              <td>{{ $cl->nit_cliente }}</td>
              <td>{{ $cl->nom_cliente }}</td>
              <td>{{ $cl->dir_cliente }}</td>
              <td>{{ $cl->tel_cliente }}</td>
              <td>{{ $cl->cel_cliente }}</td>
              <td>{{ $cl->correo_cliente }}</td>
              <td>
                <div style="white-space:nowrap;">
                @if($cl->tipo_cliente == 'JURIDICO')
                  <a data-toggle="tooltip" data-placement="top" title="ASIGNAR AREAS"><button type="button" id="modal_areas" class="btn btn-info" data-toggle="modal" data-target="#modal-areas-{{$cl->id}}"><i class="fa fa-building-o" aria-hidden="true"></i></button></a>
                @endif
                  <a data-toggle="tooltip" data-placement="top" title="ASIGNAR EQUIPOS"><button type="button" id="modal_equipos" class="btn btn-info" data-toggle="modal" data-target="#modal-equipos-{{$cl->id}}"><i class="fa fa-laptop" aria-hidden="true"></i>  </button></a>
                  
                  <a data-toggle="tooltip" data-placement="top" title="EDITAR CLIENTE"><button type="button" id="modal_editar" class="btn btn-warning" data-toggle="modal" data-target="#modal-edit-{{$cl->id}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>

                  @if(Auth::user()->rol == 'ADMINISTRADOR')
                    @if($cl->status == 'ACTIVO')
                      <a data-toggle="tooltip" data-placement="top" title="DESACTIVAR CLIENTE"><button type="button" id="modal_eliminar" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-{{$cl->id}}"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
                    @else
                      <a data-toggle="tooltip" data-placement="top" title="ACTIVAR CLIENTE"><button type="button" id="modal_eliminar" class="btn btn-success" data-toggle="modal" data-target="#modal-activar-{{$cl->id}}"><i class="fa fa-arrow-up" aria-hidden="true"></i></button></a>
                    @endif
                  @endif
                  </div>
              </td>
            </tr>

            <?php 
              $areas = App\Clientes::find($cl->id)->areas;  
              $equipos = App\Equipos::all(); 
              $rel = DB::table('rel_area_equipo as rel')
                          ->join('adm_areas as aa','aa.id','=','rel.areas_id')
                          ->join('adm_equipo as ae','ae.id_equipo','=','rel.equipos_id')
                          ->where('aa.clientes_id','=',$cl->id)
                          ->select('aa.nombre_area','ae.nom_equipo','rel.*')
                          ->get();
            ?>

          @include('clientes.edit')
          @include('clientes.delete')
          @include('clientes.activar')
          @include('clientes.areas')
          @include('clientes.equipos')
          @endforeach
        </tbody>
    
    </table>
  </div>
</div>


        

@endsection

@section('script')
  <script type="text/javascript">
    $(document).ready(function() {

   
          $('[data-toggle="tooltip"]').tooltip();   
      

        $('#clientes').DataTable({   
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

        id = $('#id_departamento').val();
        getMunicipio(id);
    } );

    function getMunicipio(id){
      $.get("/getMunicipios/"+id,function(response) {
        $("#id_municipio").empty();
        for (i =0; i<response.length ; i++) {
          $("#id_municipio").append('<option value="'+response[i].id+'">'+response[i].nom_municipio+'</option>');
          $('#id_municipio').selectpicker('refresh');
        }
      });
    }

    $('#id_departamento').on('change',function(){
      id = $('#id_departamento').val();
      getMunicipio(id);
        });

    function mayusculas(e) {

         e.value = e.value.toUpperCase();
    }

    $("#modal_areas").on('click', function(){
          getCodigoArea();
        })

        function getCodigoArea() {
          $.get("/getCodigoArea/",function(response) {
            $('.cod_area').val(response[0].prefijo_doc+' - '+response[0].num_actual);
            $('.num_actual_ar').val(response[0].num_actual);
            $('.id_consecutivo_ar').val(response[0].id_adm_consecutivo);

          });
        }
  </script>
@endsection