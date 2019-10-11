<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    protected $table = 'sensor';

    public function ubicacion()
    {
        return $this -> hasMany(Ubicacion::class, 'id_ubicacion');
        //un grupo puede tener multiples sesiones
    }
    public function sensor()
    {
        return $this -> belongsTo(Ubicacion::class,'id_disp','id_sensor');
        //un departamento solo pertenece a una materia
    }
    public function usuarios()
    {
        return $this -> belongsToMany(Usr::class);
        //una via pertenece a un solo grupo
    }
    public function user()
    {
        return $this -> belongsToMany(Usr::class,'ubicacion','id_sensor','id_usr');
        //una via pertenece a un solo grupo
    }
    public function vias()
    {
        return $this -> belongsToMany(Via::class,'ubicacion','id_sensor','id_avenida');
        //una via pertenece a un solo grupo
    }
    public function empleados()
    {
        return $this->belongsToMany(Usr::class,'ubicacion')->withPivot('id_ubicacion','id_disp', 'via_id')->withTimestamps();
    }
    public function direccion()
    {
        return $this->belongsToMany(Via::class,'ubicacion')->withPivot('id_ubicacion','id_disp', 'via_id')->withTimestamps();
    }
}
