<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleCotizacion extends Model
{
    protected $table='detalles_cotizacion';

    protected $primaryKey='id';

    public $timestamps=true;

    protected $fillable =[
    	'cotizacion_id',
    	'equipo_id',
        'item_id',
        'area_id',
    	'cantidad',
    	'valor_unitario',
    	'valor_total'
    ];

    protected $guarded =[

    ];
}
