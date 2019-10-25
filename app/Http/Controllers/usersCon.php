<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usr;
use App\Usr_Rol;
use App\Rol;
use DB;
class usersCon extends Controller
{
    public function show()
    {           $maxr=DB::table('rol')->max('id_rol');

        if (session()->get('user_rol')->first()<=$maxr) {
            $users=DB::table('usr')->join('persona', 'ci_per', 'ci')->join(
            'usr_rol',
            'id_usr',
            'usr_id'
        )->join('rol', 'id_rol', 'rol_id')->select(
            'usr.id_usr',
            'persona.nombre',
            'persona.apepa',
            'persona.apema',
            'usr.login',
            'usr.email',
            'rol.ro'
        )->get();


            return view('admin.tablaUser', compact('users'));
        }
        else
        return redirect('/');
    }

    public function showI(){

        {
            return view('admin.form');
          }
    }

    public function insertar(Request $request){
        $this->validate(
            $request,
            [
                'name' =>'required|string|max:255',
                'last_name'=>'required|string|max:255',
                'last_ape'=>'required|string|max:255',
                'ci'=>'required|digits_between:6,12',
                'email' => 'required|string|email|max:255|unique:usr,email',
                'password' => 'required|string:password_confirmation|min:6|confirmed'
            ]
        );

    }

}
