<div class="modal fade moda-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-edit-{{$eq->id_equipo}}">
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
			<form method="POST" action="{{ url('administracion/equipos') }}/{{$eq->id_equipo}}">
				{{ csrf_field() }}
				<input name="_method" type="hidden" value="PUT">
			    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
			      <label>CODIGO No.</label>
			      <input type="text" name="cod_equipo" class="form-control bg-info text-white" value="{{$eq->cod_equipo}}" required>
			    </div>
                	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                		<label>NOMBRE</label>
                		<input type="text" name="nom_equipo" class="form-control bg-info text-white" value="{{$eq->nom_equipo}}" required>
                	</div>

                	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                		<label>CLASE</label>
                		<input type="number" name="id_clase_equipo" class="form-control bg-info text-white" value="{{$eq->id_clase_equipo}}" step="0.01" required>
                	</div>
                	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
			      <label>MARCA</label>
			      <input type="text" name="marca" class="form-control bg-info text-white" value="{{$eq->marca}}" required>
			    </div>
                	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                		<label>CARACTERISTICAS</label>
                		<textarea name="caracteristica_equipo">{{$eq->caracteristica_equipo}}</textarea>
                	</div>
                	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                		<label>OBSERVACIONES</label>
                		<textarea name="obs_equipo">{{$eq->obs_equipo}}</textarea>
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