<div class="modal fade moda-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-equipos-{{$cl->id}}">
 	<div class="modal-dialog modal-lg">
 		<div class="modal-content">
 			<div class="modal-header">
				<h5 class="modal-title">ADMINISTRACIÓN DE EQUIPOS DE <b>{{$cl->nom_cliente}}</b></h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          	<span aria-hidden="true">&times;</span>
		        </button>
			</div>
  			
  			<div class="modal-body">
				<div class="row">
					<form method="POST" action="{{ url('administracion/area_equipo') }}">
						{{ csrf_field() }}
			      		<input type="text" name="id_cliente" class="form-control bg-info text-white" value="{{$cl->id}}" hidden>

		      			@if($cl->tipo_cliente == 'JURIDICO')
			    		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group">
			      			<label>AREA:</label>
			      			<select name="area_id" class="form-control bg-info text-white">
				      			@foreach($areas as $area)
				      				<option value="{{ $area->id }}">{{ $area->cod_area }} - {{ $area->nombre_area}}</option>
				      			@endforeach
			      			</select >
			      		</div>
			      		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group">
				    		<label>EQUIPO:</label>
				    		<select name="equipo_id" class="form-control bg-info text-white">
				      			@foreach($equipos as $equipo)
				      				<option value="{{ $equipo->id_equipo }}">{{ $equipo->cod_equipo }} - {{ $equipo->nom_equipo}}</option>
				      			@endforeach
				      		</select>
				    	</div>
			      		@else
			      			@foreach($areas as $area)
			      				<input type="text" name="area_id" value="{{ $area->id }}" hidden>
			      			@endforeach
			      			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
					    		<label>EQUIPO:</label>
					    		<select name="equipo_id" class="form-control bg-info text-white">
					      			@foreach($equipos as $equipo)
					      				<option value="{{ $equipo->id_equipo }}">{{ $equipo->cod_equipo }} - {{ $equipo->nom_equipo}}</option>
					      			@endforeach
					      		</select>
					    	</div>
			      		@endif
			    	
			    	 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
			    		<label>SERIAL:</label>
			    		<input type="text" name="serial" id="serial" class="form-control bg-info text-white" required>
			    	</div>
			    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
			    		<label>PLACA:</label>
			    		<input type="text" name="placa" id="placa" class="form-control bg-info text-white" required>
			    	</div>
			    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
			    		<label>DESCRIPCION:</label>
			    		<input type="text" name="descripcion" id="descripcion" class="form-control bg-info text-white" required>
			    	</div>

					<div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="form-group">
                            <button class="btn btn-success" type="submit">Guardar</button> 
                          </div>
                        </div> </form>
              

					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="row">
							@if($cl->tipo_cliente == 'JURIDICO')
							<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 form-group">
								<b>AREA</b>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 form-group">
								<b>EQUIPO</b>
							</div>
							<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 form-group">
								<b>SERIAL</b>
							</div>
							<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 form-group">
								<b>PLACA</b>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 form-group">
								<b>DESCRIPCION</b>
							</div>
							@else
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 form-group">
								<b>EQUIPO</b>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 form-group">
								<b>SERIAL</b>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 form-group">
								<b>PLACA</b>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 form-group">
								<b>DESCRIPCION</b>
							</div>
							@endif

						</div>
						
						@foreach($rel as $r)
						<div class="row">
							@if($cl->tipo_cliente == 'JURIDICO')
							<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 form-group">
								{{ $r->nombre_area }}
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 form-group">
								{{ $r->nom_equipo }}
							</div>
							<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 form-group">
								{{ $r->serial }}
							</div>
							<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 form-group">
								{{ $r->placa }}
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 form-group">
								{{ $r->descripcion }}
							</div>
							@else
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 form-group">
								{{ $r->nom_equipo }}
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 form-group">
								{{ $r->serial }}
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 form-group">
								{{ $r->placa }}
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 form-group">
								{{ $r->descripcion }}
							</div>
							@endif
						</div>
						@endforeach
                    </div>


  </div>
</div>
<div class="modal-footer">

                	<button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
                </div>
                        
                       
                	
               
		</div>
	</div>		

</div>