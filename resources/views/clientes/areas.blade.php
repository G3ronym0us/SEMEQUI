<div class="modal fade moda-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-areas-{{$cliente->id_cliente}}">
 	<div class="modal-dialog">
 		<div class="modal-content">
 			<div class="modal-header">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<h3>ADMINISTRACION DE AREAS DE </h3>
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
			<form method="POST" action="{{ url('administracion/areas') }}">
				{{ csrf_field() }}
			      	<input type="text" name="id_cliente" class="form-control bg-info text-white" value="{{$cliente->id}}" hidden>

			    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
			      		<label>CODIGO No:</label>
			      		<input type="text" name="cod_area" class="form-control bg-info text-white" required>
			    	</div>
			        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
			    		<label>NOMBRE</label>
			    		<input type="text" name="nombre_area" class="form-control bg-info text-white" required>
			    	</div>
					<div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="form-group">
                            <button class="btn btn-primary" type="submit">Guardar</button> 
                          </div>
                        </div> </form>
              

					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group">
								CODIGO
							</div>
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group">
								NOMBRE
							</div>

						</div>
						
						@foreach($areas as $area)
						<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
								{{ $area->cod_area }}
							</div>
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
								{{ $area->nombre_area}}
							</div>
						</div>
							@endforeach
                    </div>


  </div>
                        
                       
                	
               
		</div>
	</div>		

</div>