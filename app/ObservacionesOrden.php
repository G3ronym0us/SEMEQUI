<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ObservacionesOrden extends Model
{
    protected $table='observaciones_orden';

    protected $primaryKey='id';

    public $timestamps=false;

    protected $fillable =[
    	'detalles_orden_id',
    	'observacion'
    ];

    protected $guarded =[

    ];
}
