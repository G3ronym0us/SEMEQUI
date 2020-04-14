<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    protected $table='cotizacion';

    protected $primaryKey='id_cotizacion';

    public $timestamps=true;

    protected $fillable =[
    	'clientes_id',
    	'ubicacion',
    	'cod_cotizacion',
    	'total',
    	'estado',
        'forma_pago',
        'observacion'
    ];

    protected $guarded =[

    ];
}
