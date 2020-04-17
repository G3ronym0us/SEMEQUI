<div class="modal fade moda-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-agregar-clase">
 	<div class="modal-dialog">
 		<div class="modal-content">
 			<div class="modal-header">
				<h5 class="modal-title">NUEVA CLASE</b></h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          	<span aria-hidden="true">&times;</span>
		        </button>
			</div>
  			
			<form id="form_agregar_clase" method="POST" action="{{ url('/agregarClase') }}">
  			<div class="modal-body">
			<div class="row">
				{{ csrf_field() }}

			    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
			      		<label>NOMBRE</label>
			      		<input type="text" name="nom_clase_equipo" id="nom_clase_equipo" class="form-control bg-info text-white" onkeyup="mayusculas(this);" required>
			    	</div>
			        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
			    		<label>DESCRIPCION</label>
			    		<input type="text" name="des_clase_equipo" id="des_clase_equipo" class="form-control bg-info text-white" onkeyup="mayusculas(this);" required>
			    	</div>
              


  </div>
    </div>

    <div class="modal-footer">
    				<button class="btn btn-success" type="submit" name="agregar_clase" id="agregar_clase">GUARDAR</button> 
                	<button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
                </div>
					 </form>
                        
                       
                	
               
		</div>
	</div>		

</div>