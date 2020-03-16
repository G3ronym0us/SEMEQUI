<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consecutivos extends Model
{
    protected $table = 'adm_consecutivo';

    protected $primaryKey = 'id_adm_consecutivo';

    protected $fillable = [
    	'prefijo_doc',
    	'nom_consecutivo',
    	'num_ini',
    	'num_actual', 
    	'num_final' 
    ];

}
