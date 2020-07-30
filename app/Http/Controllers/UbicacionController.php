<?php

namespace App\Http\Controllers;

use App\Ubicacion;
use Illuminate\Http\Request;
use app\vehiculos;
use App\Ciudad;
use App\Departamento;
use App\Usr;
use App\Persona;
use App\Usr_Rol;
use App\Rol;
use App\Via;
use App\Sensor;
use DB;
class UbicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\H666ttp\Response
     */
    public function index()
    {
        if(session()->get('id') ?? ''){
            $maxs=Rol::max('id_rol');
            if(session()->get('user_rol')->first()<=$maxs){

                $datos=DB::table('ubicacion')->join('sensor','id_disp','id_sensor')->join('via','via_id','id_via')->join('ciudad','id_ciudad','ciu')->join('departamento','id_dep','depa')->select('ubicacion.id_ubicacion','ubicacion.activo','ubicacion.foto','sensor.nombre','sensor.estado','ciudad.nombc','via.nomvia','departamento.nomb')->get();
              return view('ubication.listU',compact('datos'));
            }else
            return redirect()->route('login')
            ->with('info');

        }else return redirect()->route('login')
        ->with('info');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function show()
    {
        if(session()->get('id') ?? ''){
            $maxs=Rol::max('id_rol');
            if(session()->get('user_rol')->first()<=$maxs){

                $sensor=Sensor::all();
                $vias=via::all();
                $depa=Departamento::all();
                $ciudades=Ciudad::all();
                return view('ubication.añadirUb',compact('sensor','vias','depa','ciudades'));
            }else
            return redirect()->route('login')
            ->with('info');

        }else return redirect()->route('login')
        ->with('info');
    }
    public function fetch(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = DB::table('ciudad')->where($select, $value);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate(
            $request,
            [
                'sen' =>'required|string|max:255',
                'depa'=>'required|integer',
                'ciudad'=>'required|string|max:255',
                'vias' => 'required|string|max:255',
                'dime'=>'required|integer',
                'carri' => 'required|integer',
                'clasi'=>'required|string|max:255',
                'tipo' => 'required|string|max:255',
                'act' => 'required|string|max:255',
                'Foto' => 'image'
            ] );
            $name=$request->input('sen');
            $depa=$request->input('depa');
            $ciu=$request->input('ciudad');
            $vias = $request->input('vias');
            $atc=$request->input('act');
            $dime=$request->input('dime');
            $clasi=$request->input('clasi');
            $carri=$request->input('carri');
            $tipo=$request->input('tipo');
            $ina=request()->except('_token');
                $senm=Sensor::where('sensor.nombre','=',$name)->count('id_sensor');
                $via= via::join('ciudad','id_ciudad','ciu')->where('via.nomvia','=',$vias)->where('ciudad.depa','=',$depa)->count('id_via');
                $ciud= ciudad::where('nombc','=',$ciu)->where('depa','=',$depa)->count('id_ciudad');
                //dd($request->file('Foto'));
               if(session()->get('id') ?? ''){
            $maxs=Rol::max('id_rol');
            $idusr=session()->get('id')->first();
           // dd($idusr);
            if(session()->get('user_rol')->first()<=$maxs){
                if (!empty($ina['Foto'])) {
                    $loca=$ina['Foto']->store('ubicacion','public');
                        if($ciud==0){
                            $aux=ciudad::insert(['nombc'=>$ciu,'depa'=>$depa]);
                            $idc=ciudad::where('nombc','=',$ciu)->where('depa','=',$depa)->pluck('id_ciudad')->first();
                            if($via==0){
                                $inser=Via::insert(['tipo'=>$tipo,'nuncarril'=>$carri,'dimension'=>$dime,'clacificacion'=>$clasi,'nomvia'=>$vias,'ciu'=>$idc]);

                                $idvia=via::join('ciudad','id_ciudad','ciu')->where('via.nomvia','=',$vias)->where('ciudad.depa','=',$depa)->pluck('id_via')->first();
                                if($senm==0){
                                    $insert=Sensor::insert(['estado'=>'Activo','nombre'=>$name,'activo'=>1]);
                                    $idse=Sensor::where('nombre','=',$name)->pluck('id_sensor')->first();
                                    $insU=ubicacion::insert(['activo'=>$atc,'foto'=>$loca,'id_disp'=>$idse,'via_id'=>$idvia,'usr_id'=>$idusr[0]]);

                                    return redirect()->route('listUbication')
                                    ->with('info');
                                }else{
                                    $aux1=Sensor::where('nombre','=',$name)->select('id_sensor','nombre','estado','activo')->get();
                                    foreach ($aux1 as $aut) {
                                        dd('todo esta 5');
                                        if ($aut->estado=='Desactivado'&& $aut->activo==false) {
                                            dd('todo esta 6');
                                            $insU=ubicacion::insert(['activo'=>$atc,'foto'=>$loca,'id_disp'=>$aut->id_sensor,'via_id'=>$idvia,'usr_id'=>$idusr]);

                                            return redirect()->route('listUbication')
                                                        ->with('info');
                                        } else {
                                            return back()->with('Mensaje', 'El Sensor esta regitrado y en funcionamiento');
                                        }
                                    }
                                }
                            }else{
                                $idvia= via::join('ciudad','id_ciudad','ciu')->where('via.nomvia','=',$vias)->where('ciudad.depa','=',$depa)->pluck('id_via')->first();
                                $selcVia=Via::where('id_via','=',$idvia)->select('via.id_via','via.tipo','via.nuncarril','via.dimension','via.clacificacion')->get();
                              foreach($selcVia as $selc){
                                dd('todo esta 8');
                                if($selc->tipo==$tipo && $selc->nuncarril==$carri && $selc->dimension==$dime && $selec->clascificacion==$clasi){
                                    dd('todo esta 9');
                                    if($senm==0){dd('todo esta 10');
                                        $insert=Sensor::insert(['estado'=>'Activo','nombre'=>$name,'activo'=>1]);
                                        $idse=Sensor::where('nombre','=',$name)->pluck('id_sensor')->first();
                                        $insU=ubicacion::insert(['activo'=>$atc,'foto'=>$loca,'id_disp'=>$idse,'via_id'=>$idvia,'usr_id'=>$idusr]);

                                        return redirect()->route('listUbication')
                                        ->with('info');
                                    }else{
                                        $viaI=Via::where('via.id_via','=',$idvia)->update(['tipo'=>$tipo,'nuncarril'=>$carri,'dimension'=>$dime,'clacificacion'=>$clasi]);
                                        $aux1=Sensor::where('nombre','=',$name)->select('id_sensor','nombre','estado','activo')->get();
                                        foreach ($aux1 as $aut) {dd('todo esta 12');
                                            if ($aut->estado=='Desactivado'&& $aut->activo==false) {dd('todo esta 13');
                                                $insU=ubicacion::insert(['activo'=>$atc,'foto'=>$loca,'id_disp'=>$aut->id_sensor,'via_id'=>$idvia,'usr_id'=>$idusr]);

                                                return redirect()->route('listUbication')
                                                ->with('info');
                                            } else {
                                                return back()->with('Mensaje', 'El Sensor esta regitrado y en funcionamiento');
                                            }
                                        }
                                    }

                                }  else {
                                    $updV=Via::where('id_via','=',$selc->id_via)->update(['tipo'=>$tipo,'nuncarril'=>$carri,'dimension'=>$dime,'clacificacion'=>$clasi]);
                                    if($senm==0){dd('todo esta 15');
                                        $insert=Sensor::insert(['estado'=>'Activo','nombre'=>$name,'activo'=>1]);
                                        $idse=Sensor::where('nombre','=',$name)->pluck('id_sensor')->first();
                                        $insU=ubicacion::insert(['activo'=>$atc,'foto'=>$loca,'id_disp'=>$idse,'via_id'=>$idvia,'usr_id'=>$idusr[0]]);

                                        return redirect()->route('listUbication')
                                        ->with('info');
                                    }else{
                                        $aux1=Sensor::where('nombre','=',$name)->select('id_sensor','nombre','estado','activo')->get();
                                        foreach ($aux1 as $aut) {dd('todo esta 17');
                                            if ($aut->estado=='Desactivado'&& $aut->activo==false) {dd('todo esta 18');
                                                $insU=ubicacion::insert(['activo'=>$atc,'foto'=>$loca,'id_disp'=>$aut->id_sensor,'via_id'=>$idvia,'usr_id'=>$idusr]);

                                                return redirect()->route('listUbication')
                                                ->with('info');
                                            } else {
                                                return back()->with('Mensaje', 'El Sensor esta regitrado y en funcionamiento');
                                            }
                                        }
                                    }

                                }
                                }
                            }
                        }else{
                            $idc=ciudad::where('nombc','=',$ciu)->where('depa','=',$depa)->pluck('id_ciudad')->first();
                            if($via==0){
                                $inser=Via::insert(['tipo'=>$tipo,'nuncarril'=>$carri,'dimension'=>$dime,'clacificacion'=>$clasi,'nomvia'=>$vias,'ciu'=>$idc]);

                                $idvia=via::join('ciudad','id_ciudad','ciu')->where('via.nomvia','=',$vias)->where('ciudad.depa','=',$depa)->pluck('id_via')->first();
                                if($senm==0){
                                    $insert=Sensor::insert(['estado'=>'Activo','nombre'=>$name,'activo'=>1]);
                                    $idse=Sensor::where('nombre','=',$name)->pluck('id_sensor')->first();
                                    $insU=ubicacion::insert(['activo'=>$atc,'foto'=>$loca,'id_disp'=>$idse,'via_id'=>$idvia,'usr_id'=>$idusr]);

                                    return redirect()->route('listUbication')
                                    ->with('info');
                                }else{
                                    $aux1=Sensor::where('nombre','=',$name)->select('id_sensor','nombre','estado','activo')->get();
                                    foreach ($aux1 as $aut) {
                                            dd($aux1);
                                        if ($aut->estado=='Desactivado'&& $aut->activo==false) {dd('todo esta 24');
                                            $insU=ubicacion::insert(['activo'=>$atc,'foto'=>$loca,'id_disp'=>$aut->id_sensor,'via_id'=>$idvia,'usr_id'=>$idusr]);
                                            return redirect()->route('listUbication')
                                                        ->with('info');
                                        } else {
                                            return back()->with('Mensaje', 'El Sensor esta regitrado y en funcionamiento');
                                        }
                                    }
                                }
                            }else{
                                $idvia= via::join('ciudad','id_ciudad','ciu')->where('via.nomvia','=',$vias)->where('ciudad.depa','=',$depa)->pluck('id_via')->first();
                                if($senm==0){
                                    $insert=Sensor::insert(['estado'=>'Activo','nombre'=>$name,'activo'=>1]);
                                    $idse=Sensor::where('nombre','=',$name)->pluck('id_sensor')->first();
                                    $insU=ubicacion::insert(['activo'=>$atc,'foto'=>$loca,'id_disp'=>$idse,'via_id'=>$idvia,'usr_id'=>$idusr]);

                                    return redirect()->route('listUbication')
                                    ->with('info');
                                }else{

                                    $aux1=Sensor::where('nombre','=',$name)->select('id_sensor','nombre','estado','activo')->get();
                                    foreach ($aux1 as $aut) {
                                        if ($aut->estado=='Desactivado'&& $aut->activo==false) {dd('todo esta 29');
                                            $insU=ubicacion::insert(['activo'=>$atc,'foto'=>$loca,'id_disp'=>$aut->id_sensor,'via_id'=>$idvia,'usr_id'=>$idusr]);

                                            return redirect()->route('listUbication')
                                                        ->with('info');

                                        } else {
                                            return back()->with('Mensaje', 'El Sensor esta regitrado y en funcionamiento');
                                        }
                                    }
                                }
                            }
                        }
                    }

            }else
            return redirect()->route('login')
            ->with('info');

        }else return redirect()->route('login')
        ->with('info');
    }
    public function edit($id)
    {
        if(session()->get('id') ?? ''){
            $maxs=Rol::max('id_rol');
            if(session()->get('user_rol')->first()<=$maxs){
                $sensor=Sensor::all();
                $vias=via::all();
                $depa=Departamento::all();
                $ciudades=Ciudad::all();
                $idUbic=$id;
                $array=DB::table('ubicacion')->join('sensor','id_sensor','id_disp')->join('via','id_via','via_id')->join('ciudad','id_ciudad','ciu')->join('departamento','id_dep','depa')->where('ubicacion.id_ubicacion','=',$idUbic)
                ->where('ubicacion.activo','=','Habilitado')->select('ubicacion.id_ubicacion','ubicacion.id_disp','ubicacion.via_id','ubicacion.activo','ubicacion.foto','sensor.nombre','sensor.estado','via.tipo','via.nuncarril','via.dimension','via.clacificacion','via.nomvia','ciudad.nombc','departamento.nomb')->first();

                return view('ubication.editarU',compact('array','sensor','vias','depa','ciudades'));
            }else
            return redirect()->route('login')
            ->with('info');

        }else return redirect()->route('login')
        ->with('info');

    }

    public function store(Request $request,$id)
    {
        $this->validate(
            $request,
            [
                'sen' =>'required|string|max:255',
                'depa'=>'required|integer',
                'ciudad'=>'required|string|max:255',
                'vias' => 'required|string|max:255',
                'dime'=>'required|integer',
                'carri' => 'required|integer',
                'clasi'=>'required|string|max:255',
                'tipo' => 'required|string|max:255',
                'act' => 'required|string|max:255',
                'Foto' => 'image'
            ] );
            dd($request);
            $name=$request->input('sen');
            $depa=$request->input('depa');
            $ciu=$request->input('ciudad');
            $vias = $request->input('vias');
            $atc=$request->input('act');
            $dime=$request->input('dime');
            $clasi=$request->input('clasi');
            $carri=$request->input('carri');
            $tipo=$request->input('tipo');
            $ina=request()->except('_token');
        if(session()->get('id') ?? ''){
            $maxs=Rol::max('id_rol');
            if(session()->get('user_rol')->first()<=$maxs){


            }else
            return redirect()->route('login')
            ->with('info');

        }else return redirect()->route('login')
        ->with('info');

    }

    public function update(Request $request, ubicacion $ubicacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ubicacion  $ubicacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(ubicacion $ubicacion)
    {
        //
    }
}
