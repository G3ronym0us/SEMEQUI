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

    </style>
</head>
<body>
    <span class="text-right"><h1>ORDEN DE SERVICIO No. {{ substr($orden->cod_orden,6) }}</h1></span>
    @foreach($empresa as $emp)
    <table class="bordered" id="datos_empresa">
        <tr class="bordered" >
            <td style="width: 120px;" rowspan="6"><center><img id="logo" src="{{public_path('img/empresa/'.$emp->logo)}}" width="100px" height="100px"></center></td>
            <td class="bordered">{{ $emp->nom_empresa }}</td>
        </tr>
        <tr class="bordered">
            <td class="bordered">{{ $emp->nom_empresa }}</td>
        </tr>
        <tr class="bordered">
            <td class="bordered">NIT: {{ $emp->nit_empresa }}</td>
        </tr>
        <tr class="bordered">
            <td class="bordered">DIRECCION: {{ $emp->dir_empresa }}</td>
        </tr>
        <tr class="bordered">
            <td class="bordered">TEL. {{ $emp->tel_empresa }} + CELULAR: {{ $emp->cel_empresa }}</td>
        </tr>
        <tr class="bordered">
            <td class="bordered">EMAIL - {{ $emp->mail }}</td>
        </tr>
    </table>
    @endforeach

    <br>
    
    <table class="bordered" id="table_datos_clientes">
        <tr class="bordered">
            <td class="bordered w-20">CLIENTE:</td>
            <td class="bordered w-37">{{ $orden->nom_cliente }}</td>
            <td class="bordered w-18">CONTACTO:</td>
            <td class="bordered w-25">{{ $orden->contacto }}</td>
        </tr>
        <tr class="bordered">
            <td class="bordered w-20">CIUDAD:</td>
            <td class="bordered w-37">{{ $orden->nom_municipio.' - '.$orden->nom_departamento }}</td>
            <td class="bordered w-18">FECHA:</td>
            <td class="bordered w-25"></td>
        </tr>
        <tr class="bordered">
            <td class="bordered w-20">FECHA INGRESO:</td>
            <td class="bordered w-37">{{ substr($orden->created_at,0,10) }}</td>
            <td class="bordered w-18">FECHA SALIDA:</td>
            <td class="bordered w-25">{{ substr($orden->updated_at,0,10) }}</td>
        </tr>
        <!--<tr class="bordered">
            <td class="bordered w-20">USUARIO:</td>
            <td class="bordered w-37"></td>
            <td class="bordered w-18">CARGO:</td>
            <td class="bordered w-25"></td>
        </tr>
        <tr class="bordered">
            <td class="bordered w-20">ID USUARIO:</td>
            <td class="bordered w-37"></td>
            <td class="bordered w-18">DEPENDENCIA:</td>
            <td class="bordered w-25"></td>
        </tr>-->
    </table>
    




    
        <table id="detalles_cotizacion">
            <thead>
                <tr class="bordered">
                    <th class="bordered col_cantidad text-center w-8">No.</th>
                    <th class="bordered col_cantidad text-center w-8">CANT</th>
                    <th class="bordered col_item text-center w-34">DESCRIPCION</th>
                    <th class="bordered col_equipo text-center w-40">AREA/EQUIPO</th>
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
                        <td class="bordered col_cantidad text-center w-8">{{ $c }}</td>
                        <td class="bordered col_item text-center w-8">{{ $det->cantidad }}</td>
                        <td class="bordered col_equipo text-left w-34">{{ $det->nom_item }}</td>
                        <td class="bordered col_v_unitario text-left w-40">{{ $det->nombre_area.' - '.$det->nom_equipo }}</td>
                    </tr>
                    <?php $c++ ?>
                @endforeach
            </tbody>
        </table>

    <br><br>

    <table class="bordered">
        <tr class="bordered">
            <td class="bordered w-20">FIRMA TECNICO:</td>
            <td class="bordered w-37"></td>
            <td class="bordered w-18">FIRMA USUARIO:</td>
            <td class="bordered w-25"></td>
        </tr>
        <tr class="bordered">
            <td class="bordered w-20">TECNICO</td>
            <td class="bordered w-37">{{ $tecnico->name }}</td>
            <td class="bordered w-18">USUARIO:</td>
            <td class="bordered w-25"></td>
        </tr>
        <tr class="bordered">
            <td class="bordered w-20">C.C</td>
            <td class="bordered w-37"></td>
            <td class="bordered w-18">C.C</td>
            <td class="bordered w-25"></td>
        </tr>
    </table>

    
</body>
</html>