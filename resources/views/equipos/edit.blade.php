<div class="modal" role="dialog" tabindex="-1" id="modal-edit-{{$cl->id_equipo}}">
 	<div class="modal-dialog">
 		<div class="modal-content">
 			<form method="POST" action="{{ url('administracion/equipos') }}/{{$cl->id_equipo}}">
 			<div class="modal-header">
				<h5 class="modal-title">EDITAR EQUIPO</h5>
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
			      		<input type="text" name="cod_equipo" class="form-control bg-info text-white" value="{{ $cl->cod_equipo }}" onkeyup="mayusculas(this);" required>
			    	</div>

			    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
			    		<label>NONBRE</label>
			    		<input type="text" name="nom_equipo" onkeyup="mayusculas(this);" class="form-control bg-info text-white" value="{{ $cl->nom_equipo }}"  required>
			    	</div>

			    	<div class="col-lg-12 col-md-12  col-sm-12 col-xs-12 form-group">
			      		<label>CLASE</label>
			      		<select id="id_clase_equipo" name="id_clase_equipo" class="form-control bg-info text-white" required>
					        @foreach($clase_equipos as $ce)
					        	@if($cl->id_clase_equipo == $ce->id_clase_equipo)
					          		<option value="{{ $ce->id_clase_equipo }}" selected>{{ $ce->nom_clase_equipo }}</option>
					          	@else
					          		<option value="{{ $ce->id_clase_equipo }}">{{ $ce->nom_clase_equipo }}</option>
					          	@endif
					        @endforeach  
				      	</select>
			    	</div>

			        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
			    		<label>MARCA</label>
			    		<input type="text" name="marca" onkeyup="mayusculas(this);" class="form-control bg-info text-white" value="{{ $cl->marca }}"  required>
			    	</div>

			    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
			    		<label>CARACTERISTICAS</label>
			    		<input type="text" name="caracteristica_equipo" class="form-control bg-info text-white" value="{{ $cl->caracteristica_equipo }}" onkeyup="mayusculas(this);"  required>
			    	</div>

			    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
			    		<label>OBSERVACION</label>
			    		<input type="text" name="obs_equipo" class="form-control bg-info text-white" value="{{ $cl->obs_equipo }}" onkeyup="mayusculas(this);" required>
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