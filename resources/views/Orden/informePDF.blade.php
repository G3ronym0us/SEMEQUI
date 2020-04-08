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
    <center><h4>INFORME DE ORDENES DE SERVICIO</h4></center>
    <table class="table table-striped table-bordered table-condensed table-hover" id="orden_tabla" name="orden_tabla">
        <thead>
            <tr>
                <th>No. ORDEN </th>
                <th>CLIENTE</th>
                <th>UBICACION</th>
                <th>TECNICO</th>  
                <th>FECHA ATENCION</th>
                <th>ESTADO</th>
                <th>Vr. ORDEN</th>
            </tr>
        </thead>
        <tbody>
            <?php $total = 0; ?>
            @foreach ($ordenes as $orden)
            <tr>
                <td>{{$orden->cod_orden}}</td>
                <td>{{$orden->nom_cliente}}</td>
                <td>{{$orden->nom_municipio}} - {{$orden->nom_departamento}}</td>
                <td>{{$orden->name}}</td>
                <td>{{$orden->created_at}}</td>
                <td>{{$orden->estado}}</td>
                <td class="text-right">{{$orden->total}}$</td>
            </tr>
            <?php $total += $orden->total; ?>
            @endforeach
        </tbody>
        <tfoot>
            <th colspan="6">TOTAL</th>
            <th class="text-right">{{ $total }}$</th>
        </tfoot>
    </table>

</body>
</html>