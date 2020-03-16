<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    protected $table = 'adm_clientes';

    protected $primaryKey = 'id';

    protected $fillable = [
    	'id_municipio',
    	'nom_consecutivo',
    	'nom_cliente',
    	'nit_cliente', 
    	'tipo_cliente',
    	'dir_cliente',
    	'tel_cliente', 
    	'cel_cliente',
    	'correo',
    	'status'
    ];

    public function areas()
    {
        return $this->hasMany('App\Areas');
    }


}
