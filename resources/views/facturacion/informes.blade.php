@extends('layouts.template')
@section('contenido')


<h1>INFORMES DE FACTURAS</h1>

<div class="container">
  <form id="filtrarImprimir" action="{{ url('informes/filtrarFacturas/') }}">

    <div class="row">
      <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 form-group">
        <input type="checkbox" class="cajas" name="fecha" value="true">
        <label>FECHA</label>
      </div>
      <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 form-group">
        DESDE <input class=" form-control" type="date" name="fecha_inicio">
      </div>
      <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 form-group">
        HASTA <input class=" form-control" type="date" name="fecha_fin">
      </div>
    </div>

    <div class="row">
      <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 form-group">
        <input type="checkbox" class="cajas" name="cliente" value="true">
        <label>CLIENTES</label>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group">
        <select class="selectpicker" data-live-search="true" name="cliente_id">
            @foreach($clientes as $cl)
              <option value="{{ $cl->id }}">{{ $cl->nom_cliente }}</option>
            @endforeach
        </select>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 form-group">
        <input type="checkbox" class="cajas" name="f_estado" value="true">
        <label>ESTADO</label>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group">
        <select class="selectpicker" name="estado">
          <option value="PENDIENTE">PENDIENTE</option>
          <option value="COMPLETADA">COMPLETADA</option>
          <option value="PROCESADA/FACTURA">PROCESADA/FACTURA</option>
        </select>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 form-group">
        <input type="checkbox" class="cajas" name="f_ubicacion" value="true">
        <label>UBICACION</label>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group">
        <label for="id_departamento">DEPARTAMENTO</label> 
        <select name="id_departamento"  id="id_departamento" class="form-control bg-info text-white selectpicker" data-live-search="true">
            <option value="null">SELECCIONE UN DEPARTAMENTO</option>
          @foreach($departamentos as $d)
            <option value="{{ $d->id }}">{{ $d->nom_departamento }}</option>
          @endforeach  
        </select>
        <label for="id_municipio">MUNICIPIO:</label>
        <select name="id_municipio" id="id_municipio" class="form-control bg-info text-white selectpicker" data-live-search="true">
           
        </select>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group">
        <button type="submit" class="btn btn-danger">FILTRAR E IMPRIMIR</button>
      </div>

    </div>

    

    
    
    

  </form>
</div> 



  <br><br>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <table class="table table-striped table-bordered table-condensed table-hover" id="orden_tabla" name="orden_tabla">
            <thead>
                <tr>
                    <th>No. ORDEN </th>
                    <th>CLIENTE</th>
                    <th>UBICACION</th>
                    <th>FECHA ATENCION</th>
                    <th>ESTADO</th>
                    <th>Vr. ORDEN</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($facturas as $fac)
                <tr>
                    <td>{{$fac->cod_factura}}</td>
                    <td>{{$fac->nom_cliente}}</td>
                    <td>{{$fac->nom_municipio}} - {{$fac->nom_departamento}}</td>
                    <td>{{$fac->created_at}}</td>
                    <td>{{$fac->estado}}</td>
                    <td>{{$fac->total}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>




@endsection

@section('script')


    <script type="text/javascript">
  $(document).ready(function() {
      $('#orden_tabla').DataTable({
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
        order: [[3, "desc"]]

      });
      
  });

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

</script> 



@endsection