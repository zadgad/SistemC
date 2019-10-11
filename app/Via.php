<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Via extends Model
{
    protected $table = 'via';

    public function vias()
    {
        return $this -> belongsToMany(Ubicacion::class);
        //una via pertenece a un solo grupo
    }
}
