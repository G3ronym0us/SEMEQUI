<div class="modal fade moda-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-edit-{{$item->id_item}}">
 	<div class="modal-dialog">
 		<div class="modal-content">
 			<div class="modal-header">
				<h5 class="modal-title">EDITAR ITEM</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
			</div>

  		<form method="POST" action="{{ url('administracion/items') }}/{{$item->id_item}}">	
        <div class="modal-body">
          <div class="row">
			
				    {{ csrf_field() }}
				    <input name="_method" type="hidden" value="PUT">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
              <span class="text-danger">*</span><label>CODIGO No.</label>
              <input type="text" name="cod_item" class="form-control bg-info text-white" value="{{$item->cod_item}}" required>
            </div>
          	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
          		<span class="text-danger">*</span><label>NOMBRE</label>
          		<input type="text" name="nom_item" class="form-control bg-info text-white" value="{{$item->nom_item}}" required>
          	</div>
          	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group">
          		<label>PRECIO COMPRA:</label>
          		<input type="number" name="precio_compra" class="form-control bg-info text-white" value="{{$item->precio_compra}}" step="0.01">
          	</div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group">
              <label>PRECIO VENTA:</label>
              <input type="number" name="precio_venta" class="form-control bg-info text-white" value="{{$item->precio_venta}}" step="0.01">
            </div>
          	
            @if($item->servicio == true)
          	<div class="col-lg-1 col-md-1 col-sm-1"></div>
              <div class="col-lg-4 col-md-4 col-sm-4 form-check form-check-inline">
                <input class="form-check-input" type="radio" id="servicio" name="servicio" value="true" checked="true">
                <label class="form-check-label" for="inlineCheckbox1">SERVICIO</label>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4 form-check form-check-inline">
                <input class="form-check-input" type="radio" id="servicio" name="servicio" value="false ">
                <label class="form-check-label" for="inlineCheckbox2">PRODUCTO</label>
              </div>
              @else
              <div class="col-lg-1 col-md-1 col-sm-1"></div>
              <div class="col-lg-4 col-md-4 col-sm-4 form-check form-check-inline">
                <input class="form-check-input" type="radio" id="servicio" name="servicio" value="true">
                <label class="form-check-label" for="inlineCheckbox1">SERVICIO</label>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4 form-check form-check-inline">
                <input class="form-check-input" type="radio" id="servicio" name="servicio" value="false "  checked="true">
                <label class="form-check-label" for="inlineCheckbox2">PRODUCTO</label>
              </div>
              @endif
              @if($item->activo == true)
              <div class="col-lg-2 col-md-2 col-sm-2 form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="activo" name="activo" value="true" checked="true">
                <label class="form-check-label" for="inlineCheckbox3">ACTIVO</label>
              </div>
              @else
              <div class="col-lg-2 col-md-2 col-sm-2 form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="activo" name="activo" value="true">
                <label class="form-check-label" for="inlineCheckbox3">ACTIVO</label>
              </div>
              @endif
              <div class="col-lg-12 col-md-12  col-sm-12 col-xs-12 form-group">
              <span class="text-danger">* Campos Obligatorios</span>
              </div>

            </div>
          </div>
        <div class="modal-footer">
          <button class="btn btn-primary" type="submit">Guardar</button> 
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>          
        </div>
      </form>
    </div>
  </div>		
</div>