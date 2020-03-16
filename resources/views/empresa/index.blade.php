@extends('layouts.template')
@section('contenido')

        <h1>ADMINISTRACIÓN DE EMPRESA</h1>
        <form method="POST" action="{{ url('administracion/empresa') }}">
        {{ csrf_field() }}
                @foreach($empresa as $emp)
                <div class="row">
                	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group">
                		<label>CODIGO No.</label>
                		<input type="text" name="cod_empresa" class="form-control bg-info text-white" value="{{ $emp->cod_empresa }}">
                	</div>
                	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group">
                		<label>UBICACIÓN</label>
                		<input type="text" name="id_municipio" class="form-control bg-info text-white" value="{{ $emp->id_municipio }}">
                	</div>
                	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group">
                		<label>NIT / CC</label>
                		<input type="text" name="nit_empresa" class="form-control bg-info text-white" value="{{ $emp->nit_empresa }}">
                	</div>

                	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 form-group">
                		<label>EMPRESA</label>
                		<input type="text" name="nom_empresa" class="form-control bg-info text-white" value="{{ $emp->nom_empresa }}">
                	</div>
                	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group">
                		<label>DIRECCIÓN</label>
                		<input type="text" name="dir_empresa" class="form-control bg-info text-white" value="{{ $emp->dir_empresa }}">
                	</div>

                	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group">
                		<label>TELEFONO</label>
                		<input type="text" name="tel_empresa" class="form-control bg-info text-white" value="{{ $emp->tel_empresa }}">
                	</div>
                	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group">
                		<label>CELULAR</label>
                		<input type="text" name="cel_empresa" class="form-control bg-info text-white" value="{{ $emp->cel_empresa }}">
                	</div>
                	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group">
                		<label>CORREO</label>
                		<input type="text" name="mail" class="form-control bg-info text-white" value="{{ $emp->mail }}">
                	</div>

                	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                		<label>LOGO</label>
                		<input type="text" name="logo" class="form-control bg-info text-white" value="{{ $emp->logo }}">
                	</div>
                        <div class="col-lg-1 col-md-1 col-sm-1">
                          <div class="form-group">
                            <button class="btn btn-primary" type="submit">Guardar</button> 
                          </div>
                        </div>
                </div>
                @endforeach
        </form>

@endsection