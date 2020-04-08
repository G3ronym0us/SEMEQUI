<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facturacion extends Model
{
    protected $table='facturacion';

    protected $primaryKey='id_facturacion';

    public $timestamps=true;

    protected $fillable =[
    	'clientes_id',
    	'cod_factura',
    	'total',
    	'estado',
    ];

    protected $guarded =[

    ];
}
