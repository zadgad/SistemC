<?php

namespace App\Http\Controllers;

use App\Via;
use Illuminate\Http\Request;
use vehiculos;
use App\Ciudad;
use App\Departamento;
use App\Usr;
use App\Persona;
use App\Usr_Rol;
use App\Rol;
use DB;
use PhpOption\Option;

class ViaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *//*
    public function index()
    {

if(session()->get('id') ?? ''){
    $maxs=Rol::max('id_rol');
    if(session()->get('user_rol')->first()<=$maxs){
        $vias=DB::table('via')->join('ciudad','id_ciudad','ciu')->join('departamento','depa','id_dep')->select('via.id_via','via.tipo','via.nuncarril','via.dimension','via.clasificacion','via.nomvia','ciudad.nombc','departamento.nomb')->get();
        $ciud=Ciudad::select('ciudad.nombc')->get();
        $dep=Departamento::select('departamento.id_dep','departamento.nomb')->get();

        return view('vias.añadirVia',compact('vias','ciud','dep'));

    }else
    return redirect()->route('login')
    ->with('info');

}else return redirect()->route('login')
->with('info');
    } */

    public function show()
    {
      if(session()->get('id') ?? ''){
        $maxs=Rol::max('id_rol');
        if(session()->get('user_rol')->first()<=$maxs){

            $vias=DB::table('via')->join('ciudad','id_ciudad','ciu')->join('departamento','depa','id_dep')->select('via.id_via','via.tipo','via.nuncarril','via.dimension','via.clacificacion','via.nomvia','ciudad.nombc','departamento.nomb')->get();

          return view('vias.listvia',compact('vias'));

        }else
        return redirect()->route('login')
        ->with('info');

    }else return redirect()->route('login')
    ->with('info');

     }

    public function añadirVia(){

        if(session()->get('id') ?? ''){
            $maxs=Rol::max('id_rol');
            if(session()->get('user_rol')->first()<=$maxs){
                $ciud=Ciudad::select('ciudad.nombc')->get();
                $dep=Departamento::select('departamento.id_dep','departamento.nomb')->get();
                return view('vias.añadirVia',compact('ciud','dep'));


            }else
            return redirect()->route('login')
            ->with('info');

        }else return redirect()->route('login')
        ->with('info');

    }
    public function insertVia(Request $request){

        $this->validate(
            $request,
            [
                'nomV'=>'required|string|max:255',
                'depa'=>'required|integer',
                'ciudad'=>'required|string|max:255',
                'dime'=>'required|integer',
                'carri' => 'required|integer',
                'clasi'=>'required|string|max:255',
                'tipo' => 'required|string|max:255'

                ] );

                $nonv=$request->input('nomV');
                $dep=$request->input('depa');
                $ciudad=$request->input('ciudad');
                //$ci = $request->input('ci');
                $dime=$request->input('dime');
                $carri=$request->input('carri');

                $clasi=$request->input('clasi');
                $tipo=$request->input('tipo');
                $count=Departamento::where('departamento.id_dep','=',$dep)->count('departamento.nomb');
                $countc=Ciudad::where('ciudad.nombc','=',$ciudad)->count('ciudad.nombc');
                $exist=DB::table('via')->join('ciudad','id_ciudad','ciu')->join('departamento','id_dep','depa')->where('ciudad.nombc','=',$ciudad)->where('departamento.id_dep','=',$dep)->where('via.nomvia','=',$nonv)->count('via.nomvia');
                //dd($dep);
                if($exist==1){

                    return back()->with('Mensaje', 'La via ya fue registrado');


                }else{

                    if($count==1){
                        if($countc==1){
                            $idV=Ciudad::where('ciudad.nombc','=',$ciudad)->pluck('id_ciudad')->first();
                            //dd($idV);

                            $insertVia=DB::table('via')->insert(['tipo'=>$tipo,'nuncarril'=>$carri,'dimension'=>$dime,'clacificacion'=>$clasi,'nomvia'=>$nonv,'ciu'=>$idV]);

                            return redirect()->route('list_vias')
                            ->with('info');
                        }else{
                            $idDep=Departamento::where('departamento.id_dep','=',$dep)->pluck('departamento.id_dep')->first();
                            $idV=Ciudad::where('ciudad.nombc','=',$ciudad)->pluck('id_ciudad')->first();

                            $insertVia=DB::table('via')->insert(['tipo'=>$tipo,'nuncarril'=>$carri,'dimension'=>$dime,'clacificacion'=>$clasi,'nomvia'=>$nonv,'ciu'=>$idV]);

                            return redirect()->route('list_vias')
                            ->with('info');
                        }

                    }else{

                        return back()->with('Mensaje', 'El departamento no existe');
                    }
                }
    }
    public function fetch(Request $request){
        $select=$request->get('select');
        $value=$request->get('value');
        $dependent=$request->get('dependent');
        $data=DB::table('ciudad')->where($select, $value)
                                 ->gruopBy($dependent)->get();
        $output='<option value="">Select '.ucfirst($dependent).'</option>';
        foreach($data as $row){
            $output.='<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
        }
        echo $output;
    }
    public function editV(Request $request, $idV){

            if(session()->get('id') ?? ''){
            $maxs=Rol::max('id_rol');
            if(session()->get('user_rol')->first()<=$maxs){

                $idVa=$idV;
                $via=DB::table('via')->join('ciudad','id_ciudad','ciu')->join('departamento','id_dep','depa')->where('via.id_via','=',$idVa)->select('via.id_via','via.nomvia','departamento.nomb','ciudad.nombc','via.dimension','via.clacificacion','via.tipo','via.nuncarril')->get()->first();
                //dd($via);
                $ciud=Ciudad::select('ciudad.nombc')->get();
                $dep=Departamento::select('departamento.id_dep','departamento.nomb')->get();

                return view('vias.editVia',compact('via','ciud','dep'))
                ->with('info');
            }else
            return redirect()->route('login')
            ->with('info');

        }else return redirect()->route('login')
            ->with('info');

    }

    public function editarVia(Request $request, $idvia){
        $this->validate(
            $request,
            [
                'nomV'=>'required|string|max:255',
                'dep'=>'required|string|max:255',
                'ciudad'=>'required|string|max:255',
                'dime'=>'required|integer',
                'carri' => 'required|integer',
                'clasi'=>'required|string|max:255',
                'tipo' => 'required|string|max:255'

                ] );
                $idvi=$idvia;
                $nonv=$request->input('nomV');
                $dep=$request->input('dep');
                $ciudad=$request->input('ciudad');
                //$ci = $request->input('ci');
                $dime=$request->input('dime');
                $carri=$request->input('carri');
                $clasi=$request->input('clasi');
                $tipo=$request->input('tipo');
                $count=Departamento::where('departamento.nomb','=',$dep)->count('departamento.nomb');
                $countc=Ciudad::where('ciudad.nombc','=',$ciudad)->count('ciudad.nombc');
                $exist=DB::table('via')->join('ciudad','id_ciudad','ciu')->join('departamento','id_dep','depa')->where('ciudad.nombc','=',$ciudad)->where('departamento.nomb','=',$dep)->where('via.nomvia','=',$nonv)->count('via.nomvia');
                $datos=DB::table('via')->join('ciudad','id_ciudad','ciu')->join('departamento','id_dep','depa')->where('via.id_via','=',$idvi)->select('ciudad.nombc','departamento.nomb')->get()->first();
                //dd($dep);
                if(session()->get('id') ?? ''){
                    $maxs=Rol::max('id_rol');
                    if(session()->get('user_rol')->first()<=$maxs){
                        $existe=DB::table('via')->join('ciudad','id_ciudad','ciu')->join('departamento','id_dep','depa')
                        ->where('ciudad.nombc','=',$ciudad)->where('departamento.nomb','=',$dep)->where('via.nomvia','=',$nonv)
                        ->where('via.dimension','=',$dime)->where('via.tipo','=',$tipo)->where('via.clacificacion','=',$clasi)
                        ->where('via.nuncarril','=',$carri)->count('via.nomvia');
                        //dd($existe);
                        if($existe==1){
                            return back()->with('Mensaje', 'no se ingresaron datos');
                        }else{
                            if($count==1){
                                if($datos->nomb==$dep){
                                    if($countc==1){
                                        if($exist==1){
                                            $viaI=Via::where('via.id_via','=',$idvi)->update(['tipo'=>$tipo,'nuncarril'=>$carri,'dimension'=>$dime,'clacificacion'=>$clasi]);
                                            return back()->with('Mensaje', 'La Informacion fue actualizado');
                                        }else{
                                            $ciu=Ciudad::where('ciudad.nombc','=',$ciudad)->pluck('ciudad.id_ciudad')->first();
                                            $viaI=Via::where('via.id_via','=',$idvi)->update(['nomvia'=>$nonv,'tipo'=>$tipo,'nuncarril'=>$carri,'dimension'=>$dime,'clacificacion'=>$clasi,'ciu'=>$ciu]);
                                            return back()->with('Mensaje', 'La Informacion fue actualizado');
                                        }
                                    }else{
                                        $idepa=Departamento::where('departamento.nomb','=',$dep)->pluck('departamento.id_dep');
                                        $depins=Ciudad::insert(['nombc'=>$ciudad,'depa'=>$idepa[0]]);
                                        $idciu=Ciudad::where('ciudad.nombc','=',$ciudad)->where('departamento.nomb','=',$dep)->pluck('ciudad.id_ciudad');
                                        $viaI=Via::where('via.id_via','=',$idvi)->update(['nomvia'=>$nonv,'tipo'=>$tipo,'nuncarril'=>$carri,'dimension'=>$dime,'clacificacion'=>$clasi,'ciu'=>$idciu[0]]);
                                        return back()->with('Mensaje', 'La Informacion fue actualizado');
                                    }
                                }else{
                                    $aux=DB::table('ciudad')->join('departamento','id_dep','depa')->where('ciudad.nombc','=',$ciudad)->where('departamento.nomb','=',$dep)->count('ciudad.nombc');
                                    if($aux<1){
                                        //$auxc=Ciudad::where('ciudad.nombc','=',$ciudad)->pluck('ciudad.id_ciudad')->first();
                                        $auxd=Departamento::where('departamento.nomb','=',$dep)->pluck('departamento.id_dep')->first();
                                        $i=Ciudad::insert(['nombc'=>$ciudad,'depa'=>$auxd]);
                                        $auxid=DB::table('ciudad')->where('ciudad.nombc','=',$ciudad)->where('ciudad.depa','=',$auxd)->pluck('ciudad.id_ciudad')->first();
                                       // dd($auxid);
                                        $viaI=Via::where('via.id_via','=',$idvi)->update(['nomvia'=>$nonv,'tipo'=>$tipo,'nuncarril'=>$carri,'dimension'=>$dime,'clacificacion'=>$clasi,'ciu'=>$auxid]);
                                        return back()->with('Mensaje', 'La Informacion fue actualizado');

                                    }

                                }
                            }else{
                                return back()->with('Mensaje', 'El departamento no existe');
                            }
                        }
                    }else
                    return redirect()->route('login')
                    ->with('info');
                }else return redirect()->route('login')
                ->with('info');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listvia(){


    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\via  $via
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\via  $via
     * @return \Illuminate\Http\Response
     */
    public function edit(via $via)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\via  $via
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, via $via)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\via  $via
     * @return \Illuminate\Http\Response
     */
    public function destroy(via $via)
    {
        //
    }
}
