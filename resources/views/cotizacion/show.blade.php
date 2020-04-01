@extends('layouts.template')
@section('contenido')
<h1>COTIZACION</h1>
        
@foreach($cotizacion as $cot)
  	<div class="row">
    	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 form-group">
      		<label>ORDEN No.</label>
      		<input type="text" name="cod_cotizacion" class="form-control bg-info text-white" value="{{ $cot->cod_cotizacion }}" readonly="readonly">
    	</div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 form-group">
            <label>CLIENTE:</label>
            <input type="text" name="cod_cotizacion" class="form-control bg-info text-white" value="{{ $cot->cod_cotizacion }}" readonly="readonly">
        </div>
    	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group">
    		<label>UBICACION:</label>
    		<input type="text" name="ubicacion" class="form-control bg-info text-white" step="0.01" required>
    	</div>

        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 form-group">
            <label>FECHA ING:</label>
            <input type="text" name="fecha_ingreso" class="form-control bg-info text-white" required>
        </div>
    	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 form-group">
    		<label>ESTADO:</label>
    		<input type="text" name="estado" class="form-control bg-info text-white" step="0.01" value="PENDIENTE" readonly="readonly" required>
    	</div>

    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group"></div>
    	<div class="col-lg-1 col-md-1 col-sm-1 col-xs-12 form-group">
      		<label>CANTIDAD</label>
      		<input type="text" name="cantidad" id="cantidad" class="form-control bg-info text-white" >
    	</div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 form-group">
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
    	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
			<div class="form-group">
				<label> </label>
				<button type="button" id="bt_add" onclick="agregar()" class="btn btn-primary">Agregar</button>
			</div>
		</div>


	</div>

@endforeach
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <table class="table table-striped table-bordered table-condensed table-hover" id="detalles_orden" name="detalles_orden">
            <thead>

                    <th>No.</th>
                    <th>CANTIDAD</th>
                    <th>EQUIPO</th>
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
				<th><H4 id="totalv">Bs/. 0.00</H4></th>
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

	<script src="http://localhost:8000/js/cotizacion.js"></script>
    <script>

    </script>


@endsection
</div>