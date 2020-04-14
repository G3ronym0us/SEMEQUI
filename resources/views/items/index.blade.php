@extends('layouts.template')
@section('contenido')
<h1>ADMINISTRACIÓN DE ITEMS</h1>
        
<form method="POST" action="{{ url('administracion/items') }}">
  {{ csrf_field() }}
  <div class="row">
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group">
      @foreach($cod as $c)
        <span class="text-danger">*</span><label>CODIGO No.</label>
        <input type="text" name="id_consecutivo" id="id_consecutivo" value="{{ $c->id_adm_consecutivo }}" hidden>
        <input type="text" name="num_actual" id="num_actual" value="{{ $c->num_actual }}" hidden>
        <input type="text" name="cod_item"  class="form-control bg-info text-white" value="{{ $c->prefijo_doc.' - '.$c->num_actual }}" readonly="readonly" required>
      @endforeach
    </div>

  	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 form-group">
  		<span class="text-danger">*</span><label>NOMBRE</label>
  		<input type="text" name="nom_item" class="form-control bg-info text-white" onkeyup="mayusculas(this);" required>
  	</div>

  	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 form-group">
  		<label>COSTO:</label>
  		<input type="number" name="precio_compra" id="precio_compra" onkeyup="verificar()" class="form-control bg-info text-white" step="0.01" required>
      <span id="error_costo" class="text-danger"></span>
  	</div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 form-group">
      <label>PRECIO VENTA:</label>
      <input type="number" name="precio_venta" id="precio_venta" onkeyup="verificar()" class=" number form-control bg-info text-white"  step="0.01" required>
    </div>

  	<div class="col-lg-1 col-md-1 col-sm-3 form-check form-check-inline">
      <input class="form-check-input" type="radio" id="servicio" name="servicio" value="true" checked="true">
      <label class="form-check-label" for="inlineCheckbox1">SERVICIO</label>
    </div>

    <div class="col-lg-1 col-md-1 col-sm-3 form-check form-check-inline">
      <input class="form-check-input" type="radio" id="servicio" name="servicio" value="false ">
      <label class="form-check-label" for="inlineCheckbox2">PRODUCTO</label>
    </div>

    <div class="col-lg-1 col-md-1 col-sm-3 form-check form-check-inline">
      <input class="form-check-input" type="checkbox" id="activo" name="activo" value="true" checked="true">
      <label class="form-check-label" for="inlineCheckbox3">ACTIVO</label>
    </div>

    <div class="col-lg-2 col-md-2 col-sm-3">
      <div class="form-group">
        <label>&nbsp;</label>
        <button id="btn_guardar" class="btn btn-primary form-control" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i>  GUARDAR</button> 
      </div>
    </div>
    <div class="col-lg-12 col-md-12  col-sm-12 col-xs-12 form-group">
              <span class="text-danger">* Campos Obligatorios</span>
              </div>
                                     	
  </div>
</form>


<div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table-responsive">
    <table class="table table-striped table-bordered" id="items_table">
      <thead class="thead-dark">
        <tr>
          <th>CODIGO</th>
          <th>NOMBRE</th>
          <th>P. COMPRA</th>
          <th>P. VENTA</th>
          <th>S/P</th>
          <th>STATUS</th>
          <th>OPCIONES</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($items as $item)
        @if($item->activo == 1)
          <tr>
        @else
          <tr class="table-danger">
        @endif
          <td>{{$item->cod_item}}</td>
          <td>{{$item->nom_item}}</td>
          <td>{{$item->precio_compra}}</td>
          <td>{{$item->precio_venta}}</td>
          @if($item->servicio == true)
            <td>SERVICIO</td>
          @else
            <td>PRODUCTO</td>
          @endif
          @if($item->activo == 1)
            <td>ACTIVO</td>
          @else
            <td>INACTIVO</td>
          @endif
            <td style="white-space:nowrap;">
              <a data-toggle="tooltip" data-placement="top" title="EDITAR ITEM"><button type="button" id="modal_editar" class="btn btn-primary" data-toggle="modal" data-target="#modal-edit-{{$item->id_item}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
          @if(Auth::user()->rol == 'ADMINISTRADOR')
            @if($item->activo == 1)
                <a data-toggle="tooltip" data-placement="top" title="DESACTIVAR ITEM"><button type="button" id="modal_eliminar" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-{{$item->id_item}}"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
                @else
                <a data-toggle="tooltip" data-placement="top" title="ACTIVAR ITEM"><button type="button" id="modal_eliminar" class="btn btn-success" data-toggle="modal" data-target="#modal-activar-{{$item->id_item}}"><i class="fa fa-arrow-up" aria-hidden="true"></i></button></a>
                @endif
            @endif
        </tr>

        @include('items.edit')
        @include('items.activar')
        @include('items.delete')
        @endforeach
        
      </tbody>
    </table>
  </div>
</div>
        

@endsection

@section('script')

<script type="text/javascript">
  $(document).ready(function() {
      $('#items_table').DataTable({
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
      
  });

  function mayusculas(e) {
    e.value = e.value.toUpperCase();
  }

  function verificar(){
    costo = parseInt($('#precio_compra').val());
    precio = parseInt($('#precio_venta').val());

    if (costo > precio) {
      $('#error_costo').html('El costo no puede ser mayor que el precio');
      $('#btn_guardar').attr('disabled',true);
    }else{
      $('#error_costo').html('');
      $('#btn_guardar').attr('disabled',false);
    }
  }



</script>

@endsection