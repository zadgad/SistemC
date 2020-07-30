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
use Illuminate\Support\Facades\Crypt;
class registro extends Controller
{
    public function viewlogin()
    {
       return view('auth.login');
     }
    public function viewregistro()
    {
        return view('auth.registrohome');
    }

    public function store(Request $request)
    {

        $this->validate(
            $request,
            [
                'name' =>'required|string|max:255',
                'last_name'=>'required|string|max:255',
                'last_ape'=>'required|string|max:255',
                'ci'=>'required|digits_between:6,12',
                'email' => 'required|string|email|max:255|unique:usr,email',
                'password' =>  'required|string:password_confirmation|min:6|confirmed'
            ]
        );

            $name=$request->input('name');
            $last_name=$request->input('last_name');
            $last_ape=$request->input('last_ape');
            $ci = $request->input('ci');
            $email=$request->input('email');
            $pas=$request->input('password');
            $password=sha1($pas);
            $pass=$request->input('password_confirmation');
            $passwordR=sha1($pass);

            $prueba=DB::table('usr')->where('usr.ci_per','=',$ci)->count();
            $prueba1=DB::table('usr')->where('usr.email','=',$email)->count();

            //  $prueba=DB::table('usr')->select(DB::raw('count(*) as usr_count, ci_per'))->where('usr.ci_per','=',$ci);
            if($prueba < 1 || $prueba1<1){
            if ($prueba<1) {
                if ($prueba1<1) {
                 if($password==$passwordR){
                     $insertpersona=DB::table('persona')->insert(['ci'=>$ci, 'nombre'=>$name, 'apepa'=>$last_name,'apema'=>$last_ape]);
                     $insertuser=DB::table('usr')->insert(['login'=>$email, 'email'=>$email, 'password'=>$password, 'ci_per'=>$ci]);

                     //$rol = rol ::where('rol.id_rol', '=',1)->select('id_rol') ->get();
                     //$usr = usr::where('usr.ci_per','=', $ci)->select('id_usr')->get();
                     $getuser = DB::table('usr')->where('usr.ci_per', '=', $ci)->select('id_usr', 'email', 'password')->get();
                     //return $insertpersona." user".$insertuser."get ".$getuser;
                     $id=Usr::where('ci_per','=',$ci )->pluck('id_usr');
                     foreach ($getuser as $key => $value) {
                         DB::table('usr_rol')->insert(['usr_id'=>$value->id_usr, 'rol_id'=>4]);
                        //  DB::table('password_reset')->insert(['email'=>$value->email,'token'=>$value->password,'id_us'=>$value->id_usr]);
                          DB::table('password_resets')->insert(['email'=>$email,'token'=>$password,'id_us'=>$id[0]]);

                         break;
                     }
                  }else
                  {
                    return back()->with('Mensaje', 'Las contraseñas no coinciden, intente de nuevo');
                  }
                }else{
                    return back()->with('Mensaje', 'El CI ya esta registrado');

                }
                return back()->with('Mensaje', 'Has agregado un nuevo Usuario');

              }else{
                return back()->with('Mensaje', 'El EMAIL ya esta registrado');

              }
              return back()->with('Mensaje', 'Has agregado un nuevo Usuario');

            }



    }
    public function login(Request $request){
        $uss=$request->get('email');
        $passt=$request->get('password');
        $pass=sha1($passt);
        dd($pass);
        $valido=false;
       // $foundclient=Usuario::where(['email' => $uss,'password' => $pass])->get()->first();
        $foundclient=DB::table('usr')->where(['login' => $uss,'password' => $pass])->get()->first();
        //return $foundclient->id;
          // $now = new \DateTime();
           $now= Carbon :: now ();
                $now->format('Y-m-d H:i:s');
       // return $pass." ".$uss;
          if($foundclient){
        //   $foundrol=$foundclient->rol;
        // $materia=DB::table('usuarios')->join('materias','materias.id_docente','usuarios.id')->where('usuarios.email','=',$docente)->get();
            $id=DB::table('usr')->where('usr.login','=',$uss)->select('usr.id_usr')->get();
            // $foundrol=DB::table('usr')->join('usr_rol','id_usr','usr_id' )->where('usr.id_usr','=',$id)->select('id_rol')->get();
            // dd('todo esta bien');
            $idrol=DB::table('usr_rol')->where('usr_rol.usr_id','=',$id)->select('usr_rol.rol_id')->get();


         $rol=DB::table('rol')->where('id_rol','=',$idrol)->select('ro');
          $nomb=DB::table('persona')->join('usr','ci_per','ci')->where('id_user','=',$id)->selet('nombre')->get();
          $email=DB::table('usr')->where('login','=',$uss)->selet('email')->get();
          //Guarda todo lo necesario del usuario logeado en sesion
          $request->session()->put('rol', $rol);
          $request->session()->put('nombre',$nomb->nombre);
          $request->session()->put('email',$email->email);

          $request->session()->put('id_usr',$id);
          //gurdar session
        //   $sesion=DB::table('sesion')->insertGetId( ['id_usuario'=>$id->id, ''=>$uss,'fecha'=>$now,'hora_conect'=>$now,'hora_disconect'=>$now,'asistencia'=>0] );
           $sesion=DB::table('sesion')->insertGetId( ['id_usuario'=>$id->id, 'asistencia'=>0, 'nombre'=>$nomb] );

        }else return redirect()->route('login')
            ->with('info');//view('auth/login');//return response()->json(['data'=>'No existe']);

        switch ($rol) {
          case 'super':
            return redirect('home');
            break;
          case 'admin':
            return redirect('home');
            break;
          case 'empleado':
            return redirect('home');
            break;
          case 'usuario':

            return redirect('home');
            break;
          default:
            return view('auth.login');//return response()->json(['data'=>'Rol extraño']);
            break;
        }
      }
}
