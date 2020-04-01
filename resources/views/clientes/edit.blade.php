<div class="modal" role="dialog" tabindex="-1" id="modal-edit-{{$cl->id}}">
 	<div class="modal-dialog">
 		<div class="modal-content">
 			<form method="POST" action="{{ url('administracion/clientes') }}/{{$cl->id}}">
 			<div class="modal-header">
				<h5 class="modal-title">EDITAR CLIENTE</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
			</div>
  			
  			<div class="modal-body">
			<div class="row">
			
				{{ csrf_field() }}
				<input name="_method" type="hidden" value="PUT">
			    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
			      		<label>CODIGO </label>
			      		<input type="text" name="cod_cliente" class="form-control bg-info text-white" value="{{ $cl->cod_cliente }}" required>
			    	</div>
			        

			    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
			    		<label>IDENTIFICACION</label>
			    		<input type="text" name="nit_cliente" style="text-transform:uppercase" class="form-control bg-info text-white" value="{{ $cl->nit_cliente }}"  required>
			    	</div>
			    	<div class="col-lg-12 col-md-12  col-sm-12 col-xs-12 form-group">
			      		<label>CLIENTE</label>
			      		<input type="text" name="nom_cliente" onkeyup="mayusculas(this);" class="form-control bg-info text-white" value="{{ $cl->nom_cliente }}"  required>
			    	</div>
			        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
			    		<label>DIRECCION</label>
			    		<input type="text" name="dir_cliente" style="text-transform:uppercase" class="form-control bg-info text-white" value="{{ $cl->dir_cliente }}"  required>
			    	</div>
			    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
			    		<label>TELEFONO</label>
			    		<input type="text" name="tel_cliente" class="form-control bg-info text-white" value="{{ $cl->tel_cliente }}"  required>
			    	</div>

			    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
			    		<label>CELULAR</label>
			    		<input type="text" name="cel_cliente" class="form-control bg-info text-white" value="{{ $cl->cel_cliente }}"  required>
			    	</div>
			    	<div class="col-lg-12 col-md-12  col-sm-12 col-xs-12 form-group">
			      		<label>CORREO</label>
			      		<input type="text" name="correo_cliente" style="text-transform:uppercase" class="form-control bg-info text-white" value="{{ $cl->correo_cliente }}"  required>
			    	</div>
			        
			    	
                	


                       
                	
                
                </div>
                </div>
                <div class="modal-footer">
                	<button class="btn btn-success" type="submit">Guardar</button> 
                	<button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
                </div>
            </form>
		</div>
	</div>		

</div>