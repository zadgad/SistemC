<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PasswordRequest;
use App\Usr;
use App\Persona;
use App\Usr_Rol;
use App\Rol;
use DB;
class usersCon extends Controller
{
    public function show()
    {           $maxr=DB::table('rol')->max('id_rol');

        if (session()->get('user_rol')->first()<=$maxr) {

             if(session()->get('user_rol')->first()==1){
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
             }else{

                $users=DB::table('usr')->join('persona', 'ci_per', 'ci')->join(
                    'usr_rol',
                    'id_usr',
                    'usr_id'
                )->join('rol', 'id_rol', 'rol_id')->where('rol.id_rol','!=',1)->select(
                     'usr.id_usr',
                     'persona.nombre',
                     'persona.apepa',
                     'persona.apema',
                     'usr.login',
                     'usr.email',
                     'rol.ro'
                 )->get();
             }
            return view('admin.tablaUser', compact('users'));
        }
        else
        return redirect('/');
    }

    public function showI(){

        $idus=session()->get('user_rol');

        if($idus[0] == 1){
            $rols=DB::table('rol')->where('rol.id_rol', '>', 1)-> select('id_rol', 'ro')->get();
            return view('admin.form', compact('rols'));
        }
         else{
            $rols=DB::table('rol')->where('rol.id_rol', '>', 2)-> select('id_rol', 'ro')->get();
            return view('admin.form', compact('rols'));
        }
    }

