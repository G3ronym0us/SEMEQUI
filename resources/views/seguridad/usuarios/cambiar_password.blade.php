<div class="modal" role="dialog" tabindex="-1" id="modal-cambiar-password">
 	<div class="modal-dialog modal-sm">
 		<div class="modal-content">
			<form method="POST" action="{{ url('seguridad/usuarios/cPassword/') }}">
                @csrf
 			<div class="modal-header">
				<h5 class="modal-title">NUEVO USUARIO</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
			</div>
  			
  			<div class="modal-body">
                <div class="row">
                    <div class="col-12 form-group">
                        <label for="cpassword">NUEVA CONTRASEñA:</label>
                        <input type="password" class="bg-info text-white form-control" name="cpassword" id="cpassword" required>
                        <strong ><span id="cconfirmar" class="text-danger"></span></strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 form-group">
                        <label for="cconfirm">CONFIRME NUEVA CONTRASEñA:</label>
                        <input type="password" class="bg-info text-white form-control" name="cconfirm" id="cconfirm" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 form-group">
                        <label for="password_last">CONTRASEÑA ANTERIOR:</label>
                        <input type="password" class="bg-info text-white form-control" name="password_last" id="password_last" required>
                        <strong ><span id="error_pl" class="text-danger"></span></strong>
                    </div>
                </div>
                    
                </div>
                <div class="modal-footer">
                	<button class="btn btn-success" id="btn-np" type="submit">GUARDAR</button> 
                	<button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
                </div>
            </form>
		</div>
	</div>		

</div>
