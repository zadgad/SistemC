<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    protected $table = 'ubicacion';

    public function vehiculos()
    {
        return $this -> belongsToMany(Vehiculos::class);
        //una via pertenece a un solo grupo
    }

    public function registros()
    {
        return $this -> belongsToMany(Vehiculos::class,'registro','id_ubicacion','id_tipo');
        //una via pertenece a un solo grupo
    }

}
