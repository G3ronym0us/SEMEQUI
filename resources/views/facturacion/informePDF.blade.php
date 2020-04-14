<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
        #orden_tabla{
            width: 100%;
        }

        .text-right{
            text-align: right;
        }
        .text-center{
            text-align: center;
        }
        .text-left{
            text-align: left;
        }

        thead, tfoot{
            color: #FFF;
            background-color: #717D7E;
        }


    </style>
</head>
<body>
    <center><h4>INFORME DE FACTURACIONES</h4></center>
    <table class="table table-striped table-bordered table-condensed table-hover" id="orden_tabla" name="orden_tabla">
        <thead>
            <tr>
                <th>No. ORDEN </th>
                <th>CLIENTE</th>
                <th>UBICACION</th> 
                <th>FECHA ATENCION</th>
                <th>ESTADO</th>
                <th>Vr. ORDEN</th>
            </tr>
        </thead>
        <tbody>
            <?php $total = 0; ?>
            @foreach ($facturas as $fac)
            <tr>
                <td>{{$fac->cod_factura}}</td>
                <td>{{$fac->nom_cliente}}</td>
                <td>{{$fac->nom_municipio}} - {{$fac->nom_departamento}}</td>
                <td>{{$fac->created_at}}</td>
                <td>{{$fac->estado}}</td>
                <td class="text-right">{{$fac->total}}$</td>
            </tr>
            <?php $total += $fac->total; ?>
            @endforeach
        </tbody>
        <tfoot>
            <th colspan="6">TOTAL</th>
            <th class="text-right">{{ $total }}$</th>
        </tfoot>
    </table>

</body>
</html>