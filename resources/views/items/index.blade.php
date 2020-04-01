@extends('layouts.template')
@section('contenido')
<h1>ADMINISTRACIÓN DE ITEMS</h1>
        
<form method="POST" action="{{ url('administracion/items') }}">
  {{ csrf_field() }}
  <div class="row">
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group">
      <label>CODIGO No.</label>
      <input type="text" name="cod_item" class="form-control bg-info text-white" required>
    </div>

  	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 form-group">
  		<label>NOMBRE</label>
  		<input type="text" name="nom_item" class="form-control bg-info text-white" onkeyup="mayusculas(this);" required>
  	</div>

  	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group">
  		<label>COSTO $:</label>
  		<input type="number" name="costo_item" class="form-control bg-info text-white" step="0.01" required>
  	</div>

  	<div class="col-lg-2 col-md-2 col-sm-2 form-check form-check-inline">
      <input class="form-check-input" type="radio" id="servicio" name="servicio" value="true" checked="true">
      <label class="form-check-label" for="inlineCheckbox1">SERVICIO</label>
    </div>

    <div class="col-lg-2 col-md-2 col-sm-2 form-check form-check-inline">
      <input class="form-check-input" type="radio" id="servicio" name="servicio" value="false ">
      <label class="form-check-label" for="inlineCheckbox2">PRODUCTO</label>
    </div>

    <div class="col-lg-2 col-md-2 col-sm-2 form-check form-check-inline">
      <input class="form-check-input" type="checkbox" id="activo" name="activo" value="true" checked="true">
      <label class="form-check-label" for="inlineCheckbox3">ACTIVO</label>
    </div>

    <div class="col-lg-1 col-md-1 col-sm-1">
      <div class="form-group">
        <label>&nbsp;</label>
        <button class="btn btn-primary" type="submit">Guardar</button> 
      </div>
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
          <th>COSTO</th>
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
          <td>{{$item->costo_item}}</td>
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
            <td>
              <button type="button" id="modal_editar" class="btn btn-primary" data-toggle="modal" data-target="#modal-edit-{{$item->id_item}}">EDITAR</button>
            @if($item->activo == 1)
                <button type="button" id="modal_eliminar" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-{{$item->id_item}}">DESACTIVAR</button>
                @else
                <button type="button" id="modal_eliminar" class="btn btn-success" data-toggle="modal" data-target="#modal-activar-{{$item->id_item}}">ACTIVAR</button>
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
        }

      });
      
  });

  function mayusculas(e) {
    e.value = e.value.toUpperCase();
  }

</script>

@endsection