@extends('layouts.template')
@section('contenido')
<style type="text/css">
    #agregar_factura{
        float: right;

    }
</style>

<a href="{{url('facturacion/facturacion/create')}}"><button id="agregar_factura" class="btn btn-primary"><b>+ FACTURA</b></button></a>
<h1>FACTURACION</h1> 
<br><br>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table=responsive">
        <table class="table table-striped table-bordered table-condensed table-hover" id="facturas" name="facturas">
            <thead>
                <tr>
                    <th>No. FACTURA</th>
                    <th>CLIENTE</th>
                    <th>FEC. CREACION</th>
                    <th>ESTADO</th>
                    <th>V. FACTURA</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($facturas as $factura)
                <tr>
                    <td>{{$factura->cod_factura}}</td>
                    <td>{{$factura->nom_cliente}}</td>
                    <td>{{$factura->created_at}}</td>
                    <td>{{$factura->estado}}</td>
                    <td class="text-right">$ <span class="number">{{$factura->total}}</span></td>
                    <td nowrap>
                        <a href="{{url('imprimir/facturacion/'.$factura->id_facturacion)}}" target="_blank" data-toggle="tooltip" data-placement="top" title="IMPRIMIR"><button type="button" id="modal_mostrar" class="btn btn-info"><i class="fa fa-print" aria-hidden="true"></i></button></a>
                        <a href="{{url('facturacion/facturacion/'.$factura->id_facturacion.'/edit')}}" data-toggle="tooltip" data-placement="top" title="EDITAR"><button type="button" id="modal_editar" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                        <span data-toggle="tooltip" data-placement="top" title="PAGAR"><button type="button" id="modal_pagar" class="btn btn-danger btn_completar" data-toggle="modal" data-target="#modal-pagar-{{$factura->id_facturacion}}"><i class="fa fa-money" aria-hidden="true"></i></button></span>
                        @if(Auth::user()->rol == 'ADMINISTRADOR')
                          <span data-toggle="tooltip" data-placement="top" title="ELIMINAR"><button type="button" id="modal_eliminar" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-{{$factura->id_facturacion}}"><i class="fa fa-trash-o" aria-hidden="true"></i></button></span>
                        @endif
                    </td>
                </tr>
                @include('facturacion.pagar')
                @endforeach
            </tbody>
        </table>
    </div>
</div>



@endsection

@section('script')

    <script type="text/javascript">
  $(document).ready(function() {
    $('span.number').number( true, 2 );
      $('#facturas').DataTable({
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
        order: [[2, "desc"]]

      });
      
  });

  function mayusculas(e) {
    e.value = e.value.toUpperCase();
  }

</script> 

@endsection