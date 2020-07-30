<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Index extends Controller
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
                 $countG=Usr_rol::all()->count('rol_id');

                 return view('superU.inicio',compact('countA','countE','countU','countG'));


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
