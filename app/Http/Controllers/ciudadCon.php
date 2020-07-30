<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ciudad;
use App\Rol;
use App\Usr;
use App\Departamento;
use App\Persona;
use DB;
class ciudadCon extends Controller
{

    public function show()
   {
        if(session()->get('id') ?? ''){
            $maxs=Rol::max('id_rol');
                if(session()->get('user_rol')->first()<=$maxs){

                    $ciu=DB::table('ciudad')->join('departamento','id_dep','depa')->select('ciudad.id_ciudad','ciudad.nombc','departamento.nomb')->get();

                    return view('admin.ciudade',compact('ciu'));

                }else
                    return redirect()->route('login')
                        ->with('info');

         }else return redirect()->route('login')->with('info');

    }
    public function añadCiu(){

        if(session()->get('id') ?? ''){
            $maxs=Rol::max('id_rol');
            if(session()->get('user_rol')->first()<=$maxs){

                $dep=DB::table('departamento')->select('id_dep','nomb')->get();

                return view('admin.añadciu',compact('dep'));

            }else
            return redirect()->route('login')
            ->with('info');

        }else return redirect()->route('login')
        ->with('info');

    }
    public function editC($id){

        $ciu=$id;
        $dep=DB::table('departamento')->select('nomb')->get();
        $datos=DB::table('ciudad')->join('departamento','id_dep','depa')->where('ciudad.id_ciudad','=',$ciu)->select('ciudad.id_ciudad','ciudad.nombc','departamento.nomb')->first();
        return view('admin.edictCiu',compact('datos','dep'));
    }
    public function ciudEdit(Request $request,$idc){
        $this->validate(
            $request,
            [
                'ciudad' =>'required|string|max:255',
                'dep'=>'required|string|max:255',
            ]
        );
        $idd=$idc;
        $ciu=$request->input('ciudad');
        $depa=$request->input('dep');
        $idp=Departamento::where('departamento.nomb','=',$depa)->pluck('id_dep')->first();
        $ins=Ciudad::where('ciudad.nombc','=',$ciu)->where('ciudad.depa','=',$idp)->count('ciudad.nombc');

        if(session()->get('id') ?? ''){
            $maxs=Rol::max('id_rol');
            if(session()->get('user_rol')->first()<=$maxs){

                if($ins==0){

                    $up=DB::table('ciudad')->where('ciudad.id_ciudad','=',$idd)->update(['nombc'=>$ciu,'depa'=>$idp]);
                    return back()->with('Mensaje', 'La informacion se actualizo correctamente');

                }else{
                    return back()->with('Mensaje', 'La ciudad ya existe');

                }

            }else
            return redirect()->route('login')
            ->with('info');

        }else return redirect()->route('login')
        ->with('info');



    }

}
