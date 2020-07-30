<?php

namespace App\Http\Controllers;

use App\Sensor;
use Illuminate\Http\Request;
use vehiculos;
use App\Ciudad;
use App\Departamento;
use App\Usr;
use App\Persona;
use App\Usr_Rol;
use App\Rol;
use App\Via;
use DB;
class SensorController extends Controller
{ public function show()
    {
        if(session()->get('id') ?? ''){
            $maxs=Rol::max('id_rol');
            if(session()->get('user_rol')->first()<=$maxs){

                $ins=Sensor::select('sensor.id_sensor','sensor.nombre','sensor.estado','sensor.activo')->get();

                return view('sensores.listS',compact('ins'));

            }else
            return redirect()->route('login')
            ->with('info');

        }else return redirect()->route('login')
        ->with('info');

     }
     public function añadirS(){

        if(session()->get('id') ?? ''){
            $maxs=Rol::max('id_rol');
            if(session()->get('user_rol')->first()<=$maxs){

                return view('sensores.añadirS');

            }else
            return redirect()->route('login')
            ->with('info');

        }else return redirect()->route('login')
        ->with('info');

     }
     public function inserts(Request $request)
     {


        $this->validate(
            $request,
            [
                'nomb' =>'required|string|max:255|unique:sensor,nombre',
                'estado'=>'required|string|max:255',
                'act'=>'required|string|max:255'
            ]);

            $name=$request->input('nomb');
            $estado=$request->input('estado');
            $activo=$request->input('act');

        if(session()->get('id') ?? ''){
            $maxs=Rol::max('id_rol');
            if(session()->get('user_rol')->first()<=$maxs){

                if($activo=='Habilitado'){
                    if($estado=='Reparacion'||$estado=='Pausado'||$estado=='Activo'){
                        $insert=Sensor::insert(['estado'=>$estado,'nombre'=>$name,'activo'=>1]);
                        return redirect()->route('list_senores')
                        ->with('info');
                    }else{
                        $insert=Sensor::insert(['estado'=>$estado,'nombre'=>$name,'activo'=>0]);
                        return redirect()->route('list_senores')
                        ->with('info');
                    }

                }

                if($activo=='Deshabilitado'){


                    if($estado=='Reparacion'||$estado=='Pausado'||$estado=='Activo'||$estado=='Desactivado'){
                        $aux="Desactivado";
                        $insert=Sensor::insert(['estado'=>$aux,'nombre'=>$name,'activo'=>0]);
                        return redirect()->route('list_senores')
                        ->with('info');
                    }
                }

            }else
            return redirect()->route('login')
            ->with('info');

        }else return redirect()->route('login')
        ->with('info');


     }
     public function editar($id)
     { $idr=$id;
        if(session()->get('id') ?? ''){
            $maxs=Rol::max('id_rol');
            if(session()->get('user_rol')->first()<=$maxs){

                $ins=DB::table('sensor')->where('sensor.id_sensor','=',$idr)->select('sensor.nombre','sensor.id_sensor','sensor.estado','sensor.activo')->first();
              return view('sensores.editSe',compact('ins'));
            }else
            return redirect()->route('login')
            ->with('info');

        }else return redirect()->route('login')
        ->with('info');

     }
     public function editinser(Request $request, $id)
     {
        $idr=$id;
        $this->validate(
            $request,
            [
                'nomb' =>'required|string|max:255',
                'estado'=>'required|string|max:255',
                'act'=>'required|string|max:255'
            ]);
            $name=$request->input('nomb');
            $estado=$request->input('estado');
            $activo=$request->input('act');
            $nomb=DB::table('sensor')->where('id_sensor','=',$idr)->pluck('sensor.nombre')->first();
            $count=Sensor::where('nombre','=',$name)->count('sensor.nombre');
        if(session()->get('id') ?? ''){
            $maxs=Rol::max('id_rol');
            if(session()->get('user_rol')->first()<=$maxs){

                if($name==$nomb){

                    if($activo=='Habilitado'){
                        if($estado=='Reparacion'||$estado=='Pausado'||$estado=='Activo'){
                            $insert=Sensor::where('sensor.id_sensor','=',$idr)->update(['estado'=>$estado,'nombre'=>$name,'activo'=>1]);
                            return redirect()->route('list_senores')
                            ->with('info');
                        }else{
                            $insert=Sensor::where('sensor.id_sensor', '=', $idr)->update(['estado'=>$estado,'nombre'=>$name,'activo'=>0]);
                            return redirect()->route('list_senores')
                            ->with('info');
                        }
                    }else{

                        if($count==1){
                            return back()->with('Mensaje', 'El nombre del sensor ya existe');

                        }else{

                if($activo=='Habilitado'){
                    if($estado=='Reparacion'||$estado=='Pausado'||$estado=='Activo'){
                        $insert=Sensor::where('sensor.id_sensor','=',$idr)->update(['estado'=>$estado,'nombre'=>$name,'activo'=>1]);
                        return redirect()->route('list_senores')
                        ->with('info');
                    }else{
                        $insert=Sensor::where('sensor.id_sensor','=',$idr)->update(['estado'=>$estado,'nombre'=>$name,'activo'=>0]);
                        return redirect()->route('list_senores')
                        ->with('info');
                    }

                        }
                }


        }  }else
        return redirect()->route('login')
        ->with('info');

        }else return redirect()->route('login')
        ->with('info');

        }
    }
}
