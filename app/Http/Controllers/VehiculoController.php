<?php

namespace App\Http\Controllers;

use App\Vehiculo;
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

class VehiculoController extends Controller
{
    public function show()
    {
        if(session()->get('id') ?? ''){
            $maxs=Rol::max('id_rol');
            if(session()->get('user_rol')->first()<=$maxs){

                $datos=Vehiculo::select('vehiculo.id_tipo','vehiculo.nombr_ve','vehiculo.peso','vehiculo.pesoI','vehiculo.distan_ini','vehiculo.distaci_fin','vehiculo.activo','vehiculo.imagen' )->orderBy('orden') ->get();
                return view('autos.listV',compact('datos'));
            }else
            return redirect()->route('login')
            ->with('info');
        }else return redirect()->route('login')
        ->with('info');
     }
     public function añadir(){

        if(session()->get('id') ?? ''){
            $maxs=Rol::max('id_rol');
            if(session()->get('user_rol')->first()<=$maxs){

                return view('autos.añadir');
            }else
            return redirect()->route('login')
            ->with('info');

        }else return redirect()->route('login')
        ->with('info');


     }
     public function insert(Request $request){
        $this->validate(
            $request,
            [
                'clasi' =>'required|string|max:255',
                'pesoI'=>'required|digits_between:1,3',
                'pesoF'=>'required|digits_between:1,3',
                'distanciaI'=>'required|numeric|min:0.01',
                'distanciaF' => 'required|numeric|min:0.01',
                'estado' => 'required|string|max:25',
                'Foto' => 'image'
            ]
        );

            $nom=$request->input('clasi');
            $pesoI=$request->input('pesoI');
            $pesoF=$request->input('pesoF');
            $distI= $request->input('distanciaI');
            $distF=$request->input('distanciaF');
            $estado=$request->input('estado');
            $ina=request()->except('_token');
            //dd($request->file('Foto'));

            $count=Vehiculo::where('vehiculo.nombr_ve','=',$nom)->where('vehiculo.distan_ini','=',$distI)->where('vehiculo.distaci_fin','=',$distF)->count('vehiculo.nombr_ve');
            $medi=Vehiculo::where('vehiculo.distan_ini','=',$distI)->where('vehiculo.distaci_fin','=',$distF)->count('vehiculo.nombr_ve');
            $maxT=Vehiculo::max('vehiculo.orden');

        if(session()->get('id') ?? ''){
            $maxs=Rol::max('id_rol');
            if(session()->get('user_rol')->first()<=$maxs){
                if (!empty($ina['Foto'])) {
                    //dd($request->file('Foto'));
                    $loca=$ina['Foto']->store('uploads', 'public');
                    if (empty($maxT)) {
                        if ($estado=="Activo") {
                            $pos=1;
                            $ins=Vehiculo::insert(['nombr_ve'=>$nom,'peso'=>$pesoI,'distan_ini'=>$distI,'distaci_fin'=>$distF,'activo'=>1,'pesoI'=>$pesoF,'orden'=>$pos,'imagen'=>$loca]);

                        } else {
                            //                        dd($estado);
                            $ins=Vehiculo::insert(['nombr_ve'=>$nom,'peso'=>$pesoI,'distan_ini'=>$distI,'distaci_fin'=>$distF,'activo'=>0,'pesoI'=>$pesoF,'orden'=>$pos,'imagen'=>$loca]);
                        }
                    } else {
                        $i=0;
                        $array=Vehiculo::select('vehiculo.id_tipo', 'vehiculo.distan_ini', 'vehiculo.distaci_fin','orden')->get();
                        $idmax=Vehiculo::max('id_tipo');
                        if($distI<$array[$i]->distan_ini){
                            $ins=Vehiculo::insert(['nombr_ve'=>$nom,'peso'=>$pesoI,'distan_ini'=>$distI,'distaci_fin'=>$distF,'activo'=>1,'pesoI'=>$pesoF,'orden'=>$i,'imagen'=>$loca]);
                            $a=$idmax;
                            for ($a;$a>$i;$a--) {
                                $ord=Vehiculo::where('vehiculo.orden', '=', $a)->update(['vehiculo.orden'=>$a++]);
                            }
                        }else{
                        while ($i<$idmax+1) {

                            if ( $array[$i]->distan_ini < $distI) {
                                $ins=Vehiculo::insert(['nombr_ve'=>$nom,'peso'=>$pesoI,'distan_ini'=>$distI,'distaci_fin'=>$distF,'activo'=>1,'pesoI'=>$pesoF,'orden'=>$i,'imagen'=>$loca]);
                                $a=$idmax;
                                for($a;$a>$i;$a--){

                                    $ord=Vehiculo::where('vehiculo.orden','=',$a)->update(['vehiculo.orden'=>$a++]);

                                }
                            } else{
                                $i++;
                            }
                        }
                       }
                   }
                }else{

                }
            }else
            return redirect()->route('login')
            ->with('info');

        }else return redirect()->route('login')
        ->with('info');


     }

     public function editv($idV){


     }
     public function datosinsert(Request $request){


     }
}
