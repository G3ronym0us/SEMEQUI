<div class="modal fade moda-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-edit-{{$con->id_adm_consecutivo}}">
 	<div class="modal-dialog">
 		<div class="modal-content">
 			<div class="modal-header">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<h3>Editar Equipos</h3>
						@if(count($errors)>0)
						<div class="alert alert-danger">
							<ul>
								@foreach($errors->all() as $error)
								<li>{{$error}}</li>
								@endforeach
							</ul>
						</div>
						@endif
					</div>
				</div>
			</div>
  			
			<div class="row">
			<form method="POST" action="{{ url('administracion/consecutivos') }}/{{$con->id_adm_consecutivo}}">
				{{ csrf_field() }}
				<input name="_method" type="hidden" value="PUT">
			    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
			      		<label>PREFIJO-DOC</label>
			      		<input type="text" name="prefijo_doc" class="form-control bg-info text-white" value="{{$con->prefijo_doc}}" required>
			    	</div>
			        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
			    		<label>NOMBRE</label>
			    		<input type="text" name="nom_consecutivo" class="form-control bg-info text-white" value="{{$con->nom_consecutivo}}" required>
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
			    	
                	



                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="form-group">
                            <button class="btn btn-primary" type="submit">Guardar</button> 
                          </div>
                        </div>
                       
                	
                </form>
                </div>
		</div>
	</div>		

</div>