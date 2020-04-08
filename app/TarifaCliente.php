<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TarifaCliente extends Model
{
    protected $table='tarifas_clientes';

    protected $primaryKey='id';

    public $timestamps=true;

    protected $fillable =[
    	'item_id',
    	'cliente_id',
    	'precio_venta'
    ];

    protected $guarded =[

    ];
}
