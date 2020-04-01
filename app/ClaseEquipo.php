<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClaseEquipo extends Model
{
    protected $table = 'adm_clase_equipo';

    protected $primaryKey = 'id_clase_equipo';

    protected $fillable = [
    	'nom_clase_equipo',
    	'des_clase_equipo',
    	'activo'
    ];

}
