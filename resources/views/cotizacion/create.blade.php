@extends('layouts.template')
@section('contenido')
<span id="mensaje"></span>        
<h1>COTIZACION</h1>
<form method="POST" action="{{ url('facturacion/cotizacion') }}" id="form_nueva_cot">
  	{{ csrf_field() }}
  	<div class="row">
        <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-xs-12 form-group">
      @foreach($cod as $c)
            <span class="text-danger">*</span><label>COT No.</label>
            <input type="text" name="id_consecutivo_cot" id="id_consecutivo_cot" value="{{ $c->id_adm_consecutivo }}" hidden>
            <input type="text" name="num_actual_cot" id="num_actual_cot" value="{{ $c->num_actual }}" hidden>
            <input type="text" name="cod_cotizacion" id="cod_cotizacion"  class="form-control bg-info text-white" value="{{ $c->prefijo_doc.' - '.$c->num_actual }}" readonly="readonly" required>
      @endforeach
    </div>
    	
        <div class="col-xl-3 col-lg-5 col-md-9 col-sm-8 col-xs-12 form-group">
            <span class="text-danger">*</span><label>CLIENTE:</label>
            <span data-toggle="tooltip" data-html="true" title="NUEVO CLIENTE"><a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-nuevo-cliente" id="btn_nuevo_cliente"><i class="fa fa-plus" aria-hidden="true"></i><i class="fa fa-user" aria-hidden="true"></i></a></span>

            <span data-toggle="tooltip" data-placement="top" title="ASIGNAR AREAS"><a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-asignar-areas" id="btn_asignar_areas"><i class="fa fa-plus" aria-hidden="true"></i><i class="fa fa-building-o" aria-hidden="true"></i></a></span>

            <span data-toggle="tooltip" data-placement="top" title="ASIGNAR EQUIPOS"><a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-asignar-equipos" id="btn_asignar_equipos"><i class="fa fa-plus" aria-hidden="true"></i><i class="fa fa-laptop" aria-hidden="true"></i></a></span>
            <select name="clientes_id" id="clientes_id" class="form-control bg-info text-white selectpicker" data-live-search="true" title="SELECCIONE UN CLIENTE" required>
            	@foreach($clientes as $cliente)
            	<option value="{{ $cliente->id }}">{{ $cliente->nom_cliente }}</option>
            	@endforeach
            </select>
        </div>
            	<div class="col-xl-3 col-lg-5 col-md-5 col-sm-5 col-xs-12 form-group">
    		<span class="text-danger">*</span><label>UBICACION:</label>
    		<input type="text" name="ubicacion" id="ubicacion" class="form-control bg-info text-white" readonly="readonly" required>
    	</div>

    	<div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 col-xs-12 form-group">
    		<span class="text-danger">*</span><label>ESTADO:</label>
    		<input type="text" name="estado" class="form-control bg-info text-white" value="PENDIENTE" readonly="readonly" required>
    	</div>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-xs-12 form-group">
            <span class="text-danger">*</span><label>FORMA DE PAGO:</label>
            <input type="text" name="forma_pago" class="form-control bg-info text-white" value="EFECTIVO" required>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-9 col-sm-9 col-xs-12 form-group">
            <label>ITEM:</label>
            <span data-toggle="tooltip" data-placement="top" title="NUEVO ITEM"><a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-nuevo-item" id="btn_nuevo_item"><i class="fa fa-plus" aria-hidden="true"></i></a></span>
            <select name="item_id" id="item_id" class="form-control bg-info text-white selectpicker" data-live-search="true" title="SELECCIONE UN ITEM">
                @foreach($items as $it)
                <option value="{{ $it->id_item }}">{{ $it->nom_item }}</option>
                @endforeach
            </select>
            
        </div>
    	<div class="col-xl-2 col-lg-2 col-md-3 col-sm-3 col-xs-12 form-group">
      		<label>CANTIDAD:</label>
      		<input type="text" name="cantidad" id="cantidad" onkeyup="calcular();" class="form-control bg-info text-white" >
    	</div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group" id="div_area_id">
            <label>AREA:</label>
            <select name="area_id" id="area_id" class="form-control bg-info text-white selectpicker" data-live-search="true" >
                <option>SELECCIONE UN AREA</option>
            </select>
            
        </div>
        <div class=" col-xl-4 col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group">
            <label>EQUIPO:</label>
            <select name="equipo_id" id="equipo_id" class="form-control bg-info text-white selectpicker" data-live-search="true" title="SELECCIONE UN EQUIPO">
                <option>SELECCIONE UN EQUIPO</option>
            </select>
            
        </div>
        
    	<div class="col-xl-2 col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group">
    		<label>VALOR UNITARIO:</label>
    		<input type="number" name="valor_unitario" id="valor_unitario" class="form-control bg-info text-white" step="0.01" >
    	</div>
    	<div class=" col-xl-2 col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group">
    		<label>VALOR TOTAL:</label>
    		<input type="number" name="valor_total" id="valor_total" class="form-control bg-info text-white" step="0.01" readonly="readonly" >
    	</div>
        <input type="text" name="total" id="total" hidden>
    	<div class=" col-xl-2 col-lg-4 col-md-4 col-sm-4 col-xs-12">
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
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table-responsive">
        <table class="table table-striped table-bordered table-condensed table-hover" id="detalles_cotizacion" name="detalles_cotizacion">
            <thead>
                    <th></th>
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
				<th colspan="7">TOTAL</th>
				<th><H4 id="totalv">COP/. 0.00</H4></th>
			</tfoot>
        </table>
    </div>
    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
        <input type="checkbox" class="cajas" name="obs_check" id="obs_check" value="true">
        <label>OBSERVACION</label>
    </div>
    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12 form-group">
        <input type="input" class="form-control bg-info text-white" onkeyup="mayusculas(this)" name="observacion" id="observacion" >
    </div>
</div>
<center>
    <div>
        <div class="form-group">
            <input type="checkbox" class="cajas" name="imprimir" id="imprimir" value="true">
            <label>IMPRIMIR</label>
            &nbsp;&nbsp;
            <button class="btn btn-primary" name="btn_guardar_cotizacion" id="btn_guardar_cotizacion" type="submit">GUARDAR</button> 
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

	<script src="{{asset('js/cotizacion.js')}}"></script>
    <script>
        function mayusculas(e) {
            e.value = e.value.toUpperCase();
          }

    </script>


@endsection