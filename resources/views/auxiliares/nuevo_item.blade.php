<div class="modal" role="dialog" tabindex="-1" id="modal-nuevo-item">
 	<div class="modal-dialog modal-lg">
 		<div class="modal-content">
 			<form method="POST" id="form_nuevo_item" action="{{ url('administracion/items') }}">
 			<div class="modal-header">
				<h5 class="modal-title">NUEVO ITEM</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
			</div>
  			
  			<div class="modal-body">
			<div class="row">
			
				{{ csrf_field() }}
				
		    	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group">
      				<label>CODIGO No.</label>
      				<input type="text" name="ajax" id="ajax" value="true" hidden>
		      		<input type="text" name="id_consecutivo_ni" id="id_consecutivo_ni" hidden>
    				<input type="text" name="num_actual_ni" id="num_actual_ni" hidden>
		      		<input type="text" name="cod_item" id="cod_item" class="form-control bg-info text-white" required>
   			 	</div>

  	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 form-group">
  		<label>NOMBRE</label>
  		<input type="text" name="nom_item" id="nom_item" class="form-control bg-info text-white" onkeyup="mayusculas(this);" required>
  	</div>

  	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 form-group">
      <label>PRECIO COMPRA:</label>
      <input type="number" name="precio_compra" class="form-control bg-info text-white" step="0.01" required>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 form-group">
      <label>PRECIO VENTA:</label>
      <input type="number" name="precio_venta" class="form-control bg-info text-white" step="0.01" required>
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

			    	<div class="col-lg-12 col-md-12  col-sm-12 col-xs-12 form-group">
			    		<span class="text-danger">* Campos Obligatorios</span>
			        </div>

			    	
                	


                       
                	
                
                </div>
                </div>
                <div class="modal-footer">
                	<button class="btn btn-success" type="submit">GUARDAR</button> 
                	<button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
                </div>
            </form>
		</div>
	</div>		

</div>