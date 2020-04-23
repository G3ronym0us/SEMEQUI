<div class="modal fade moda-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-asignar-equipos">
 	<div class="modal-dialog modal-lg">
 		<div class="modal-content">
 			<div class="modal-header">
				<h5 class="modal-title">ADMINISTRACIÓN DE EQUIPOS DE <b><span id="cliente_me"></span></b></h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          	<span aria-hidden="true">&times;</span>
		        </button>
			</div>
  			
  			<div class="modal-body">
					<form method="POST" action="{{ url('administracion/area_equipo') }}" id="form_asignar_equipo">
				<div class="row">
						{{ csrf_field() }}
			      		<input type="text" name="id_cliente_me" class="form-control bg-info text-white" value="" hidden>
			      		<input type="text" name="ajax" id="ajax" value="true" hidden>
		      			
			    		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group" id="div_area">
			      			<label>AREA:</label>
			      			<select name="area_id_me" id="area_id_me" class="form-control bg-info text-white">
			      			</select >
			      		</div>
			      		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group">
				    		<label>EQUIPO:</label>
				    		<select name="equipo_id_me" id="equipo_id_me" class="form-control bg-info text-white">
				      		</select>
				    	</div>
			    	
			    	 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group">
			    		<label>SERIAL:</label>
			    		<input type="text" name="serial" id="serial" class="form-control bg-info text-white" required>
			    	</div>
			    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group">
			    		<label>PLACA:</label>
			    		<input type="text" name="placa" id="placa" class="form-control bg-info text-white" >
			    	</div>
			    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
			    		<label>DESCRIPCION:</label>
			    		<input type="text" name="descripcion" id="descripcion" class="form-control bg-info text-white" >
			    	</div>

					<div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="form-group">
                            <button class="btn btn-success" type="submit" id="btn_asignar_equipo">Guardar</button> 
                          </div>
                        </div> 
              

					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						
                    </div>


  </div>
  </form>
</div>
<div class="modal-footer">

                	<button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
                </div>
                        
                       
                	
               
		</div>
	</div>		

</div>