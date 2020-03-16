<div class="modal fade moda-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-edit-{{$item->id_item}}">
 	<div class="modal-dialog">
 		<div class="modal-content">
 			<div class="modal-header">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<h3>Editar Item</h3>
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
			<form method="POST" action="{{ url('administracion/items') }}/{{$item->id_item}}">
				{{ csrf_field() }}
				<input name="_method" type="hidden" value="PUT">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
      <label>CODIGO No.</label>
      <input type="text" name="cod_item" class="form-control bg-info text-white" value="{{$item->cod_item}}" required>
    </div>
                	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                		<label>NOMBRE</label>
                		<input type="text" name="nom_item" class="form-control bg-info text-white" value="{{$item->nom_item}}" required>
                	</div>

                	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                		<label>COSTO $:</label>
                		<input type="number" name="costo_item" class="form-control bg-info text-white" value="{{$item->costo_item}}" step="0.01" required>
                	</div>
                	@if($item->servicio == true)
                	<div class="col-lg-1 col-md-1 col-sm-1"></div>
                        <div class="col-lg-4 col-md-4 col-sm-4 form-check form-check-inline">
                          <input class="form-check-input" type="radio" id="servicio" name="servicio" value="true" checked="true">
                          <label class="form-check-label" for="inlineCheckbox1">SERVICIO</label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 form-check form-check-inline">
                          <input class="form-check-input" type="radio" id="servicio" name="servicio" value="false ">
                          <label class="form-check-label" for="inlineCheckbox2">PRODUCTO</label>
                        </div>
                    @else
                    <div class="col-lg-1 col-md-1 col-sm-1"></div>
                        <div class="col-lg-4 col-md-4 col-sm-4 form-check form-check-inline">
                          <input class="form-check-input" type="radio" id="servicio" name="servicio" value="true">
                          <label class="form-check-label" for="inlineCheckbox1">SERVICIO</label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 form-check form-check-inline">
                          <input class="form-check-input" type="radio" id="servicio" name="servicio" value="false "  checked="true">
                          <label class="form-check-label" for="inlineCheckbox2">PRODUCTO</label>
                        </div>
                    @endif

                    @if($item->activo == true)
                        <div class="col-lg-2 col-md-2 col-sm-2 form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="activo" name="activo" value="true" checked="true">
                          <label class="form-check-label" for="inlineCheckbox3">ACTIVO</label>
                        </div>
                    @else
                        <div class="col-lg-2 col-md-2 col-sm-2 form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="activo" name="activo" value="true">
                          <label class="form-check-label" for="inlineCheckbox3">ACTIVO</label>
                        </div>
                    @endif


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