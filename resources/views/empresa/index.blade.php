@extends('layouts.template')
@section('contenido')

        <h1>ADMINISTRACIÓN DE EMPRESA</h1>
        <form>
                <div class="row">
                	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group">
                		<label>CODIGO No.</label>
                		<input type="text" name="cod_empresa" class="form-control bg-info text-white">
                	</div>
                	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group">
                		<label>UBICACIÓN</label>
                		<input type="text" name="ubicacion" class="form-control bg-info text-white">
                	</div>
                	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group">
                		<label>NIT / CC</label>
                		<input type="text" name="nit" class="form-control bg-info text-white">
                	</div>

                	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 form-group">
                		<label>EMPRESA</label>
                		<input type="text" name="nom_empresa" class="form-control bg-info text-white">
                	</div>
                	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group">
                		<label>DIRECCIÓN</label>
                		<input type="text" name="direccion" class="form-control bg-info text-white">
                	</div>

                	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group">
                		<label>TELEFONO</label>
                		<input type="text" name="cod_empresa" class="form-control bg-info text-white">
                	</div>
                	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group">
                		<label>CELULAR</label>
                		<input type="text" name="ubicacion" class="form-control bg-info text-white">
                	</div>
                	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group">
                		<label>CORREO</label>
                		<input type="text" name="nit" class="form-control bg-info text-white">
                	</div>

                	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                		<label>LOGO</label>
                		<input type="text" name="nom_empresa" class="form-control bg-info text-white">
                	</div>
                </div>
        </form>

@endsection