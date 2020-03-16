<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Areas extends Model
{
    protected $table = 'adm_areas';

    protected $primaryKey = 'id';

    protected $fillable = [
    	'cliente_id',
    	'cod_area',
    	'nombre_area'
    ];

    public function area_equipos()
    {
        return $this->hasMany('App\AreaEquipo');
    }
}
