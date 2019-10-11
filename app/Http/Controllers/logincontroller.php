<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use App\Usr;
use App\Usr_Rol;
use DB;
use \Carbon\Carbon;
use Symfony\Component\Console\Helper\Table;

class logincontroller extends Controller
{
  public function viewlogin(){
    return view('auth/login');
  }
public function login(Request $request){


    $logEmail=$request->input('email');
    $password=$request->input('password');
    $validado=false;

    $logs=DB::table('usr')->where('usr.login','=', $logEmail)->count();
    $pass=DB::table('usr')->where('usr.password','=',$password)->count();

    $now=Carbon::now();
    $now->format('Y-m-d H:i:s');

    $foundclient=DB::table('usr')->where(['login' => $logEmail,'password' => $password])->get()->first();


    $id=DB::table('usr')->where('usr.login','=',$logEmail)->pluck('id_usr');

    $drol=DB::table('usr_rol')->join('usr','id_usr','usr_id')->where('usr.login','=',$logEmail)->pluck('rol_id');

    if($foundclient){

        // $idus=$foundclient->$id;
        $datos=DB::table('usr')->join('persona', 'ci_per', 'ci')->join('usr_rol', 'id_usr', 'usr_id')->join('rol', 'id_rol', 'rol_id')->where('usr.id_usr', '=', $id)->select('usr.id_usr', 'rol.ro', 'persona.nombre', 'persona.apepa', 'apema')->get();
        $rol=DB::table('rol')->where('id_rol', '=', $drol)->pluck('ro');
        $nomb=DB::table('persona')->join('usr', 'ci_per', 'ci')->where('usr.id_usr', '=', $id)->pluck('persona.nombre');
        $email=DB::table('usr')->join('usr_rol', 'id_usr', 'usr_id')->where('usr.id_usr', '=', $id)->pluck('usr.email');

        $request->session()->put('rol',$rol);
        $request->session()->put('nombre',$nomb);
        $request->session()->put('email',$email);

         $sesion=DB::table('sesion')->insert( [ 'activo'=>true, 'pid'=>$nomb[0],'usr_id'=>$id[0]] );

        $maxr=DB::table('rol')->max('id_rol');


        if($drol[0]<=$maxr){

            return redirect()->route('home');
        }
    }else return redirect()->route('login')
    ->with('info');
    // if($logs=1&&$pass=1){
    // } else
    //  switch ($rol) {
    //     case 'super':
    //       return redirect('home');
    //       break;
    //     case 'admin':
    //       return redirect('home');
    //       break;
    //     case 'empleado':
    //       return redirect('home');
    //       break;
    //     case 'usuario':

    //       return redirect('home');
    //       break;
    //     default:
    //       return view('auth/login');//return response()->json(['data'=>'Rol extraño']);
    //       break;
    //}

        }

}


