<div class="modal fade moda-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-edit-{{$con->id_adm_consecutivo}}">
 	<div class="modal-dialog">
 		<div class="modal-content">
 			<div class="modal-header">
				<h5 class="modal-title">EDITAR CONSECUTIVOS</h5>
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          		<span aria-hidden="true">&times;</span>
			</div>
  			
			<form method="POST" action="{{ url('administracion/consecutivos') }}/{{$con->id_adm_consecutivo}}">
			
			<div class="modal-body">
				{{ csrf_field() }}
				<input name="_method" type="hidden" value="PUT">
			    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
			      		<label>PREFIJO-DOC</label>
			      		<input type="text" name="prefijo_doc" class="form-control bg-info text-white" value="{{$con->prefijo_doc}}" onkeyup="mayusculas(this);" required>
			    	</div>
			        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
			    		<label>NOMBRE</label>
			    		<input type="text" name="nom_consecutivo" class="form-control bg-info text-white" value="{{$con->nom_consecutivo}}" readonly="readonly" onkeyup="mayusculas(this);" required>
			    	</div>

			    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
			    		<label>NUMERO INICIO</label>
			    		<input type="number" name="num_ini" class="form-control bg-info text-white" step="0.01" value="{{$con->num_ini}}" required>
			    	</div>
			    	<div class="col-lg-12 col-md-12  col-sm-12 col-xs-12 form-group">
			      		<label>NUMERO ACTUAL</label>
			      		<input type="number" name="num_actual" class="form-control bg-info text-white" step="0.01" value="{{$con->num_actual}}" required>
			    	</div>
			        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
			    		<label>NUMERO FINAL</label>
			    		<input type="number" name="num_final" class="form-control bg-info text-white" step="0.01" value="{{$con->num_final}}" required>
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