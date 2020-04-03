<div class="modal" role="dialog" tabindex="-1" id="modal-edit-{{$user->id}}">
 	<div class="modal-dialog">
 		<div class="modal-content">
 			<form method="POST" action="{{ url('seguridad/usuarios') }}/{{$user->id}}">
 			<div class="modal-header">
				<h5 class="modal-title">EDITAR USUARIO</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
			</div>
  			
  			<div class="modal-body">
			<div class="row">
			
				{{ csrf_field() }}
				<input name="_method" type="hidden" value="PUT">
			    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
			      		<label>NOMBRE </label>
			      		<input type="text" name="name" class="form-control bg-info text-white" value="{{ $user->name }}" required>
			    	</div>
			    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
			    		<label>EMAIL</label>
			    		<input type="text" name="email" style="text-transform:uppercase" class="form-control bg-info text-white" value="{{ $user->email }}"  required>
			    	</div>
			    	<div class="col-lg-12 col-md-12  col-sm-12 col-xs-12 form-group">
			      		<label>ROL</label>
			      		<select name="rol" id="rol" class="form-control bg-info text-white" >
			      			@if($user->rol == 'ADMINISTRADOR')
			      			<option value="OPERADOR">OPERADOR</option>
			      			<option value="TECNICO">TECNICO</option>
			      			<option value="ADMINISTRADOR" selected>ADMINISTRADOR</option>
			      			@elseif($user->rol == 'TECNICO')
			      			<option value="OPERADOR">OPERADOR</option>
			      			<option value="TECNICO" selected>TECNICO</option>
			      			<option value="ADMINISTRADOR" >ADMINISTRADOR</option>
			      			@else
			      			<option value="OPERADOR" selected>OPERADOR</option>
			      			<option value="TECNICO">TECNICO</option>
			      			<option value="ADMINISTRADOR" >ADMINISTRADOR</option>
			      			@endif
			      		</select>
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