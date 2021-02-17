<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rol;
use DB;
use App\Usr;
use App\Persona;
use App\Usr_rol;
use App\Vehiculo;
use App\Sesion;
class index extends Controller
{

    public function Index()
   {

            if(session()->get('user_rol') ?? ''){
              if(session()->get('user_rol')->first()<=$maxr=DB::table('rol')->max('id_rol')){
               session()->flush();
               return view('categoria.index');

             }else
             return view('categoria.index');
            }else return view('categoria.index');
    }
    public function user(){

        if(session()->get('id') ?? ''){
            $maxs=Rol::max('id_rol');
            if(session()->get('user_rol')->first()<=$maxs){

                $countA=Usr_rol::where('usr_rol.rol_id','=',2)->count('rol_id');
                $countE=Usr_rol::where('usr_rol.rol_id','=',3)->count('rol_id');
                $countU=Usr_rol::where('usr_rol.rol_id','=',4)->count('rol_id');
                $countG=Usr_rol::count('rol_id');
                $count=$countG-1;
                $session=DB::table('sesion')->join('usr','id_usr','usr_id')->where('usr.id_usr','!=',2)->select('sesion.activo','sesion.pid','sesion.hora_conect','sesion.hora_disconect','usr.foto')-> paginate(10);
                $rol=DB::table('rol')->select('id_rol')->get();
                return view('superU.inicio',compact('countA','countE','countU','count','rol','session'));


            }else
            return redirect()->route('login')
            ->with('info');

        }else return redirect()->route('login')
        ->with('info');

    }
    public function usuario()
    {
        if(session()->get('id') ?? ''){
            $maxs=Rol::max('id_rol');
            if(session()->get('user_rol')->first()<=$maxs){
                $vehs=DB::table('vehiculo')->select('nombr_ve','peso','pesoI','distan_ini','distan_ini','distaci_fin','imagen')->get();

                $rol=DB::table('rol')->select('id_rol')->get();
                return view('users.index',compact('rol','vehs'));


            }else
            return redirect()->route('login')
            ->with('info');

        }else return redirect()->route('login')
        ->with('info');
    }
    public function loading(){
        if(session()->get('id') ?? ''){
            $maxs=Rol::max('id_rol');
            if(session()->get('user_rol')->first()<=$maxs){
                return view('categoria.loading');

            }else
            return redirect()->route('login')
            ->with('info');

        }else return redirect()->route('login')
        ->with('info');
    }
}

