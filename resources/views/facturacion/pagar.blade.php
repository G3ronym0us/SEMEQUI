<div class="modal fade moda-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-pagar-{{$factura->id_facturacion}}">
 	<div class="modal-dialog model-lg">
 		<div class="modal-content">
 			
 			<div class="modal-header">
				<h5 class="modal-title">PAGAR FACTURA (<b>{{$factura->cod_factura}}</b>)</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          	<span aria-hidden="true">&times;</span>
		        </button>
			</div>

			<form method="POST" id="form_pagar_factura" action="{{ url('facturacion/pagar/') }}">
			{{ csrf_field() }}
  			<input type="text" name="id_facturacion" value="{{$factura->id_facturacion}}" hidden>
  			<div class="modal-body">
  				<div class="container" >
  					<span>ESTA SEGURO QUE DESEA MARCAR LA FACTURA <b>{{ $factura->cod_factura}}</b> POR UN MONTO DE $<b>{{ $factura->total }}</b> COMO <b>PAGADA</b> </span>
  				</div>
    		</div>

		    <div class="modal-footer">
		    	<button class="btn btn-success" type="submit">PAGAR</button> 
            	<button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
            </div>	 
            </form>              
		</div>
	</div>		
</div>