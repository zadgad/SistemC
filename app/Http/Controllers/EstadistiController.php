<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Sesion;
use App\Vehiculo;
use App\Ciudad;
use App\Departamento;
use App\Usr;
use App\Persona;
use App\Usr_Rol;
use App\Rol;
use App\Via;
Use App\Sensor;
use DB;
use App\Simul;
use DateTime;
use App\Ubicacion;

class EstadistiController extends Controller
{

    public function formulario(){
        if(session()->get('id') ?? ''){
            $maxs=Rol::max('id_rol');
            if(session()->get('user_rol')->first()<=$maxs){
                $idus=session()->get('id');
                $datos=DB::table('ubicacion')->join('sensor','id_disp','id_sensor')->join('via','via_id','id_via')->join('ciudad','id_ciudad','ciu')->join('departamento','id_dep','depa')->select('ubicacion.id_ubicacion','ubicacion.activo','ubicacion.foto','sensor.nombre','sensor.estado','ciudad.nombc','via.nomvia','departamento.nomb')->get();
                $sensor=Sensor::all();
                $ciudades=Ciudad::all();
                $depa=Departamento::all();
                $vias=Via::all();
                $ubic=Ubicacion::all();
                $dates=Sensor::join('ubicacion','id_disp','id_sensor')->join('usr','id_usr','usr_id')->join('persona','ci','ci_per')->join('registro','ubicacion.id_ubicacion','id_ubicacion')->join('vehiculo','id_tipo','vehiculo.id_tipo')->join('via','id_via','via_id')->join('ciudad','id_ciudad','ciu')->join('departamento','id_dep','depa')->select('sensor.nombre','departamento.nomb','ciudad.nombc','persona.ci','via.nomvia','via.clacificacion','via.tipo','sensor.estado','ubicacion.activo')->get();
                return view('funciones.formulBu',compact('sensor','ciudades','depa','vias','ubic','dates','datos'));
            }else
            return redirect()->route('login')
            ->with('info');

        }else return redirect()->route('login')
        ->with('info');

    }

    public function insertDate(){
        if(session()->get('id') ?? ''){
            $maxs=Rol::max('id_rol');
            if(session()->get('user_rol')->first()<=$maxs){
                $idus=session()->get('id');
                $simu=Simul::where('usr_id','=',$idus)->select('id_simu','nombsen','dep','ciudad','via','distan','nuncarril','carril','fecha','hora');
                return view('simulador.registerSimu',compact('simu'));
            }else
            return redirect()->route('login')
            ->with('info');

        }else return redirect()->route('login')
        ->with('info');

    }
    public function getTable(){
        if(session()->get('id') ?? ''){
            $maxs=Rol::max('id_rol');
            if(session()->get('user_rol')->first()<=$maxs){
                $idus=session()->get('id');

                $dates=Sensor::join('ubicacion','id_disp','id_sensor')->join('usr','id_usr','usr_id')->join('persona','ci','ci_per')->join('registro','ubicacion.id_ubicacion','id_ubicacion')->join('vehiculo','id_tipo','vehiculo.id_tipo')->join('via','id_via','via_id')->join('ciudad','id_ciudad','ciu')->join('departamento','id_dep','depa')->select('sensor.nombre','ubicacion.activo','departamento.nomb','ciudad.nombc','via.nomvia','via.clacificacion','via.tipo','registro.fecha','registro.hora')->get();
                return view('funciones.recolecDa',compact('dates'));
            }else
            return redirect()->route('login')
            ->with('info');

        }else return redirect()->route('login')
        ->with('info');

    }
    public function aforo(){
        if(session()->get('id') ?? ''){
            $maxs=Rol::max('id_rol');
            if(session()->get('user_rol')->first()<=$maxs){
                $idus=session()->get('id');

                $dates=Sensor::join('ubicacion','id_disp','id_sensor')->join('usr','id_usr','usr_id')->join('persona','ci','ci_per')->join('registro','ubicacion.id_ubicacion','id_ubicacion')->join('vehiculo','id_tipo','vehiculo.id_tipo')->join('via','id_via','via_id')->join('ciudad','id_ciudad','ciu')->join('departamento','id_dep','depa')->select('sensor.nombre','ubicacion.activo','departamento.nomb','ciudad.nombc','via.nomvia','via.clacificacion','via.tipo','registro.fecha','registro.hora')->get();
                return view('funciones.aforo',compact('dates'));
            }else
            return redirect()->route('login')
            ->with('info');

        }else return redirect()->route('login')
        ->with('info');

    }
    public function getlist(){
        if(session()->get('id') ?? ''){
            $maxs=Rol::max('id_rol');
            if(session()->get('user_rol')->first()<=$maxs){
                $idus=session()->get('id');
                $dates=Sensor::join('ubicacion','id_disp','id_sensor')->join('registro','ubicacion.id_ubicacion','id_ubicacion')->join('vehiculo','id_tipo','vehiculo.id_tipo')->join('via','id_via','via_id')->join('ciudad','id_ciudad','ciu')->join('departamento','id_dep','depa')->select('sensor.nombre','departamento.nomb','ciudad.nombc','via.nomvia','via.nuncarril','via.clacificacion','via.tipo','registro.fecha','registro.hora','registro.distan','registro.ejes','vehiculo.nombr_ve')->get();
                return view('regist.registros',compact('dates'));
            }else
            return redirect()->route('login')
            ->with('info');

        }else return redirect()->route('login')
        ->with('info');

    }
    public function graficDate(){
        if(session()->get('id') ?? ''){
            $maxs=Rol::max('id_rol');
            if(session()->get('user_rol')->first()<=$maxs){
                $idus=session()->get('id');
                $simu=Simul::where('usr_id','=',$idus)->select('id_simu','nombsen','dep','ciudad','via','distan','nuncarril','carril','fecha','hora');
                return view('simulador.registerSimu',compact('simu'));
            }else
            return redirect()->route('login')
            ->with('info');

        }else return redirect()->route('login')
        ->with('info');

    }
}
