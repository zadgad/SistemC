<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{

    protected $table = 'departamento';

    public function ciudad()
    {
        return $this -> hasMany(Ciudad::class,'depa');
        //un departamento solo pertenece a una materia
    }
    public function departamento()
    {
        return $this -> hasMany(Ciudad::class,'depa','id_ciudad');
        //un departamento solo pertenece a una materia
    }
}
