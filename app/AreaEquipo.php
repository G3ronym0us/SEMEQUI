<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AreaEquipo extends Model
{
    protected $table = 'rel_area_equipo';

    protected $primaryKey = 'id';

    protected $fillable = [
    	'area_id',
    	'equipo_id'
    ];
}
