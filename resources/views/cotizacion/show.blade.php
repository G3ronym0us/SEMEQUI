<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
        .text-right{
            text-align: right;
        }
        .text-center{
            text-align: center;
        }
        .text-left{
            text-align: left;
        }

        table {
          border-collapse: collapse;
          width: 100%;
        }

        .bordered {
          border: 1px solid black;
        }

        .w-20{
            width: 20%;
        }

        .w-18{
            width: 18%;
        }

        .w-25{
            width: 25%; 
        }

        .w-37{
            width: 37%; 
        }

        .w-40{
            width: 40%; 
        }
        .w-8{
            width: 8%; 
        }
        .w-34{
            width: 34%; 
        }
        .w-4{
            width: 4%; 
        }
        .w-15{
            width: 15%; 
        }
        .w-80{
            width: 80%;
        }
        .w-60{
            width: 60%;
            margin: 0;
        }

        .align-left{
            text-align: left;
        }
        .border-top{
            border-top: 1px solid #000;
        }
        #logo{
            padding: 0px;
            margin: 0px;
        }
        footer {
                position: fixed; 
                bottom: -10px; 
                left: 0px; 
                right: 0px;
                height: 50px; 
            }

    </style>
</head>
<body>
    <center><h1>COTIZACIÓN</h1></center><br>
    @foreach($empresa as $emp)
    <table class="" id="datos_empresa">
        <tr class="" >
            <td style="width: 120px;" rowspan="6"><center><img id="logo" src="{{public_path('img/empresa/'.$emp->logo)}}" width="100px" height="100px"></center></td>
            <td class="">{{ $emp->nom_empresa }}</td>
            <td style="width: 120px; " class="text-center">Cotizacion</td>
        </tr>
        <tr class="">
            <td class="">{{ $emp->dir_empresa }}</td>
            <td class="text-center">N° de Cotización</td>
        </tr>
        <tr class="">
            <td class="">EMAIL - {{ $emp->mail }}</td>
            <td class="text-center border-top">{{ substr($cotizacion->cod_cotizacion,6) }}</td>
        </tr>
        <tr class="">
            <td class="">TEL. {{ $emp->tel_empresa }} + CELULAR: {{ $emp->cel_empresa }}</td>
            <td></td>
        </tr>
        <tr class="">
            <td class="">NIT: {{ $emp->nit_empresa }}</td>
            <td class="text-center border-top">Fecha</td>
        </tr>
        <tr class="">
            <td class=""></td>
            <td class="text-center border-top">{{ date("d.m.Y") }}</td>
        </tr>
    </table>
    @endforeach

    <br>

    <span>Cliente</span><br>
    <div class="align-left">
        <hr class="w-60">
    </div>
    <span>NOMBRE CLIENTE: {{$cotizacion->nom_cliente}}</span><br>
    <span>NIT /CC: {{$cotizacion->nit_cliente}}</span><br>
    <span>DIRECCION: {{$cotizacion->dir_cliente}}</span><br>
    <span>UBICACION: {{$cotizacion->nom_departamento.' - '.$cotizacion->nom_municipio}}</span><br>
    <span>TEL. CELULAR: {{$cotizacion->tel_cliente}}</span><br>
    <span>CORREO: {{$cotizacion->correo_cliente}}</span><br><br><br>
        <table id="detalles_cotizacion">
            <thead>
                <tr class="bordered">
                    <th class="bordered col_cantidad text-center w-4">No.</th>
                    <th class="bordered col_cantidad text-center w-8">CANT</th>
                    <th class="bordered col_item text-center w-23">DESCRIPCION</th>
                    <th class="bordered col_equipo text-center w-35">AREA/EQUIPO</th>
                    <th class="bordered col_equipo text-center w-15">Vr. UNITARIO</th>
                    <th class="bordered col_equipo text-center w-15">Vr. TOTAL</th>
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
                        <td class="bordered col_cantidad text-center w-4">{{ $c }}</td>
                        <td class="bordered col_item text-center w-8">{{ $det->cantidad }}</td>
                        <td class="bordered col_equipo text-left w-23">{{ $det->nom_item }}</td>
                        <td class="bordered col_v_unitario text-left w-35">{{ $det->nombre_area.' - '.$det->nom_equipo }}</td>
                        <td class="bordered col_v_unitario text-right w-15">$ {{ number_format($det->valor_unitario, 2,'.',',') }}</td>
                        <td class="bordered col_v_unitario text-right w-15">$ {{ number_format($det->valor_total, 2,'.',',') }}</td>
                    </tr>
                    <?php $c++ ?>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="4"></th>
                    <th class="bordered">TOTAL</th>
                    <th class="bordered text-right">$ {{ number_format($cotizacion->total, 2,'.',',') }}</th>
                </tr>
            </tfoot>
        </table>

    <br><br>


    <footer>
        <table class="bordered">
            <tr>
                <th class="bordered text-left w-20">FORMA DE PAGO</th>
                <td class="bordered text-left w-80">{{$cotizacion->forma_pago}}</td>
            </tr>
            <tr>
                <th class="bordered text-left w-20">OBSERVACION</th>
                <td class="bordered text-left w-80">{{$cotizacion->observacion}}</td>
            </tr>
        </table>
    </footer>

    
</body>
</html>