<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    protected $table='orden_servicio';

    protected $primaryKey='id';

    public $timestamps=true;

    protected $fillable =[
    	'clientes_id',
    	'tecnico_id',
    	'cod_orden',
    	'total',
    	'estado',
    ];

    protected $guarded =[

    ];
}
