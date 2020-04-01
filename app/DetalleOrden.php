<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleOrden extends Model
{
    protected $table='detalles_orden_servicio';

    protected $primaryKey='id';

    public $timestamps=true;

    protected $fillable =[
    	'orden_servicio_id',
    	'equipo_id',
    	'cantidad',
    	'valor_unitario',
        'valor_total'
    ];

    protected $guarded =[

    ];
}