    public function insertar(Request $request){
        $this->validate(
            $request,
            [
                'name' =>'required|string|max:255',
                'apelliP'=>'required|string|max:255',
                'apelliM'=>'required|string|max:255',
                'CI'=>'required|digits_between:6,12',
                'rol'=>'required|integer',
                'email' => 'required|string|email|max:255|unique:usr,email',
                'password' => 'required|string:password_confirmation|min:6|confirmed'
            ] );
            $name=$request->input('name');
            $last_name=$request->input('apelliP');
            $last_ape=$request->input('apelliM');
            $ci = $request->input('CI');
            $rol=$request->input('rol');
            $email=$request->input('email');
            $password=$request->input('password');
            $passwordR=$request->input('password_confirmation');

            $prueba=DB::table('usr')->where('usr.ci_per','=',$ci)->count();
            $prueba1=DB::table('usr')->where('usr.email','=',$email)->count();
            $roles=Rol::where('id_rol','=',$rol)->pluck('ro');

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
                             DB::table('usr_rol')->insert(['usr_id'=>$value->id_usr, 'rol_id'=>$rol]);
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

    public function editarW(){

        if(session()->get('id')??''){
            $id=session()->get('id')->first();

            $users=DB::table('usr')->join('persona', 'ci_per', 'ci')->join(
                'usr_rol',
                'id_usr',
                'usr_id'
            )->join('rol', 'id_rol', 'rol_id')->where('usr.id_usr','=',$id)->select(

                 'persona.nombre',
                 'persona.apepa',
                 'persona.apema',
                 'persona.ci',
                 'usr.login',
                 'usr.email',
             )->first();
        return view('admin.user',compact('users'));
         }else {
            return redirect()->route('login')
            ->with('info');
         }

    }

    public function editarU(Request $request){

        if(session()->get('id')??''){

            $this->validate(
                $request,
                [
                    'name' =>'required|string|max:255',
                    'lastN'=>'required|string|max:255',
                    'lastM'=>'required|string|max:255',
                    'login'=>'required|string|max:255',
                    'email' => 'required|string|email|max:255',
                ] );
                $user=session()->get('id')->first();
                $ci=DB::table('usr')->join('persona','ci','ci_per')->where('usr.id_usr','=',$user)->pluck('persona.ci');
                $ema=session()->get('email')->first();


                $name=$request->input('name');
                $last_name=$request->input('lastN');
                $last_ape=$request->input('lastM');
                //$ci = $request->input('ci');
                $login=$request->input('login');
                $email=$request->input('email');
                if($ema[0]==$email[0]){
                    $per=Persona::where('ci','=',$ci[0])->update(['nombre'=>$name,'apepa'=>$last_name,'apema'=>$last_ape]);
                    $usr=DB::table('usr')->where('id_usr','=',$user)->update(['login'=>$login]);


                    return back()->with('Mensaje', 'La Informacion fue actualizado');

                 }else{
                    $count=Usr::where('email','=',$email)->count();
                    if($count>0){

                        return back()->with('Mensaje', 'El correo ya existe');

                    }else{
                        $per=Persona::where('ci','=',$ci[0])->update(['nombre'=>$name,'apepa'=>$last_name,'apema'=>$last_ape]);
                        $usr=Usr::where('id_usr','=',$user)->update(['login'=>$login,'email'=>$email]);
                        $reset=DB::table('password_resets')->where('id_us','=',$user)->update(['email'=>$email]);

                        return back()->with('Mensaje', 'La Informacion fue actualizado');

                    }
                 }


        }else {
            return redirect()->route('login') ->with('info');
         }

    }

    public function editarPas(Request $request){

        $this->validate(
            $request,
            [
                'old_password'=>'required|string|max:255',
                'password' => 'required|string:password_confirmation|min:6|confirmed'

            ] );
                $pasw=$request->input('old_password');
                $newpas=$request->input('password');
                $confir=$request->input('password_confirmation');

        if(session()->get('id') ?? ''){
                $rol=session()->get('user_rol')->first();
                $maxr=DB::table('rol')->max('id_rol');

                if($rol<=$maxr){
                    $idr=session()->get('id')->first();
                    $pasd=Usr::where('id_usr', '=', $idr)->pluck('password');
                  if($pasd!=$newpas){

                    $pat=Usr::where('id_usr','=',$idr)->update(['password'=>$newpas]);
                    $reset=DB::table('password_resets')->where('id_us','=',$idr)->update(['token'=>$newpas]);
                    return back()->with('Mensaje','La contraseña se cambio correctamente');
                  }else{
                    return back()->with('Mensaje', 'Se pide que la nueva contraseña sea diferente');
                  }
                }
                else{
                    return redirect()->route('login') ->with('info');
                }
            }

    }

    public function editarUs($id){

                    $idu=$id;

            if(session()->get('id')??''){
                    $max=DB::table('rol')->max('id_rol');
                if(session()->get('user_rol')->first()<=$max){
                    $idus=session()->get('user_rol');

            if($idus[0] == 1){
                $rols=DB::table('rol')->where('rol.id_rol', '>', 1)-> select('id_rol', 'ro')->get();
                $users=DB::table('usr')->join('persona', 'ci_per', 'ci')->join(
                    'usr_rol',
                    'id_usr',
                    'usr_id'
                )->join('rol', 'id_rol', 'rol_id')->where('usr.id_usr','=',$idu)->select(
                    'usr.id_usr',
                     'persona.nombre',
                     'persona.apepa',
                     'persona.apema',
                     'usr.login',
                     'usr.email',
                     'ro'
                 )->first();

                 return view('admin.editarUser',compact('users','rols'));

            }
         else{
            $rols=DB::table('rol')->where('rol.id_rol', '>', 2)-> select('id_rol', 'ro')->get();
            $users=DB::table('usr')->join('persona', 'ci_per', 'ci')->join(
                'usr_rol',
                'id_usr',
                'usr_id'
            )->join('rol', 'id_rol', 'rol_id')->where('usr.id_usr','=',$idu)->select(
                'usr.id_usr',
                 'persona.nombre',
                 'persona.apepa',
                 'persona.apema',
                 'usr.login',
                 'usr.email',
                 'ro'
             )->first();

             return view('admin.editarUser',compact('users','rols'));

        }

                }else{
                    return redirect()->route('login') ->with('info');
                }
            }else{
                return redirect()->route('login') ->with('info');
            }

    }

    public function editUs(Request $request,$edit){

        $this->validate(
            $request,
            [
                'name' =>'required|string|max:255',
                'apelliP'=>'required|string|max:255',
                'apelliM'=>'required|string|max:255',
                'login'=>'required|string|max:255',
                'email' => 'required|string|email|max:255',
                'rol'=>'required|integer',
                'password' => 'required|string:password_confirmation|min:6|confirmed'

                ] );

                $name=$request->input('name');
                $last_name=$request->input('apelliP');
                $last_ape=$request->input('apelliM');
                //$ci = $request->input('ci');
                $login=$request->input('login');
                $email=$request->input('email');
                $idr=$edit;
                $rol=$request->input('rol');
                $passw=$request->input('password');
                $conf=$request->input('password_confirmation');

    }


}
