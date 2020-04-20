<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleFactura extends Model
{
    protected $table='detalles_factura';

    protected $primaryKey='id';

    public $timestamps=true;

    protected $fillable =[
    	'orden_servicio_id',
    	'rel_id',
    	'item_id',
    	'cantidad',
    	'valor_unitario',
        'valor_total'
    ];

    protected $guarded =[

    ];
}
