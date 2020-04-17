<div class="modal fade moda-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-areas-{{$cl->id}}">
 	<div class="modal-dialog">
 		<div class="modal-content">
 			<div class="modal-header">
				<h5 class="modal-title">ADMINISTRACIÓN DE AREAS DE <b>{{$cl->nom_cliente}}</b></h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          	<span aria-hidden="true">&times;</span>
		        </button>
			</div>
  			
  			<div class="modal-body">
			<div class="row">
			<form method="POST" action="{{ url('administracion/areas') }}">
				{{ csrf_field() }}
			      	<input type="text" name="id_cliente" class="form-control bg-info text-white" value="{{$cl->id}}" hidden>

			    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
			      		<label>CODIGO No:</label>
			      		<input type="text" name="id_consecutivo_ar" id="id_consecutivo_ar" class="id_consecutivo_ar" hidden>
        				<input type="text" name="num_actual_ar" id="num_actual_ar" class="num_actual_ar" hidden>
			      		<input type="text" name="cod_area" id="cod_area" class="cod_area form-control bg-info text-white" required>
			    	</div>
			        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
			    		<span class="text-danger">*</span><label>NOMBRE</label>
			    		<input type="text" name="nombre_area" onkeyup="mayusculas(this);" class="form-control bg-info text-white" required>
			    	</div>
			    	<div class="col-lg-12 col-md-12  col-sm-12 col-xs-12 form-group">
			    		<span class="text-danger">* Campos Obligatorios</span>
			        </div>
					<div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="form-group">
                            <button class="btn btn-success" type="submit">Guardar</button> 
                          </div>
                        </div> </form>
              

					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group">
								<b>CODIGO</b>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group">
								<b>NOMBRE</b>
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

    <div class="modal-footer">

                	<button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
                </div>
                        
                       
                	
               
		</div>
	</div>		

</div>