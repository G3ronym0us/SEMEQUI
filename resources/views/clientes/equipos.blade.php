<div class="modal fade moda-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-equipos-{{$cliente->id_cliente}}">
 	<div class="modal-dialog">
 		<div class="modal-content">
 			<div class="modal-header">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<h3>ADMINISTRACION DE EQUIPOS DE </h3>
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
			<form method="POST" action="{{ url('administracion/area_equipo') }}">
				{{ csrf_field() }}
			      	<input type="text" name="id_cliente" class="form-control bg-info text-white" value="{{$cliente->id}}" hidden>

			    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
			      		<label>AREA:</label>
			      		<select name="area_id">
			      			@foreach($areas as $area)
			      				<option value="{{ $area->id_area }}">{{ $area->cod_area }} - {{ $area->nombre_area}}</option>
			      			@endforeach
			      		</select >
			    	</div>
			        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
			    		<label>EQUIPO:</label>
			    		<select name="equipo_id">
			      			@foreach($equipos as $equipo)
			      				<option value="{{ $equipo->id_equipo }}">{{ $equipo->cod_equipo }} - {{ $equipo->nom_equipo}}</option>
			      			@endforeach
			      		</select>
			    	</div>
					<div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="form-group">
                            <button class="btn btn-primary" type="submit">Guardar</button> 
                          </div>
                        </div> </form>
              

					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group">
								AREA
							</div>
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group">
								EQUIPO
							</div>

						</div>
						
						@foreach($areas as $area)
						
						    @foreach($area->area_equipos as $ae)
						    <?php $equipo = App\Equipos::find($ae->equipos_id) ?>
						<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
								{{ $area->nombre_area }}
							</div>
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
								{{ $equipo->nom_equipo}}
							</div>
						</div>
							@endforeach
							@endforeach
                    </div>


  </div>
                        
                       
                	
               
		</div>
	</div>		

</div>