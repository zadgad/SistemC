<?php

namespace App\Http\Controllers;
use App\Sesion;
use Illuminate\Http\Request;
use App\Vehiculo;
use App\Ciudad;
use App\Departamento;
use App\Usr;
use App\Persona;
use App\Usr_Rol;
use App\Rol;
use App\Via;
use DB;
use App\Simul;
use DateTime;

class procesos extends Controller
{
    public function ubicacion(){
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
    public function formulario(){
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
    public function tablasTdm(){
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
    public function recoleccion(){
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
