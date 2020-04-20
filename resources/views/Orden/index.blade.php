@extends('layouts.template')
@section('contenido')
<style type="text/css">
    #agregar_orden{
        float: right;

    }
</style>

<a href="{{url('operacion/orden_servicio/create')}}"><button id="agregar_orden" class="btn btn-primary"><b>+ ORDEN</b></button></a>
<h1>ORDENES DE SERVICIO</h1> 
  <br><br>
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
                    <td>{{$orden->name}}</td>
                    <td>{{$orden->created_at}}</td>
                    <td>{{$orden->total}}</td>
                    <td>{{$orden->estado}}</td>
                    <td>
                      <div style="white-space:nowrap;">
                        <a href="{{url('imprimir/orden_servicio/'.$orden->id)}}" target="_blank" data-toggle="tooltip" data-placement="top" title="IMPRIMIR"><button type="button" id="modal_mostrar" class="btn btn-info"><i class="fa fa-print" aria-hidden="true"></i></button></a>
                        @if($orden->estado == 'PENDIENTE')
                          <a href="{{url('operacion/orden_servicio/'.$orden->id.'/edit')}}" data-toggle="tooltip" data-placement="top" title="EDITAR"><button type="button" id="modal_editar" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                          @if(Auth::user()->rol == 'TECNICO' || Auth::user()->rol == 'ADMINISTRADOR')
                            <span data-toggle="tooltip" data-placement="top" title="COMPLETAR"><button type="button" id="modal_completar" class="btn btn-danger btn_completar" data-toggle="modal" data-target="#modal-completar-{{$orden->id}}"><i class="fa fa-check-square-o" aria-hidden="true"></i></button></span>
                          @endif
                        @endif
                        @if(Auth::user()->rol == 'ADMINISTRADOR')
                          <span data-toggle="tooltip" data-placement="top" title="ELIMINAR"><button type="button" id="modal_eliminar" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-{{$orden->id}}"><i class="fa fa-trash-o" aria-hidden="true"></i></button></span>
                        @endif
                      </div>
                        
                    </td>
                </tr>
                <?php
                  $detalles=DB::table('detalles_orden_servicio as dos')
                    ->join('rel_area_equipo as rel','rel.id','=','dos.rel_id')
                    ->join('adm_areas as a','a.id','=','rel.areas_id')
                    ->join('adm_equipo as eq','eq.id_equipo','=','rel.equipos_id')
                    ->join('adm_item as it','it.id_item','=','dos.item_id')
                    ->select('dos.*','eq.*','a.id as id_area','a.nombre_area','rel.serial','rel.placa','rel.descripcion', 'it.*')
                    ->where('dos.orden_servicio_id','=',$orden->id)
                    ->get();
                ?>
                  @include('orden.complete')
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

  $("input:checkbox.cajas").click(function() {
            id = $(this).val();
        if(!$(this).is(":checked")){
            $('#obs_'+id).show();         
        }else{
            $('#obs_'+id).hide(); 
        }
    }); 

  function mayusculas(e) {
    e.value = e.value.toUpperCase();
  }

// MODAL COMPLETAR

$('.btn_completar').click(function(){
    $('.observaciones').hide();
});


    

</script> 



@endsection