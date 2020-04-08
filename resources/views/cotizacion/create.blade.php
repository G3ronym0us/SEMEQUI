@extends('layouts.template')
@section('contenido')
<h1>COTIZACION</h1>
        
<form method="POST" action="{{ url('facturacion/cotizacion') }}">
  	{{ csrf_field() }}
  	<div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 form-group">
      @foreach($cod as $c)
            <span class="text-danger">*</span><label>ORDEN No.</label>
        <input type="text" name="id_consecutivo_cot" id="id_consecutivo_cot" value="{{ $c->id_adm_consecutivo }}" hidden>
        <input type="text" name="num_actual_cot" id="num_actual_cot" value="{{ $c->num_actual }}" hidden>
            <input type="text" name="cod_cotizacion"  class="form-control bg-info text-white" value="{{ $c->prefijo_doc.' - '.$c->num_actual }}" readonly="readonly" required>
      @endforeach
    </div>
    	
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group">
            <span class="text-danger">*</span><label>CLIENTE:</label>
            <a data-toggle="tooltip" data-placement="top" title="NUEVO CLIENTE"><a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-nuevo-cliente" id="btn_nuevo_cliente"><i class="fa fa-plus" aria-hidden="true"></i><i class="fa fa-user" aria-hidden="true"></i></a></a>

            <a data-toggle="tooltip" data-placement="top" title="ASIGNAR AREAS"><a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-asignar-areas" id="btn_asignar_areas"><i class="fa fa-plus" aria-hidden="true"></i><i class="fa fa-building-o" aria-hidden="true"></i></a></a>

            <a data-toggle="tooltip" data-placement="top" title="ASIGNAR EQUIPOS"><a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-asignar-equipos" id="btn_asignar_equipo"><i class="fa fa-plus" aria-hidden="true"></i><i class="fa fa-laptop" aria-hidden="true"></i></a></a>
            <select name="clientes_id" id="clientes_id" class="form-control bg-info text-white selectpicker" data-live-search="true" required>
                <option value="0">SELECCIONE UN CLIENTE</option>
            	@foreach($clientes as $cliente)
            	<option value="{{ $cliente->id }}">{{ $cliente->nom_cliente }}</option>
            	@endforeach
            </select>
        </div>
            	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 form-group">
    		<span class="text-danger">*</span><label>UBICACION:</label>
    		<input type="text" name="ubicacion" id="ubicacion" class="form-control bg-info text-white" required>
    	</div>

    	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 form-group">
    		<span class="text-danger">*</span><label>ESTADO:</label>
    		<input type="text" name="estado" class="form-control bg-info text-white" value="PENDIENTE" readonly="readonly" required>
    	</div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 form-group">
            <label>ITEM:</label>
            <a data-toggle="tooltip" data-placement="top" title="NUEVO ITEM"><a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-nuevo-item" id="btn_nuevo_item"><i class="fa fa-plus" aria-hidden="true"></i></a></a>
            <select name="item_id" id="item_id" class="form-control bg-info text-white selectpicker" data-live-search="true" >
                @foreach($items as $it)
                <option value="{{ $it->id_item }}">{{ $it->nom_item }}</option>
                @endforeach
            </select>
            
        </div>
    	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 form-group">
      		<label>CANTIDAD:</label>
      		<input type="text" name="cantidad" id="cantidad" onkeyup="calcular();" class="form-control bg-info text-white" >
    	</div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 form-group" id="div_area_id">
            <label>AREA:</label>
            <select name="area_id" id="area_id" class="form-control bg-info text-white selectpicker" data-live-search="true" >
                <option>SELECCIONE UN AREA</option>
            </select>
            
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group">
            <label>EQUIPO:</label>
            <select name="equipo_id" id="equipo_id" class="form-control bg-info text-white selectpicker" data-live-search="true" >
                <option>SELECCIONE UN EQUIPO</option>
            </select>
            
        </div>
        
    	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 form-group">
    		<label>VALOR UNITARIO:</label>
    		<input type="number" name="valor_unitario" id="valor_unitario" class="form-control bg-info text-white" step="0.01" >
    	</div>
    	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 form-group">
    		<label>VALOR TOTAL:</label>
    		<input type="number" name="valor_total" id="valor_total" class="form-control bg-info text-white" step="0.01" readonly="readonly" >
    	</div>
        <input type="text" name="total" id="total" hidden>
    	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
			<div class="form-group">
				<label>&nbsp;</label>
				<button type="button" id="bt_add" onclick="agregar()" class="btn btn-primary form-control"><i class="fa fa-floppy-o" aria-hidden="true"></i> AGREGAR</button>
			</div>
		</div>
            <div class="col-lg-12 col-md-12  col-sm-12 col-xs-12 form-group">
              <span class="text-danger">* Campos Obligatorios</span>
              </div>    


	</div>


<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <table class="table table-striped table-bordered table-condensed table-hover" id="detalles_cotizacion" name="detalles_cotizacion">
            <thead>

                    <th>No.</th>
                    <th>CANTIDAD</th>
                    <th>EQUIPO (AREA)</th>
                    <th>ITEM</th>
                    <th>DESCRIPCION</th>
                    <th>Vr. UNITARIO</th>
                    <th>Vr. TOTAL</th>
                           </thead>

            <tbody>
            </tbody>

            <tfoot>
				<th>TOTAL</th>
				<th></th>
				<th></th>
                <th></th>
				<th></th>
				<th></th>
				<th><H4 id="totalv">COP/. 0.00</H4></th>
			</tfoot>
        </table>
    </div>
</div>
<center>
    <div>
        <div class="form-group">
            <button class="btn btn-primary" name="btn_guardar_cotizacion" id="btn_guardar_cotizacion" type="submit">Guardar</button> 
        </div>
    </div>
</center>

</form>

@include('auxiliares.new_cliente')
@include('auxiliares.nuevo_item')
@include('auxiliares.asignar_equipo')
@include('auxiliares.asignar_area')


@endsection

@section('script')

	<script src="http://localhost:8000/js/cotizacion.js"></script>
    <script>
        function mayusculas(e) {
            e.value = e.value.toUpperCase();
          }

    </script>


@endsection