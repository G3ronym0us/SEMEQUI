<div class="modal" role="dialog" tabindex="-1" id="modal-delete-{{$cl->id}}">
 	<div class="modal-dialog">
 		<div class="modal-content">
 			<form method="POST" action="{{ url('administracion/clientes') }}/{{$cl->id}}">
 			<div class="modal-header">
				<h5 class="modal-title">ELIMINAR CLIENTE</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
			</div>
  			
  			<div class="modal-body">

			
				{{ csrf_field() }}
				<input name="_method" type="hidden" value="DELETE">
			    	<span>ESTA SEGURO QUE DESEA ELIMINAR EL CLIENTE <b>{{$cl->nom_cliente}}</b></span>
			        
			    	
                	


                       
                	
                

                </div>
                <div class="modal-footer">
                	<button class="btn btn-danger" type="submit">ELIMINAR</button> 
                	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
		</div>
	</div>		

</div>