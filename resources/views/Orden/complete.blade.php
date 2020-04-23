<div class="modal fade moda-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-completar-{{$orden->id}}">
 	<div class="modal-dialog model-lg">
 		<div class="modal-content">
 			
 			<div class="modal-header">
				<h5 class="modal-title">COMPLETAR ORDEN DE SERVICIO (<b>{{$orden->cod_orden}}</b>)</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          	<span aria-hidden="true">&times;</span>
		        </button>
			</div>

			<form method="POST" id="form_completar_orden" action="{{ url('completar/orden_servicio/') }}">
			{{ csrf_field() }}
  			<input type="text" name="orden_id" value="{{$orden->id}}" hidden>
  			<div class="modal-body">
  				<div class="container" id="items">
  					<input type="text" class="form-control bg-info text-white" name="detalles[]" value="null" hidden>	
  					@foreach($detalles as $det)
  							<input type="checkbox" class="cajas" name="detalles[]" value="{{$det->id}}"  checked="true">
  							<label>{{ $det->cantidad.' '.$det->nom_item.' - '.$det->nom_equipo.' / $ '.number_format($det->valor_total, 2,'.',',') }}</label>
  							<div class="observaciones" id="obs_{{$det->id}}">
  								<input type="text" class="form-control bg-info text-white" name="id_detalle[]" value="{{$det->id}}" hidden>	
  								<input type="text" class="form-control bg-info text-white" name="observaciones[]" >
  							</div>
  							<br>	

  					@endforeach
  				</div>
				<div class="container">
              		<span class="text-danger">* Marque las tareas completadas, de no estar completadas rellene la observacion.</span>
              	</div>
    		</div>

		    <div class="modal-footer">
		    	<button class="btn btn-success" type="submit">COMPLETAR</button> 
            	<button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
            </div>	 
            </form>              
		</div>
	</div>		
</div>