@extends('layouts.template')
@section('contenido')
<h1>ORDEN (EDITAR)</h1>

@foreach($orden as $ord)

<form method="POST" action="{{ url('operacion/orden_servicio') }}/{{$ord->id}}">
{{ csrf_field() }}
<input name="_method" type="hidden" value="PUT">
        
	<input type="text" name="id" id="id" value="{{ $ord->id }}" hidden>
  	<div class="row">
    	<div class="col-lg-1 col-md-1 col-sm-1 col-xs-12 form-group">
      		<label>ORDEN No.</label>
      		<input type="text" name="cod_orden" class="form-control bg-info text-white" value="{{ $ord->cod_orden }}" readonly="readonly">
    	</div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group">
            <label>CLIENTE:</label>
            <select name="clientes_id" id="clientes_id" class="form-control bg-info text-white" readonly="readonly">
            	<option value="{{ $ord->clientes_id }}">{{ $ord->nom_cliente }}</option>
            </select>
        </div>
    	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 form-group">
    		<label>UBICACION:</label>
    		<input type="text" name="ubicacion" class="form-control bg-info text-white" value="{{ $ord->nom_departamento.' - '.$ord->nom_municipio }}" readonly="readonly">
    	</div>

        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 form-group">
            <label>FECHA ING:</label>
            <input type="datetime" name="fecha_ingreso" class="form-control bg-info text-white" value="{{ $ord->created_at }}" readonly="readonly">
        </div>
    	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 form-group">
    		<label>ESTADO:</label>
    		<input type="text" name="estado" class="form-control bg-info text-white" value="PENDIENTE" readonly="readonly" required>
    	</div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 form-group">
            <label>ITEM</label>
            <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-nuevo-item" id="btn_nuevo_item">+</a>
            <select name="item_id" id="item_id" class="form-control bg-info text-white" >
                @foreach($items as $it)
                <option value="{{ $it->id_item }}">{{ $it->nom_item }}</option>
                @endforeach
            </select>
            
        </div>
    	<div class="col-lg-1 col-md-1 col-sm-1 col-xs-12 form-group">
      		<label>CANTIDAD</label>
      		<input type="text" name="cantidad" id="cantidad" class="form-control bg-info text-white" >
    	</div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 form-group">
            <label>AREA</label>
            <select name="area_id" id="area_id" class="form-control bg-info text-white" >

            </select>
            
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 form-group">
            <label>EQUIPO</label>
            <select name="equipo_id" id="equipo_id" class="form-control bg-info text-white" >

            </select>
            
        </div>
    	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 form-group">
    		<label>VALOR UNITARIO</label>
    		<input type="number" name="valor_unitario" id="valor_unitario" class="form-control bg-info text-white" step="0.01" >
    	</div>
    	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 form-group">
    		<label>VALOR TOTAL</label>
    		<input type="number" name="valor_total" id="valor_total" class="form-control bg-info text-white" step="0.01" readonly="readonly" >
    	</div>
        <input type="text" name="total" id="total" hidden>
    	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 form-group">
				<label>&nbsp;</label>
				<button type="button" id="bt_add" onclick="agregar()" class="btn btn-primary form-control">Agregar</button>
		</div>


	</div>

@endforeach
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table-responsive">
        <table class="table table-striped table-bordered table-condensed table-hover" id="detalles_orden" name="detalles_orden">
            <thead>
            	<th></th>
                <th>No.</th>
                <th>CANTIDAD</th>
                <th>ITEM</th>
                <th>EQUIPO</th>
                <th>SERIAL</th>
               	<th>PLACA</th>
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
            <button class="btn btn-primary" type="submit">Guardar</button> 
        </div>
    </div>
</center>

</form>


@endsection

@section('script')

	<script src="http://localhost:8000/js/orden.js"></script>
    <script>


    </script>


@endsection
</div>