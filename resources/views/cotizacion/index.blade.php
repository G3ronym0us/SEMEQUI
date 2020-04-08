@extends('layouts.template')
@section('contenido')

<style type="text/css">
    #agregar_cotizacion{
        float: right;

    }
</style>

<a href="{{url('facturacion/cotizacion/create')}}"><button id="agregar_cotizacion" class="btn btn-primary"><b>+ COTIZACION</b></button></a>
<h1>COTIZACIONES</h1>

<br><br>
  
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table-responsive">
        <table class="table table-striped table-bordered table-condensed table-hover" id="cotizacion_table" name="cotizacion_table">
            <thead class="thead-dark">
                <tr>
                    <th>ORDEN No.</th>
                    <th>CLIENTE</th>
                    <th>FECHA</th>
                    <th>TOTAL</th>
                    <th>ESTADO</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cotizaciones as $cotizacion)
                <tr>
                    <td>{{$cotizacion->cod_cotizacion}}</td>
                    <td>{{$cotizacion->nom_cliente}}</td>
                    <td>{{$cotizacion->created_at}}</td>
                    <td>{{$cotizacion->total}}</td>
                    <td>{{$cotizacion->estado}}</td>
                    <td>
                        <a href="{{url('imprimir/cotizacion/'.$cotizacion->id_cotizacion)}}" data-toggle="tooltip" data-placement="top" title="IMPRIMIR"><button type="button" id="modal_mostrar" class="btn btn-info"><i class="fa fa-print" aria-hidden="true"></i></button></a>
                        
                        <a href="{{url('facturacion/cotizacion/'.$cotizacion->id_cotizacion.'/edit')}}" data-toggle="tooltip" data-placement="top" title="EDITAR"><button type="button" id="modal_editar" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                        
                        @if(Auth::user()->rol == 'ADMINISTRADOR')
                          <a  href="" data-toggle="tooltip" data-placement="top" title="ELIMINAR"><button type="button" id="modal_eliminar" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-{{$cotizacion->id_cotizacion}}"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
                        @endif
                    </td>
                </tr>
                @include('cotizacion.delete')
                @endforeach

            </tbody>
        </table>
    </div>
</div>



@endsection



@section('script')

<script type="text/javascript">
  $(document).ready(function() {
      $('#cotizacion_table').DataTable({
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