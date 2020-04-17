<div class="modal" role="dialog" tabindex="-1" id="modal-nuevo-usuario">
 	<div class="modal-dialog modal-lg">
 		<div class="modal-content">
			<form method="POST" action="{{ url('seguridad/usuarios') }}">
 			<div class="modal-header">
				<h5 class="modal-title">NUEVO USUARIO</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
			</div>
  			
  			<div class="modal-body">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">NOMBRES:</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="mayusculas form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">CORREO:</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="mayusculas form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">CONTRASEÑA:</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" value="12345678">
								<strong ><span id="confirmar" class="text-danger"></span></strong>
                                    
                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">CONFIRME CONTRASEÑA:</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" value="12345678">
                            </div>
                        </div>

                        <div class="form-group row">
                        <label for="rol" class="col-md-4 col-form-label text-md-right">ROL</label>
                        <div class="col-md-6">
                            <select name="rol" id="rol" class="form-control" >
                                @foreach($roles as $rol)
                                        <option value="{{$rol->nom_rol}}">{{ $rol->nom_rol }}</option>               
                                @endforeach
                            </select>
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
