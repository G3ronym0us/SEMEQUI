<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleCotizacion extends Model
{
    protected $table='detalles_cotizacion';

    protected $primaryKey='id_detalle_cotizacion';

    public $timestamps=true;

    protected $fillable =[
    	'cotizacion_id',
    	'rel_id',
        'item_id',
    	'cantidad',
    	'valor_unitario',
    	'valor_total'
    ];

    protected $guarded =[

    ];
}
