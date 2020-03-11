<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    //

    protected $table = 'adm_empresa';

    protected $primaryKey = 'id_empresa';

    protected $fillable = ['cod_empresa', 'nit_empresa', 'nom_empresa', 'dir_empresa', 'tel_empresa', 'cel_empresa', 'mail', 'logo'];

    public function municipio()
    {
        return $this->belongsTo('App\Municipio');
    }
}
