<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    protected $table = 'vehiculo';

    public function via()
    {
        return $this -> hasMany(Via::class);
        //un grupo puede tener multiples sesiones
    }

}
