@extends('layouts.template')

@section('contenido')

<style type="text/css">
	.centrar{
		
		width: 55px; 
		height: 55px;
		display: flex;
  		align-items: center;
  		justify-content: center;
	}
</style>
<div class="container">
	<div class="row">
		<div class="col-xl-3 col-lg-4 col-sm-12 col-xs-12 card text-white bg-warning mb-3">
		  <div class="card-body">
		  	<div class="row">
		  		<div class="col-3">
		  			<div class="rounded-circle centrar" style=" background-color: #F5B041; ">
			  				<i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i>
		  			</div>
		  		</div>
		  		<div class="col-9">
		  			<h6 class="card-title"><b>ORDENES DE SERVICIO</b></h6>
				    <p class="card-text">{{ $cant_ordenes }}</p>
				    <div class="progress" style="height: 5px;">
						<div class="progress-bar progress-bar-striped" role="progressbar" style="width: {{ $porcentaje_ordenes }}%; height: 5px; background-color: #FFF;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
				    <p class="card-text">AUMENTO {{ $porcentaje_ordenes }}% LOS ULTIMOS 30 DIAS</p>
		  		</div>
		  	</div>
		  </div>
		</div>
		&nbsp;&nbsp;&nbsp;&nbsp;
		<div class="col-xl-3 col-lg-4 col-sm-12 col-xs-12 card text-white mb-3" style=" background-color: #76448A;">
		  <div class="card-body">
		  	<div class="row">
		  		<div class="col-3">
		  			<div class="rounded-circle centrar" style="background-color: #6C3483;">
			  				<i class="fa fa-usd fa-2x" aria-hidden="true"></i>
		  			</div>
		  		</div>
		  		<div class="col-9">
		  			<h6 class="card-title"><b>VENTAS FACTURADAS</b></h6>
				    	<p class="card-text">$ {{ $ventas_actual }}</p>
				    <div class="progress" style="height: 5px;">
						<div class="progress-bar progress-bar-striped" role="progressbar" style="width: {{ $porcentaje_ventas }}%; height: 5px;background-color: #FFF;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
				    <p class="card-text">AUMENTO {{ $porcentaje_ventas }}% LOS ULTIMOS 30 DIAS</p>
		  		</div>
		  	</div>
		  </div>
		</div>
		&nbsp;&nbsp;&nbsp;&nbsp;
		<div class=" col-xl-3 col-lg-4 col-sm-12 col-xs-12 card text-white mb-3" style="background-color: #117A65;">
		  <div class="card-body">
		  	<div class="row">
		  		<div class="col-3">
		  			<div class="rounded-circle centrar" style="background-color: #27AE60;">
			  				<i class="fa fa-user fa-2x" aria-hidden="true"></i>
		  			</div>
		  		</div>
		  		<div class="col-9">
		  			<h6 class="card-title"><b>CLIENTES</b></h6>
				    <p class="card-text">{{ $cant_clientes }}</p>
				    <div class="progress" style="height: 5px;">
						<div class="progress-bar progress-bar-striped" role="progressbar" style="width: {{ $porcentaje_clientes }}%; height: 5px; background-color: #FFF;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
				    <p class="card-text">AUMENTO {{ $porcentaje_clientes }}% LOS ULTIMOS 28 DIAS</p>
		  		</div>
		  	</div>
		  </div>
		</div>
	</div>
</div>

@endsection
