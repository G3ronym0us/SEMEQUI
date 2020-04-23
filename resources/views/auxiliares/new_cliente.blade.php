<div class="modal" role="dialog" tabindex="-1" id="modal-nuevo-cliente">
 	<div class="modal-dialog modal-lg">
 		<div class="modal-content">
 			<form method="POST" id="form_nuevo_cliente" action="{{ url('administracion/clientes') }}">
 			<div class="modal-header">
				<h5 class="modal-title">NUEVO CLIENTE</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
			</div>
  			
  			<div class="modal-body">
			<div class="row">
			
				{{ csrf_field() }}
				
			    	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 form-group">
			      		<span class="text-danger">*</span><label>CODIGO </label>
			      		<input type="text" name="ajax" id="ajax" value="true" hidden>
			      		<input type="text" name="id_consecutivo" id="id_consecutivo" hidden>
        				<input type="text" name="num_actual" id="num_actual" hidden>
			      		<input type="text" name="cod_cliente" id="cod_cliente" class="form-control bg-info text-white" readonly="readonly">
			    	</div>
			    	<div class="col-lg-6 col-md-6  col-sm-6 col-xs-12 form-group">
			      		<span class="text-danger">*</span><label>CLIENTE</label>
			      		<input type="text" name="nom_cliente" id="nom_cliente" onkeyup="mayusculas(this);" class="form-control bg-info text-white" required>
			    	</div>
			    	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group">
				  		<span class="text-danger">*</span><label>TIPO:</label>
				  		<select name="tipo_cliente" class="form-control bg-info text-white">
				        <option value="NATURAL">NATURAL</option>
				        <option value="JURIDICO">JURIDICO</option>  
				      </select>
				  	</div>

			    	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group">
			    		<span class="text-danger">*</span><label>IDENTIFICACION</label>
			    		<input type="text" name="nit_cliente" onkeyup="mayusculas(this);" class="form-control bg-info text-white"   required>
			    	</div>
			    	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group">
				  		<span class="text-danger">*</span><label>DEPARTAMENTO:</label>
				  		<select name="id_departamento"  id="id_departamento" class="form-control bg-info text-white" title="SELECCIONE UN DEPARTAMENTO">
				      	</select>
				  	</div>
				  	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group">
				  		<span class="text-danger">*</span><label>MUNICIPIO:</label>
				  		<select name="id_municipio" id="id_municipio" class="form-control bg-info text-white" title="SELECCIONE UN MUNICIPIO">
				     	</select>
				  	</div>

			        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 form-group">
			    		<span class="text-danger">*</span><label>DIRECCION</label>
			    		<input type="text" name="dir_cliente" onkeyup="mayusculas(this);" class="form-control bg-info text-white" required>
			    	</div>

			    	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 form-group">
			    		<label>TELEFONO</label>
			    		<input type="text" name="tel_cliente" class="form-control bg-info text-white">
			    	</div>

			    	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 form-group">
			    		<label>CELULAR</label>
			    		<input type="text" name="cel_cliente" class="form-control bg-info text-white">
			    	</div>
			    	<div class="col-lg-6 col-md-6  col-sm-6 col-xs-12 form-group">
			      		<label>CORREO</label>
			      		<input type="text" name="correo_cliente" onkeyup="mayusculas(this);" class="form-control bg-info text-white">
			    	</div>
			    	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 form-group">
				      <span class="text-danger">*</span><label>STATUS:</label>
				      <select name="status" class="form-control bg-info text-white">
				        <option value="ACTIVO">ACTIVO</option>
				        <option value="INACTIVO">INACTIVO</option>  
				      </select>
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