<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
        #detalles_orden{
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
    @foreach($orden as $or)
    <div>
        {{ $or->nom_municipio.' - '.$or->nom_departamento.', '.$or->created_at }}
        <br>
        <span>Señores</span>
        <br>
        {{ $or->nom_cliente }}
        <br><br>
    </div>
    

    <div>
        <center><h4>ORDEN</h4></center>
        <table id="detalles_orden">
            <thead>
                <tr>
                    <th class="col_cantidad text-center">CANT</th>
                    <th class="col_item text-center">ITEM</th>
                    <th class="col_equipo text-center">EQUIPO</th>
                    <th class="col_v_unitario text-center">V. UNITARIO</th>
                    <th class="col_v_total text-center">V. TOTAL</th>
                </tr>
            </thead>
            <tbody>
                <?php $c=1 ?>
                @foreach($detalles as $det)
                    
                    @if($c % 2)
                    <tr bgcolor="#FFF">
                    @else
                    <tr bgcolor="#F2F3F4">
                    @endif
                        <td class="col_cantidad text-center">{{ $det->cantidad }}</td>
                        <td class="col_item text-left">{{ $det->nom_item }}</td>
                        <td class="col_equipo text-left">{{ $det->nom_equipo }} ({{ $det->nombre_area }})</td>
                        <td class="col_v_unitario text-right">{{ $det->valor_unitario }} $</td>
                        <td class="col_v_total text-right">{{ $det->valor_total }} $</td>
                    </tr>
                    <?php $c++ ?>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td class="text-left" colspan="4"><b>TOTAL</b></td>
                    <td class="text-right"><b><span>{{ $or->total }} $</span></b></td>     
                </tr>
            </tfoot>
        </table>
    @endforeach
    </div>
    
</body>
</html>