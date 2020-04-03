@extends('layouts.template')
@section('contenido')
<h1>ORDENES DE SERVICIO MASIVA</h1> <a href="{{url('operacion/orden_servicio/create')}}"><button class="btn btn-primary">+</button></a>
  
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <table class="table table-striped table-bordered table-condensed table-hover" id="orden_tabla" name="orden_tabla">
            <thead>
                <tr>
                    <th>ORDEN No.</th>
                    <th>CLIENTE</th>
                    <th>TECNICO</th>
                    <th>FECHA</th>
                    <th>TOTAL</th>
                    <th>ESTADO</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ordenes as $orden)
                <tr>
                    <td>{{$orden->cod_orden}}</td>
                    <td>{{$orden->nom_cliente}}</td>
                    <td>{{$orden->tecnico_id}}</td>
                    <td>{{$orden->created_at}}</td>
                    <td>{{$orden->total}}</td>
                    <td>{{$orden->estado}}</td>
                    <td>
                        <a href="{{url('operacion/orden_servicio/'.$orden->id)}}"><button type="button" id="modal_mostrar" class="btn btn-info">MOSTRAR</button></a>
                        <a href="{{url('operacion/orden_servicio/'.$orden->id.'/edit')}}"><button type="button" id="modal_editar" class="btn btn-warning">EDITAR</button></a>
                        <button type="button" id="modal_eliminar" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-{{$orden->id}}">ELIMINAR</button>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>



@endsection

@section('script')

    <script src="http://localhost:8000/js/orden.js"></script>
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
        }

      });
      
  });

  function mayusculas(e) {
    e.value = e.value.toUpperCase();
  }

</script> 

@endsection