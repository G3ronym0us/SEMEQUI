<div class="modal fade moda-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-asignar-areas">
 	<div class="modal-dialog">
 		<div class="modal-content">
 			<div class="modal-header">
				<h5 class="modal-title">ADMINISTRACIÓN DE AREAS DE <b><span id="nom_cliente_ma"></span></b></h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          	<span aria-hidden="true">&times;</span>
		        </button>
			</div>
  			
  			<div class="modal-body">
			<form method="POST" action="{{ url('administracion/areas') }}" id="form_asignar_areas">
			<div class="row">
				{{ csrf_field() }}
			      	<input type="text" name="id_cliente_ma" id="id_cliente_ma" class="form-control bg-info text-white" hidden>

			    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
			      		<label>CODIGO No:</label>
			      		<input type="text" name="ajax" id="ajax" value="true" hidden>
			      		<input type="text" name="id_consecutivo_ma" id="id_consecutivo_ma" hidden>
        				<input type="text" name="num_actual_ma" id="num_actual_ma" hidden>
			      		<input type="text" name="cod_area_ma" id="cod_area_ma" class="form-control bg-info text-white" readonly="readonly" required>
			    	</div>
			        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
			    		<label>NOMBRE</label>
			    		<input type="text" name="nombre_area_ma" id="nombre_area_ma" onkeyup="mayusculas(this);" class="form-control bg-info text-white" required>
			    	</div>
					<div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="form-group">
                            <button class="btn btn-success" type="submit">Guardar</button> 
                          </div>
                        </div> </div></form>
            
</div>

    <div class="modal-footer">

                	<button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
                </div>
                        
                       
                	
               
		</div>
	</div>		

</div>