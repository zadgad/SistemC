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

class Simulador extends Controller
{
    public function showFor(){
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
                return view('simulador.formulario',compact('idus'));
            }else
            return redirect()->route('login')
            ->with('info');

        }else return redirect()->route('login')
        ->with('info');

    }
    public function insert(Request $request,$idus)
    {   $id=$idus;
        $this->borrarsimulador($id);
        $this->validate(
            $request,
            [
                'numiter' =>'required|integer',
                'clasi'=>'required|string|max:255',
                'tipo'=>'required|string|max:255',
                'from'=>'required|date',
                'to'=>'required|date'

            ]);
            $numiter=$request->input('numiter');
            $clasi=$request->input('clasi');
            $tipo=$request->input('tipo');
            $from =date_create( $request->input('from'));
            $to=date_create($request->input('to'));
            $aux1=$from->diff($to);
            $dias=$aux1->days;

              // $from->modify('+1 day');
                //$from->format('Y-m-d');
        if(session()->get('id') ?? ''){
        $maxs=Rol::max('id_rol');
        if(session()->get('user_rol')->first()<=$maxs){
            $carr=$this->numcarril($numiter);
                $gener=$this->generador($numiter, $dias);
                $tipv=['Liviano','Mediano','Pesado'];
                if($clasi=='Autopista')
                {
                    $this->simAuto($numiter,$clasi,$tipo,$from,$to,$dias, $gener,$carr,$tipv);
                }
                if($clasi=='Calle')
                {
                    $this->simCalle($numiter,$clasi,$tipo,$from,$to,$dias,$gener,$carr,$tipv);
                }
                if($clasi=='Carretera')
                 {
                    $this->simCarre($numiter,$clasi,$tipo,$from,$to,$dias,$gener,$carr,$tipv);
                 }
                if($clasi=='Avenida')
                 {
                    $this->simAvenida($numiter,$clasi,$tipo,$from,$to,$dias,$gener,$carr,$tipv);
                 }

        }else
        return "holaaaa";//redirect()->route('login')->with('info');

    }else return  "holaaaa2";//redirect()->route('login')->with('info');
    return  "holaaaa3";
    }
    public function numcarril($carril){
        $numiter=$carril;
        if($numiter<=50000){
            $carr=2;
        }
        if($numiter>50000&& $numiter<=100000){
            $carr=3;
        }
        if($numiter>100000&&$numiter<=150000){
            $carr=4;
        }
        if($numiter>150000&&$numiter<=200000){
            $carr=5;
        }
        if($numiter>200000&&$numiter<=250000){
            $carr=6;
        }
        return $carr;

    }
    public function random_date($from, $to) {
	    if (!$to) {
	        $to = date('U');
	    }
	    if (!ctype_digit($from)) {
	        $from = strtotime($from);
	    }
	    if (!ctype_digit($to)) {
	        $to = strtotime($to);
	    }
        return date('Y-m-d', rand($from, $to));
    }
    public function random_time() {

        $randDate=new DateTime();
        $randDate->setTime(mt_rand(0,23),mt_rand(0,59));

        return date($randDate->format('H:i:s'));
    }
    public function borrarsimulador($id)
    {       $idu=$id;
        DB::table('simulador')->where('simulador.usr_id','=',$idu)->delete();
    }
    public function simCalle($numiter,$clasi,$tipo,$from,$to,$dias, $gener, $carr,$tipv)
    {
        $numer=$numiter;
        $clas=$clasi;
        $tip=$tipo;
        $from=$from;
        $to=$to;
        $cantdia=$dias;
        $congruencial=$gener;
        $carril=$carr;
        $tipve=$tipv;
        /*  $incre=date_add($from, date_interval_create_from_date_string('1 days'));
               $incre=date_format($incre,'Y-m-d');
                dd($incre); */
                $idus=session()->get('id')->first();

                $maxo=DB::table('vehiculo')->max('orden');
                $vehi=DB::table('vehiculo')->select('distan_ini')->orderBy('orden')->get();
                $vehi_f=DB::table('vehiculo')->select('distaci_fin')->orderBy('orden')->get();
                //$convert=$this->conver($gener);
                //$sepdig=$this->desfrac($gener);
                $genfecha=$this->fechas($from, $to , $step='+1 day',$format='Y/m/d' ,$cantdia);
                /* $validar=DB::select('SELECT to-from'); */
                //$ran_fe=$this->random_date($from,$to );
                for($j=0;$j<count($congruencial);$j++){
                    $aux=$congruencial[$j];
                    $i=0;
                    while($i<count($aux)){
                        //for($i=0;$i<=count($aux);$i++){
                            $ran_h=$this->random_time();
                            $fecha=$genfecha[$j];
                            $ciu='anomi';
                            $depa='dep';
                            $via='ALF';
                            $sen='sensor'.$idus;

                            if($aux[$i]==5){
                               $distan_f=$vehi_f[0]->distaci_fin;
                               $distan_i=$vehi[0]->distan_ini;
                               $num=rand($distan_i,$distan_f);
                               $nucar=rand(1,$carril);
                               $sim=$this->insertar($i,$sen,$depa,$ciu,$via,$num,$nucar,2,$fecha,$ran_h,$idus,$clas,$tipve[0]);
                                $i++;

                            }
                            if($aux[$i]==4){
                             $distan_f=$vehi_f[1]->distaci_fin;
                               $distan_i=$vehi[1]->distan_ini;
                               $num=rand($distan_i,$distan_f);
                               $eje=rand(2,3);
                               $num=rand($distan_i,$distan_f);
                               $nucar=rand(1,$carril);
                               $sim=$this->insertar($i,$sen,$depa,$ciu,$via,$num,$nucar,$eje,$fecha,$ran_h,$idus,$clas,$tipve[1]);

                                $i++;
                           }
                           if($aux[$i]==3){

                             $distan_f=$vehi_f[3]->distaci_fin;
                               $distan_i=$vehi[3]->distan_ini;
                               $num=rand($distan_i,$distan_f);
                               $eje=rand(3,5);
                               $num=rand($distan_i,$distan_f);
                               $nucar=rand(1,$carril);
                               $sim=$this->insertar($i,$sen,$depa,$ciu,$via,$num,$nucar,$eje,$fecha,$ran_h,$idus,$clas,$tipve[2]);

                               $i++;
                           }
                           if($aux[$i]==2){

                             $distan_f=$vehi_f[3]->distaci_fin;
                               $distan_i=$vehi[3]->distan_ini;
                               $num=rand($distan_i,$distan_f);
                               $eje=rand(5,8);
                               $num=rand($distan_i,$distan_f);
                               $nucar=rand(1,$carril);
                               $sim=$this->insertar($i,$sen,$depa,$ciu,$via,$num,$nucar,$eje,$fecha,$ran_h,$idus,$clas,$tipve[2]);
                               $i++;
                           }
                         }
                     //}
                    }

                    return $this->tables();
    }
    public function simAvenida($numiter,$clasi,$tipo,$from,$to,$dias, $gener,$carr,$tipv)
    {
        $numer=$numiter;
        $clas=$clasi;
        $tip=$tipo;
        $from=$from;
        $to=$to;
        $cantdia=$dias;
        $congruencial=$gener;
        $carril=$carr;
        $tipve=$tipv;

        /*  $incre=date_add($from, date_interval_create_from_date_string('1 days'));
               $incre=date_format($incre,'Y-m-d');
                dd($incre); */
                $idus=session()->get('id')->first();
                $maxo=DB::table('vehiculo')->max('orden');
                $vehi=DB::table('vehiculo')->select('distan_ini')->orderBy('orden')->get();
                $vehi_f=DB::table('vehiculo')->select('distaci_fin')->orderBy('orden')->get();
                //$convert=$this->conver($gener);
                //$sepdig=$this->desfrac($gener);
                $genfecha=$this->fechas($from, $to , $step='+1 day',$format='Y/m/d' ,$cantdia);
                /* $validar=DB::select('SELECT to-from'); */
                //$ran_fe=$this->random_date($from,$to );
                for($j=0;$j<count($congruencial);$j++){
                    $aux=$congruencial[$j];
                    $i=0;
                    while($i<count($aux)){
                        //for($i=0;$i<=count($aux);$i++){
                            $ran_h=$this->random_time();
                            $fecha=$genfecha[$j];
                            $ciu='anomi';
                            $depa='dep';
                            $via='ALF';
                            $sen='sensor'.$idus;

                            if($aux[$i]==5){
                               $distan_f=$vehi_f[0]->distaci_fin;
                               $distan_i=$vehi[0]->distan_ini;
                               $num=rand($distan_i,$distan_f);
                               $nucar=rand(1,$carril);
                               $sim=$this->insertar($i,$sen,$depa,$ciu,$via,$num,$nucar,2,$fecha,$ran_h,$idus,$clas,$tipve[0]);
                                $i++;

                            }
                            if($aux[$i]==4){
                             $distan_f=$vehi_f[1]->distaci_fin;
                               $distan_i=$vehi[1]->distan_ini;
                               $num=rand($distan_i,$distan_f);
                               $eje=rand(2,3);
                               $num=rand($distan_i,$distan_f);
                               $nucar=rand(1,$carril);
                               $sim=$this->insertar($i,$sen,$depa,$ciu,$via,$num,$nucar,$eje,$fecha,$ran_h,$idus,$clas,$tipve[1]);

                                $i++;
                           }
                           if($aux[$i]==3){

                             $distan_f=$vehi_f[3]->distaci_fin;
                               $distan_i=$vehi[3]->distan_ini;
                               $num=rand($distan_i,$distan_f);
                               $eje=rand(3,5);
                               $num=rand($distan_i,$distan_f);
                               $nucar=rand(1,$carril);
                               $sim=$this->insertar($i,$sen,$depa,$ciu,$via,$num,$nucar,$eje,$fecha,$ran_h,$idus,$clas,$tipve[2]);

                               $i++;
                           }
                           if($aux[$i]==2){

                             $distan_f=$vehi_f[3]->distaci_fin;
                               $distan_i=$vehi[3]->distan_ini;
                               $num=rand($distan_i,$distan_f);
                               $eje=rand(5,8);
                               $num=rand($distan_i,$distan_f);
                               $nucar=rand(1,$carril);
                               $sim=$this->insertar($i,$sen,$depa,$ciu,$via,$num,$nucar,$eje,$fecha,$ran_h,$idus,$clas,$tipve[2]);
                               $i++;
                           }
                         }
                     //}
                    }
                    return $this->tables();
    }
    public function simCarre($numiter,$clasi,$tipo,$from,$to,$dias, $gener,$carr,$tipv)
    {
        $numer=$numiter;
        $clas=$clasi;
        $tip=$tipo;
        $from=$from;
        $to=$to;
        $cantdia=$dias;
        $congruencial=$gener;
        $carril=$carr;
        $tipve=$tipv;
        /*  $incre=date_add($from, date_interval_create_from_date_string('1 days'));
               $incre=date_format($incre,'Y-m-d');
                dd($incre); */
                $idus=session()->get('id')->first();

                $maxo=DB::table('vehiculo')->max('orden');
                $vehi=DB::table('vehiculo')->select('distan_ini')->orderBy('orden')->get();
                $vehi_f=DB::table('vehiculo')->select('distaci_fin')->orderBy('orden')->get();
                //$convert=$this->conver($gener);
                //$sepdig=$this->desfrac($gener);
                $genfecha=$this->fechas($from, $to , $step='+1 day',$format='Y/m/d' ,$cantdia);
                /* $validar=DB::select('SELECT to-from'); */
                //$ran_fe=$this->random_date($from,$to );
                for($j=0;$j<count($congruencial);$j++){
                    $aux=$congruencial[$j];
                    //$i=0;
                    for($i=0; $i<count($aux);$i++)
                    {
                        $ran_h=$this->random_time();
                        $fecha=$genfecha[$j];
                        $ciu='anomi';
                        $depa='dep';
                        $via='ALF';
                        $sen='sensor'.$idus;

                        if($aux[$i]==2){
                           $distan_f=$vehi_f[0]->distaci_fin;
                           $distan_i=$vehi[0]->distan_ini;
                           $num=rand($distan_i,$distan_f);
                           $nucar=rand(1,$carril);
                           $sim=$this->insertar($i,$sen,$depa,$ciu,$via,$num,$nucar,2,$fecha,$ran_h,$idus,$clas,$tipve[0]);
                            $i=$i+1;

                        }
                        if($aux[$i]==4){
                         $distan_f=$vehi_f[1]->distaci_fin;
                           $distan_i=$vehi[1]->distan_ini;
                           $num=rand($distan_i,$distan_f);
                           $eje=rand(2,3);
                           $num=rand($distan_i,$distan_f);
                           $nucar=rand(1,$carril);
                           $sim=$this->insertar($i,$sen,$depa,$ciu,$via,$num,$nucar,$eje,$fecha,$ran_h,$idus,$clas,$tipve[1]);
                           $i=$i+1;

                       }
                       if($aux[$i]==5){

                         $distan_f=$vehi_f[2]->distaci_fin;
                           $distan_i=$vehi[2]->distan_ini;
                           $num=rand($distan_i,$distan_f);
                           $eje=rand(3,5);
                           $num=rand($distan_i,$distan_f);
                           $nucar=rand(1,$carril);
                           $sim=$this->insertar($i,$sen,$depa,$ciu,$via,$num,$nucar,$eje,$fecha,$ran_h,$idus,$clas,$tipve[2]);
                           $i=$i+1;

                       }
                       if($aux[$i]==3){

                         $distan_f=$vehi_f[2]->distaci_fin;
                           $distan_i=$vehi[2]->distan_ini;
                           $num=rand($distan_i,$distan_f);
                           $eje=rand(5,8);
                           $num=rand($distan_i,$distan_f);
                           $nucar=rand(1,$carril);
                           $sim=$this->insertar($i,$sen,$depa,$ciu,$via,$num,$nucar,$eje,$fecha,$ran_h,$idus,$clas,$tipve[2]);
                           $i=$i+1;

                       }
                    }
                               }
                               return $this->tables();
    }
    public function simAuto($numiter,$clasi,$tipo,$from,$to,$dias, $gener,$carr,$tipv)
    {

        $numer=$numiter;
        $clas=$clasi;
        $tip=$tipo;
        $from=$from;
        $to=$to;
        $cantdia=$dias;
        $congruencial=$gener;
        $carril=$carr;
        $tipve=$tipv;
        /*  $incre=date_add($from, date_interval_create_from_date_string('1 days'));
               $incre=date_format($incre,'Y-m-d');
                dd($incre); */
                $idus=session()->get('id')->first();

                $maxo=DB::table('vehiculo')->max('orden');
                $vehi=DB::table('vehiculo')->select('distan_ini')->orderBy('orden')->get();
                $vehi_f=DB::table('vehiculo')->select('distaci_fin')->orderBy('orden')->get();
                //$convert=$this->conver($gener);
                //$sepdig=$this->desfrac($gener);
                $genfecha=$this->fechas($from, $to , $step='+1 day',$format='Y/m/d' ,$cantdia);
                /* $validar=DB::select('SELECT to-from'); */
                //$ran_fe=$this->random_date($from,$to );
                for($j=0;$j<count($congruencial);$j++){
                    $aux=$congruencial[$j];
                    //$i=0;
                    for($i=0; $i<count($aux);$i++)
                    {
                        $ran_h=$this->random_time();
                        $fecha=$genfecha[$j];
                        $ciu='anomi';
                        $depa='dep';
                        $via='ALF';
                        $sen='sensor'.$idus;
                        if($aux[$i]==2){

                           $distan_f=$vehi_f[0]->distaci_fin;
                           $distan_i=$vehi[0]->distan_ini;
                           $num=rand($distan_i,$distan_f);
                           $nucar=rand(1,$carril);
                           $sim=$this->insertar($i,$sen,$depa,$ciu,$via,$num,$nucar,2,$fecha,$ran_h,$idus,$clas,$tipve[0]);

                        }
                        if($aux[$i]==4){

                          $distan_f=$vehi_f[1]->distaci_fin;
                           $distan_i=$vehi[1]->distan_ini;
                           $num=rand($distan_i,$distan_f);
                           $eje=rand(2,3);
                           $num=rand($distan_i,$distan_f);
                           $nucar=rand(1,$carril);
                           $sim=$this->insertar($i,$sen,$depa,$ciu,$via,$num,$nucar,$eje,$fecha,$ran_h,$idus,$clas,$tipve[1]);

                       }
                       if($aux[$i]==5){
                         $distan_f=$vehi_f[2]->distaci_fin;
                           $distan_i=$vehi[2]->distan_ini;
                           $num=rand($distan_i,$distan_f);
                           $eje=rand(3,5);
                           $num=rand($distan_i,$distan_f);
                           $nucar=rand(1,$carril);
                           $sim=$this->insertar($i,$sen,$depa,$ciu,$via,$num,$nucar,$eje,$fecha,$ran_h,$idus,$clas,$tipve[2]);

                       }
                       if($aux[$i]==3){

                         $distan_f=$vehi_f[2]->distaci_fin;
                           $distan_i=$vehi[2]->distan_ini;
                           $num=rand($distan_i,$distan_f);
                           $eje=rand(5,8);
                           $num=rand($distan_i,$distan_f);
                           $nucar=rand(1,$carril);
                           $sim=$this->insertar($i,$sen,$depa,$ciu,$via,$num,$nucar,$eje,$fecha,$ran_h,$idus,$clas,$tipve[2]);

                       }
                    }
                               }
                               return $this->tables();
///
     }

    public function fechas($from, $to ,$step, $format ,$cantdia){

        $ini=$from->format('Y-m-d');
        $hasta=$to->format('Y-m-d');
        $step=$step;
        $format=$format;
        $cant=$cantdia;

        //dd($ini);
            $dates=array();
            $current=strtotime($ini);
            $last=strtotime($hasta);
            while($current<=$last){
                $dates[]=date($format,$current);
                $current=strtotime($step,$current);
            }
            return $dates;
        // for($i=1; $i <= $cant; $i++){
        //     if($i==1){

        //     }
        //     if($i>1 && $i<$cant){
        //         $incre=date_add($ini, date_interval_create_from_date_string('1 days'));
        //         $incre=date_format($incre,'Y-m-d');
        //         dd($incre);

        //     }
        //     if($i==$cant){


        //     }
        // }
    }
    public function generador($numeric, $dias){
        $num=$numeric;
        $days=$dias+1;
        $a=1029;
        $c=14641;
        $array=[1029, 14641, 16384,32414];
        for($j=0; $j<$days; $j++){
            $m=$array[rand(0,3)];
            $ran=rand(0.1,1.9);
            $x0=(10000+$ran*32414)%162414;
            if($j==0){
                for($i=0; $i<$num ; $i++){

                    $jack=($a*$x0+$c)%$m;
                    $jac=$this->contar($jack,0);
                    $numPse[$i]=$jac;
                    $x0=$jack;
                }
                $arrayNumP[$j]=$numPse;
            }else{

                $arrayNumP[$j]=$this->generadoras($num);
            }

        }
        return $arrayNumP;
    /*     $tam=count($arrayNumP);
        for($p=0;$p<$tam;$p++){

            $cade[$p]=count($arrayNumP[$p]);
        }
       // dd($cade);
        return $cade; */
    }
    public function generadoras($num){
        $numer=$num;
        $a=1029;
        $c=14641;
        $ran=rand(0.1,1.9);
        $x0=(10000+$ran*32414)%162414;
        $array=[1029, 14641, 16384,32414];
        $fact=rand(0.01,5);
        $m=$array[rand(0,3)];

            $porsen=rand(1,15);
            $val=intval($num*($porsen/100));
            $frec=rand(1,2);
        if($frec==2){
            $num=$numer-$val;
            for($i=0; $i<$num ; $i++){
                $jack=($a*$x0+$c)%$m;
                $jac=$this->contar($jack,0);
                $numPse[$i]=$jac;
                $x0=$jack;
            }
            }
            if($frec==1){

                $num=$numer+$val;
                for($i=0; $i<$num ; $i++){

                    $jack=($a*$x0+$c)%$m;
                    $jac=$this->contar($jack,0);
                    $numPse[$i]=$jac;
                    $x0=$jack;
                }
                }
                return $numPse;
        }

   /*  public function generador($numeric, $dias)
    {  $num=$numeric;
        $days=$dias+1;
        $a=1029;
+        $c=14641;
        $array=[1029, 14641, 16384,32414];
        for($j=0; $j<$days; $j++){
            $m=$array[rand(0,3)];
            $ran=rand(0.1,1.9);
            $x0=(10000+$ran*32414)%162414;
            $fact=rand(0.01,5);
            $porsen=rand(1,15);
            $val=intval($num*($porsen/100));
            $frec=rand(1,2);
            if($j==0){
                for($i=0; $i<=$num ; $i++){
                    $numPse[$i]=($a*$x0+$c)%$m;
                    $x0=$numPse[$i];
                }
            }else{
                if($frec==2){
                $num=$numeric-$val;
                for($i=0; $i<=$num ; $i++){

                    $numPse[$i]=($a*$x0+$c)%$m;
                    $x0=$numPse[$i];
                }
                }
                if($frec==1){

                    $num=$numeric+$val;
                    for($i=0; $i<=$num ; $i++){

                        $numPse[$i]=($a*$x0+$c)%$m;
                        $x0=$numPse[$i];
                    }
                    }
            }
            $arrayNumP[$j]=$numPse;


        }

         $tam=count($arrayNumP);
            for($p=0;$p<$tam;$p++){

                $cade[$p]=count($arrayNumP[$p]);
            }
            dd($cade);
        //  $i=0;
        //  for($i,$i<$num;$i++){

        //  }
        //dd(count($numPse));
    } */
    public function conver($gener){

        $gen=$gener;
        for($j=0;$j<count($gen);$j++){
            $aux=$gen[$j];
            for($i=0;$i<count($aux);$i++){
                    $aux[$i]=$aux[$i]/10000;
            }
            $gen[$j]=$aux;
        }
        return $gen;
    }
    public function insertar($i,$sen,$depa,$ciu,$via,$num,$nucar,$eje,$fecha,$ran_h,$idus,$clas,$tipv){
        $insert=Simul::insert(['id_simu'=>$i,'nombsen'=>$sen,'dep'=>$depa,'ciudad'=>$ciu,'via'=>$via,'distan'=>$num,'nuncarril'=>$nucar,'#ejes'=>$eje,'fecha'=>$fecha,'hora'=>$ran_h,'usr_id'=>$idus,'clasifi'=>$clas,'tipov'=>$tipv]);

    }

    public function desfrac($gener){
       ini_set('memory_limit', '2048M');
        $desf=$gener;
        $frec=$this->frecuencia();
        dd($frec);
        //dd($desf);
        $tam=count($desf);
        for($i=0;$i<$tam;$i++){
            $long=count($desf[$i]);
            $list=$desf[$i];
            //dd($list);
            for($j=0;$j<$long;$j++){
                $frac=$list[$j];
                $val=$this->dividirDi($frac);
                $tipok=$this->tipopoker($val);
              /*  if( =="DIFERENTES"){
                $list[$j]=$frec[0];

               }
               if(=="UN PAR"){
                $list[$j]=$frec[1];

               }
               if(=="DOS PARES"){
                $list[$j]=$frec[2];

               }
               if(=="TERCIO"){
                $list[$j]=$frec[3];

               }
               if(=="FULL"){
                $list[$j]=$frec[4];

               }
               if(=="POKER"){
                $list[$j]=$frec[5];

               }
               if(=="QUINTILLA"){
                $list[$j]=$frec[6];

               } */
            }
            $desf[$i]=$list;
        }
        dd($desf);
    }
    public function frecuencia(){

        $frecuencia[0]=30.24;
        $frecuencia[1]=50.40;
        $frecuencia[2]=10.80;
        $frecuencia[3]=7.20;
        $frecuencia[4]=0.90;
        $frecuencia[5]=0.45;
        $frecuencia[6]=0.10;

        return $frecuencia;
    }
    public function dividirDi($dig){
        $i=0;
        $digit=$dig;
        $cant=$this->contar($digit, 0);
        //dd($cant);
            for($i=0;$i<$cant;$i++){
            $digig[$i]=$dig%10;
            $dig=$dig/10;
            }

        return $digig;
    }
    public function contar($numer, $contar){
            $cifra=$numer;
            if($cifra<=9){
                $contar=1;
            }else{
                $contar=1+$this->contar($numer/10,$contar);
            }
            return $contar;
    }
    public function pruebafreck(){

    }
    public function tables(){
        if(session()->get('id') ?? ''){
            $maxs=Rol::max('id_rol');
            if(session()->get('user_rol')->first()<=$maxs){

                 $id=session()->get('id');

                return view('simulador.tablas');

            }else return redirect()->route('login')
        ->with('info');

    }
    }
    public function tipopoker($poker){
        $ani=$poker;

    }
    public function graficD()
    {

    }
}
