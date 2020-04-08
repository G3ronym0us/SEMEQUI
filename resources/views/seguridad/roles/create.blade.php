<div class="modal fade moda-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-nuevo-rol">
 	<div class="modal-dialog">
 		<div class="modal-content">
 			<div class="modal-header">
				<h5 class="modal-title">NUEVO ROL</b></h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          	<span aria-hidden="true">&times;</span>
		        </button>
			</div>
  			
			<form method="POST" action="{{ url('seguridad/roles') }}">
  				<div class="modal-body">
					<div class="row">
						{{ csrf_field() }}
						<div class="col-12 form-group">
							<label>NOMBRE DE ROL:</label>
							<input type="text" name="nom_rol" class="form-control bg-info text-white">
						</div>
						<div class="col-12 form-group">
							<label>DESCRIPCION</label>
							<input type="text" name="descripcion" class="form-control bg-info text-white">
						</div>
					</div>
				</div>

    			<div class="modal-footer">
    				<button class="btn btn-success" type="submit">GUARDAR</button>
                	<button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
                </div>
            </form>   
		</div>
	</div>		
</div>