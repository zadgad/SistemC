<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rol;
use DB;
use App\Usr;
use App\Persona;
class personalCon extends Controller
{
    public function show()
    {
      if(session()->get('id')??''){
        $id=session()->get('id');
        $maxr=Rol::max('id_rol');
        if (session()->get('user_rol')->first()<=$maxr) {
            $users=DB::table('usr')->join('persona', 'ci_per', 'ci')->join('usr_rol', 'id_usr','usr_id')->join('rol', 'id_rol', 'rol_id')->where('rol.id_rol','=',3)->select('usr.id_usr',
            'persona.nombre',
            'persona.apepa',
            'persona.apema',
            'usr.login',
            'usr.email',
            'ro')->get();

              return view('admin.jobs',compact('users'));
          }else{
            return redirect()->route('login') ->with('info');

          }
      }else                    return redirect()->route('login') ->with('info');


    }

    public function insertE(){

        if(session()->get('id') ?? ''){
            $maxs=Rol::max('id_rol');
            if(session()->get('user_rol')->first()<=$maxs){
                return view('admin.añadirEm');
            }else
            return redirect()->route('login')
            ->with('info');

        }else {
            return redirect()->route('login')
        ->with('info');
        }
    }
    public function añadirE(Request $request){
        $this->validate(
            $request,
            [
                'name' =>'required|string|max:255',
                'apelliP'=>'required|string|max:255',
                'apelliM'=>'required|string|max:255',
                'CI'=>'required|digits_between:6,12',
                'email' => 'required|string|email|max:255|unique:usr,email',
                'password' => 'required|string:password_confirmation|min:6|confirmed'
            ]
        );

            $name=$request->input('name');
            $last_name=$request->input('apelliP');
            $last_ape=$request->input('apelliM');
            $ci = $request->input('CI');
            $email=$request->input('email');
            $password=$request->input('password');
            $passwordR=$request->input('password_confirmation');

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
                         DB::table('usr_rol')->insert(['usr_id'=>$value->id_usr, 'rol_id'=>3]);
                        //  DB::table('password_reset')->insert(['email'=>$value->email,'token'=>$value->password,'id_us'=>$value->id_usr]);
                          DB::table('password_resets')->insert(['email'=>$email,'token'=>$password,'id_us'=>$id[0]]);

                         break;
                     }

                     return redirect()->route('list_em')
                     ->with('info');
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
    public function actuaEm(Request $request,$id){


    }

}

