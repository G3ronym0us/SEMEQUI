<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipos extends Model
{
    protected $table = 'adm_equipo';

    protected $primaryKey = 'id_equipo';

    protected $fillable = [
    	'id_clase_equipo',
    	'cod_equipo',
    	'nom_equipo',
    	'marca', 
    	'caracteristica_equipo', 
    	'activo', 
    	'obs_equipo', 
    ];

    public function municipio()
    {
        return $this->belongsTo('App\Municipio');
    }
}
