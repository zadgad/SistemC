<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usr extends Model
{
    protected $table = 'usr';

    public function roles()
    {
        return $this -> belongsToMany(Rol::class);
        //una via pertenece a un solo grupo
    }
    public function rols()
    {
        return $this -> belongsToMany(Rol::class,'usr_rol','id_usr','id_rol');
        //una via pertenece a un solo grupo
    }
}
