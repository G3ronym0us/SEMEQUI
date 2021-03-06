<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'adm_item';

    protected $primaryKey = 'id_item';

    protected $fillable = [
    	'cod_item',
     	'nom_item', 
     	'precio_compra', 
     	'precio_venta', 
     	'servivio', 
     	'activo'
     ];

    

}
