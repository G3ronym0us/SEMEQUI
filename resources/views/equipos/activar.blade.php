<div class="modal" role="dialog" tabindex="-1" id="modal-activar-{{$cl->id_equipo}}">
 	<div class="modal-dialog">
 		<div class="modal-content">
 			<form method="POST" action="{{ url('administracion/activarEquipo') }}/{{$cl->id_equipo}}">
 			<div class="modal-header">
				<h5 class="modal-title">ACTIVAR CLIENTE</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
			</div>
  			
  			<div class="modal-body">

			
				{{ csrf_field() }}
			    	<span>ESTA SEGURO QUE DESEA ACTIVAR EL CLIENTE <b>{{$cl->nom_equipo}}</b></span>
			        
			    	
                	


                       
                	
                

                </div>
                <div class="modal-footer">
                	<button class="btn btn-danger" type="submit">ACTIVAR</button> 
                	<button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
                </div>
            </form>
		</div>
	</div>		

</div>