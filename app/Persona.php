<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = 'persona';
    public function usr()
    {
        return $this -> hasMany(Usr::class, 'ci_per');
        //un grupo puede tener multiples sesiones
    }
    public function persona()
    {
        return $this -> belongsTo(Usr::class,'ci_per','ci');
        //un departamento solo pertenece a una materia
    }
}
