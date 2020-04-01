@extends('layouts.template')
@section('contenido')
<h1>COTIZACIONES</h1> <a href="{{url('facturacion/facturacion/create')}}"><button class="btn btn-primary">+</button></a>
  
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <table class="table table-striped table-bordered table-condensed table-hover" id="detalles_orden" name="detalles_orden">
            <thead>
                <tr>
                    <th>No. FACTURA</th>
                    <th>CLIENTE</th>
                    <th>UBICACION</th>
                    <th>FEC. CREACION</th>
                    <th>ESTADO</th>
                    <th>V. FACTURA</th>
                    <th>OBSERVACION</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>



@endsection

@section('script')

    

@endsection