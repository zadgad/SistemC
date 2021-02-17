<?php
namespace App\Http\Controllers;
use App\Usr;
use Illuminate\Http\Request;
use App\Persona;
use App\Usr_Rol;
use App\Rol;
use DB;
use Symfony\Component\Console\Helper\Table;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\FormRequest;
class UsrController extends Controller
{
    public function form()
    {        if(session()->get('id') ?? ''){
            $maxs=Rol::max('id_rol');
            if(session()->get('user_rol')->first()<=$maxs){
                $idus=session()->get('user_rol');
                if($idus[0] == 1){
                    $rols=DB::table('rol')->where('rol.id_rol', '>', 1)-> select('id_rol', 'ro')->get();
                    return view('admin.añadirU', compact('rols'));
                }
                 else{
                    $rols=DB::table('rol')->where('rol.id_rol', '>', 2)-> select('id_rol', 'ro')->get();
                    return view('admin.añadirU', compact('rols'));
                }
            }else
            return redirect()->route('login')
            ->with('info');
        }else return redirect()->route('login')
        ->with('info');
    }
    public function reDisct($id)
    {
         if(session()->get('id') ?? ''){
            $maxs=Rol::max('id_rol');
            if(session()->get('user_rol')->first()<=$maxs){
                $idus=session()->get('user_rol');
                if($idus[0] == 1){
                    $rol=$id;
                    $rols=DB::table('rol')->where('rol.id_rol', '>', 1)-> select('id_rol', 'ro')->get();
                    return view('users.create',compact('rol'));
                }
                 else{
                     $rol=$id;
                    $rols=DB::table('rol')->where('rol.id_rol', '>', 2)-> select('id_rol', 'ro')->get();
                    return view('users.create',compact('rol'));
                }
            }else
            return redirect()->route('login')
            ->with('info');
        }else return redirect()->route('login')
        ->with('info');
    }
    public function listU(){
        if(session()->get('id') ?? ''){
            $maxs=Rol::max('id_rol');
            if(session()->get('user_rol')->first()<=$maxs){

                if(session()->get('user_rol')->first()==1){

                    $users=DB::table('usr')->join('persona', 'ci_per', 'ci')->join(
                       'usr_rol',
                       'id_usr',
                       'usr_id'
                   )->join('rol', 'id_rol', 'rol_id')->select(
                        'usr.foto',
                        'usr.id_usr',
                        'persona.nombre',
                        'persona.apepa',
                        'persona.apema',
                        'usr.login',
                        'usr.email',
                        'rol.ro'
                    )->get();
                }else{

                   $users=DB::table('usr')->join('persona', 'ci_per', 'ci')->join('usr_rol','id_usr','usr_id')->join('rol', 'id_rol', 'rol_id')->where('rol.id_rol','!=',1)->select('usr.id_usr',
                        'usr.foto',
                        'usr.id_usr',
                        'persona.nombre',
                        'persona.apepa',
                        'persona.apema',
                        'usr.login',
                        'usr.email',
                        'rol.ro'
                    )->get();
                }
                $idus=session()->get('user_rol');
                if($idus[0] == 1){
                    $rols=DB::table('rol')->where('rol.id_rol', '>', 1)-> select('id_rol', 'ro')->get();
                    return view('superU.lisUs', compact('rols','users'));
                }
                else{
                    $rols=DB::table('rol')->where('rol.id_rol', '>', 2)-> select('id_rol', 'ro')->get();
                    return view('superU.lisUs', compact('rols','users'));
                }
                // return view('superU.users');
            }else
            return redirect()->route('login')
            ->with('info');

        }else return redirect()->route('login')
        ->with('info');

    }
    public function listE(){
        if(session()->get('id') ?? ''){
            $maxs=Rol::max('id_rol');
            if(session()->get('user_rol')->first()<=$maxs){
                if(session()->get('user_rol')->first()==1){

                    $userE=DB::table('usr')->join('persona', 'ci_per', 'ci')->join(
                        'usr_rol',
                        'id_usr',
                        'usr_id'
                    )->join('rol', 'id_rol', 'rol_id')->where('usr_rol.rol_id','=',3)->select(
                         'usr.foto',
                         'usr.id_usr',
                         'persona.nombre',
                         'persona.apepa',
                         'persona.apema',
                         'usr.login',
                         'usr.email',
                         'rol.ro'
                     )->get();

                }else{

                    $userE=DB::table('usr')->join('persona', 'ci_per', 'ci')->join(
                        'usr_rol',
                        'id_usr',
                        'usr_id'
                    )->join('rol', 'id_rol', 'rol_id')->where('usr_rol.rol_id','=',3)->select(
                         'usr.foto',
                         'usr.id_usr',
                         'persona.nombre',
                         'persona.apepa',
                         'persona.apema',
                         'usr.login',
                         'usr.email',
                         'rol.ro'
                     )->get();
                }
                $idus=session()->get('user_rol');
                if($idus[0] == 1){
                    $rols=DB::table('rol')->where('rol.id_rol', '>', 1)-> select('id_rol', 'ro')->get();
                    $rol=DB::table('rol')->select('id_rol')->get();

                    return view('admin.listE', compact('rols','userE','rol'));
                }
                else{
                    $rols=DB::table('rol')->where('rol.id_rol', '>', 2)-> select('id_rol', 'ro')->get();
                    $rol=DB::table('rol')->select('id_rol')->get();

                    return view('admin.listE', compact('rols','userE','rol'));
                }
                // return view('superU.users');
            }else
            return redirect()->route('login')
            ->with('info');

        }else return redirect()->route('login')
        ->with('info');

    }
    public function listA(){
        if(session()->get('id') ?? ''){
            $maxs=Rol::max('id_rol');
            if(session()->get('user_rol')->first()<=$maxs){
                if(session()->get('user_rol')->first()==1){
                     $userA=DB::table('usr')->join('persona', 'ci_per', 'ci')->join(
                        'usr_rol',
                        'id_usr',
                        'usr_id'
                    )->join('rol', 'id_rol', 'rol_id')->where('usr_rol.rol_id','=',2)->select(
                         'usr.foto',
                         'usr.id_usr',
                         'persona.nombre',
                         'persona.apepa',
                         'persona.apema',
                         'usr.login',
                         'usr.email',
                         'rol.ro'
                     )->get();

                }else{

                     $userA=DB::table('usr')->join('persona', 'ci_per', 'ci')->join(
                        'usr_rol',
                        'id_usr',
                        'usr_id'
                    )->join('rol', 'id_rol', 'rol_id')->where('usr_rol.rol_id','=',2)->select(
                         'usr.foto',
                         'usr.id_usr',
                         'persona.nombre',
                         'persona.apepa',
                         'persona.apema',
                         'usr.login',
                         'usr.email',
                         'rol.ro'
                     )->get();
                }
                $idus=session()->get('user_rol');
                if($idus[0] == 1){
                    $rols=DB::table('rol')->where('rol.id_rol', '>', 1)-> select('id_rol', 'ro')->get();
                    $rol=DB::table('rol')->select('id_rol')->get();
                    return view('admin.listA', compact('rols','userA','rol'));
                }
                else{
                    $rols=DB::table('rol')->where('rol.id_rol', '>', 2)-> select('id_rol', 'ro')->get();
                    $rol=DB::table('rol')->select('id_rol')->get();
                    return view('admin.listA', compact('rols','userA','rol'));
                }
                // return view('superU.users');
            }else
            return redirect()->route('login')
            ->with('info');

        }else return redirect()->route('login')
        ->with('info');

    }

    public function listUs(){
        if(session()->get('id') ?? ''){
            $maxs=Rol::max('id_rol');
            if(session()->get('user_rol')->first()<=$maxs){
                if(session()->get('user_rol')->first()==1){
                     $userU=DB::table('usr')->join('persona', 'ci_per', 'ci')->join(
                        'usr_rol',
                        'id_usr',
                        'usr_id'
                    )->join('rol', 'id_rol', 'rol_id')->where('usr_rol.rol_id','=',4)->select(
                         'usr.foto',
                         'usr.id_usr',
                         'persona.nombre',
                         'persona.apepa',
                         'persona.apema',
                         'usr.login',
                         'usr.email',
                         'rol.ro'
                     )->get();

                }else{

                     $userU=DB::table('usr')->join('persona', 'ci_per', 'ci')->join(
                        'usr_rol',
                        'id_usr',
                        'usr_id'
                    )->join('rol', 'id_rol', 'rol_id')->where('usr_rol.rol_id','=',4)->select(
                         'usr.foto',
                         'usr.id_usr',
                         'persona.nombre',
                         'persona.apepa',
                         'persona.apema',
                         'usr.login',
                         'usr.email',
                         'rol.ro'
                     )->get();
                }
                $idus=session()->get('user_rol');
                if($idus[0] == 1){
                    $rols=DB::table('rol')->where('rol.id_rol', '>', 1)-> select('id_rol', 'ro')->get();
                    $rol=DB::table('rol')->select('id_rol')->get();
                    return view('admin.listU', compact('rols','userU','rol'));
                }
                else{
                    $rols=DB::table('rol')->where('rol.id_rol', '>', 2)-> select('id_rol', 'ro')->get();
                    $rol=DB::table('rol')->select('id_rol')->get();
                    return view('admin.listU', compact('rols','userU','rol'));
                }
                // return view('superU.users');
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
                'telefono' =>'required|digits_between:6,12',
                'password' => 'required|string:password_confirmation|min:6|confirmed',
                'Foto' => 'image'
            ] );
            $name=$request->input('name');
            $last_name=$request->input('apelliP');
            $last_ape=$request->input('apelliM');
            $ci = $request->input('CI');
            $rol=$request->input('rol');
            $email=$request->input('email');
            $tel=$request->input('telefono');
            $pas=$request->input('password');
            $password=sha1($pas);
            $pass=$request->input('password_confirmation');
            $passwordR=sha1($pass);
            $prueba=DB::table('usr')->where('usr.ci_per','=',$ci)->count();
            $prueba1=DB::table('usr')->where('usr.email','=',$email)->count();
            $roles=Rol::where('id_rol','=',$rol)->pluck('ro');
            $ina=request()->except('_token');
                //dd($request->file('Foto'));
            if(!empty($ina['Foto'])){

                //dd($request->file('Foto'));
                $loca=$ina['Foto']->store('uploads','public');
              if($prueba < 1 || $prueba1<1){
                if ($prueba<1) {
                    if ($prueba1<1) {
                     if($password==$passwordR){
                         $insertpersona=DB::table('persona')->insert(['ci'=>$ci, 'nombre'=>$name, 'apepa'=>$last_name,'apema'=>$last_ape]);
                         $insertuser=DB::table('usr')->insert(['login'=>$email, 'email'=>$email, 'password'=>$password,'foto'=>$loca ,'ci_per'=>$ci,'telefono'=>$tel]);

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
        }else{
            if($prueba < 1 || $prueba1<1){
                if ($prueba<1) {
                    if ($prueba1<1) {
                     if($password==$passwordR){
                         $insertpersona=DB::table('persona')->insert(['ci'=>$ci, 'nombre'=>$name, 'apepa'=>$last_name,'apema'=>$last_ape]);
                         $insertuser=DB::table('usr')->insert(['login'=>$email, 'email'=>$email, 'password'=>$password,'ci_per'=>$ci,'telefono'=>$tel]);

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

    }
    public function insertar2(Request $request,$id){
        $this->validate(
            $request,
            [
                'name' =>'required|string|max:255',
                'apelliP'=>'required|string|max:255',
                'apelliM'=>'required|string|max:255',
                'CI'=>'required|digits_between:6,12',
                'email' => 'required|string|email|max:255|unique:usr,email',
                'telefono' =>'required|digits_between:6,12',
                'password' => 'required|string:password_confirmation|min:6|confirmed',
                'Foto' => 'image'
            ] );

            $name=$request->input('name');
            $last_name=$request->input('apelliP');
            $last_ape=$request->input('apelliM');
            $ci = $request->input('CI');
            $email=$request->input('email');
            $tel=$request->input('telefono');
            $pas=$request->input('password');
            $password=sha1($pas);
            $pass=$request->input('password_confirmation');
            $passwordR=sha1($pass);
            $ids=$id;
            $prueba=DB::table('usr')->where('usr.ci_per','=',$ci)->count();
            $prueba1=DB::table('usr')->where('usr.email','=',$email)->count();
            $ina=request()->except('_token');
                //dd($request->file('Foto'));
            if(!empty($ina['Foto'])){

                //dd($request->file('Foto'));
                $loca=$ina['Foto']->store('uploads','public');
              if($prueba < 1 || $prueba1<1){
                if ($prueba<1) {
                    if ($prueba1<1) {
                     if($password==$passwordR){
                         $insertpersona=DB::table('persona')->insert(['ci'=>$ci, 'nombre'=>$name, 'apepa'=>$last_name,'apema'=>$last_ape]);
                         $insertuser=DB::table('usr')->insert(['login'=>$email, 'email'=>$email, 'password'=>$password,'foto'=>$loca ,'ci_per'=>$ci,'telefono'=>$tel]);

                         //$rol = rol ::where('rol.id_rol', '=',1)->select('id_rol') ->get();
                         //$usr = usr::where('usr.ci_per','=', $ci)->select('id_usr')->get();
                         $getuser = DB::table('usr')->where('usr.ci_per', '=', $ci)->select('id_usr', 'email', 'password')->get();
                         //return $insertpersona." user".$insertuser."get ".$getuser;
                         $id=Usr::where('ci_per','=',$ci )->pluck('id_usr');
                         foreach ($getuser as $key => $value) {
                             DB::table('usr_rol')->insert(['usr_id'=>$value->id_usr, 'rol_id'=>$ids]);
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
        }else{
            if($prueba < 1 || $prueba1<1){
                if ($prueba<1) {
                    if ($prueba1<1) {
                     if($password==$passwordR){
                         $insertpersona=DB::table('persona')->insert(['ci'=>$ci, 'nombre'=>$name, 'apepa'=>$last_name,'apema'=>$last_ape]);
                         $insertuser=DB::table('usr')->insert(['login'=>$email, 'email'=>$email, 'password'=>$password,'ci_per'=>$ci,'telefono'=>$tel]);

                         //$rol = rol ::where('rol.id_rol', '=',1)->select('id_rol') ->get();
                         //$usr = usr::where('usr.ci_per','=', $ci)->select('id_usr')->get();
                         $getuser = DB::table('usr')->where('usr.ci_per', '=', $ci)->select('id_usr', 'email', 'password')->get();
                         //return $insertpersona." user".$insertuser."get ".$getuser;
                         $id=Usr::where('ci_per','=',$ci )->pluck('id_usr');
                         foreach ($getuser as $key => $value) {
                             DB::table('usr_rol')->insert(['usr_id'=>$value->id_usr, 'rol_id'=>$ids]);
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

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function info()
    {
        if(session()->get('id') ?? ''){
            $maxs=Rol::max('id_rol');
            if(session()->get('user_rol')->first()<=$maxs){

                $id=session()->get('id')->first();
                $users=DB::table('usr')->join('persona', 'ci_per', 'ci')->join(
                    'usr_rol',
                    'id_usr',
                    'usr_id'
                )->join('rol', 'id_rol', 'rol_id')->where('usr.id_usr','=',$id)->select(
                     'usr.id_usr',
                     'persona.nombre',
                     'persona.apepa',
                     'persona.apema',
                     'persona.ci',
                     'usr.login',
                     'usr.email',
                     'rol.ro',
                     'usr.foto',
                     'usr.telefono'
                 )->first();
        return view('iditU.infoP',compact('users'));

            }else
            return redirect()->route('login')
            ->with('info');

        }else return redirect()->route('login')
        ->with('info');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Usr  $usr
     * @return \Illuminate\Http\Response
     */
    public function editarUs( $id)
    {

        if(session()->get('id') ?? ''){
            $maxs=Rol::max('id_rol');
            if(session()->get('user_rol')->first()<=$maxs){
                $idus=session()->get('user_rol');
         if($idus[0] == 1){
            $rols=DB::table('rol')->where('rol.id_rol', '>', 1)-> select('id_rol', 'ro')->get();
           }
           else{
            $rols=DB::table('rol')->where('rol.id_rol', '>', 2)-> select('id_rol', 'ro')->get();
           }

           $ids=$id;

                $users=DB::table('usr')->join('persona', 'ci_per', 'ci')->join(
                    'usr_rol',
                    'id_usr',
                    'usr_id'
                )->join('rol', 'id_rol', 'rol_id')->where('usr.id_usr','=',$ids)->select(
                     'usr.id_usr',
                     'persona.nombre',
                     'persona.apepa',
                     'persona.apema',
                     'persona.ci',
                     'usr.login',
                     'usr.email',
                     'usr.telefono',
                     'rol.ro',
                     'usr.foto'
                 )->first();

                return view('iditU.editU',compact('users','rols'));

            }else
            return redirect()->route('login')
            ->with('info');

        }else return redirect()->route('login')
        ->with('info');

    }
    public function editarU(Request $request,$id){

        if(session()->get('id')??''){

            $this->validate(
                $request,
                [   'foto'=>'image',
                    'name' =>'required|string|max:255',
                    'lastN'=>'required|string|max:255',
                    'lastM'=>'required|string|max:255',
                    'login'=>'required|string|max:255',
                    'email' => 'required|string|email|max:255',
                    'telefono'=>'required|digits_between:6,12'
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
                $tel=$request->input('telefono');
                $ina=request()->except('_token');

                if(!empty($ina['Foto'])){

                    $loca=$ina['Foto']->store('uploads','public');
                    if($ema[0]==$email[0]){
                        $per=Persona::where('ci','=',$ci[0])->update(['nombre'=>$name,'apepa'=>$last_name,'apema'=>$last_ape]);
                        $usr=DB::table('usr')->where('id_usr','=',$user)->update(['login'=>$login,'foto'=>$loca,'telefono'=>$tel]);


                        return back()->with('Mensaje', 'La Informacion fue actualizado');

                     }else{
                        $count=Usr::where('email','=',$email)->count();
                        if($count>0){

                            return back()->with('Mensaje', 'El correo ya existe');

                        }else{
                            $per=Persona::where('ci','=',$ci[0])->update(['nombre'=>$name,'apepa'=>$last_name,'apema'=>$last_ape]);
                            $usr=Usr::where('id_usr','=',$user)->update(['login'=>$login,'email'=>$email,'foto'=>$loca,'telefono'=>$tel]);
                            $reset=DB::table('password_resets')->where('id_us','=',$user)->update(['email'=>$email]);

                            return back()->with('Mensaje', 'La Informacion fue actualizado');

                        }
                     }

                }else{
                    if($ema[0]==$email[0]){
                        $per=Persona::where('ci','=',$ci[0])->update(['nombre'=>$name,'apepa'=>$last_name,'apema'=>$last_ape]);
                        $usr=DB::table('usr')->where('id_usr','=',$user)->update(['login'=>$login,'telefono'=>$tel]);


                        return back()->with('Mensaje', 'La Informacion fue actualizado');

                     }else{
                        $count=Usr::where('email','=',$email)->count();
                        if($count>0){

                            return back()->with('Mensaje', 'El correo ya existe');

                        }else{
                            $per=Persona::where('ci','=',$ci[0])->update(['nombre'=>$name,'apepa'=>$last_name,'apema'=>$last_ape]);
                            $usr=Usr::where('id_usr','=',$user)->update(['login'=>$login,'email'=>$email,'telefono'=>$tel]);
                            $reset=DB::table('password_resets')->where('id_us','=',$user)->update(['email'=>$email]);

                            return back()->with('Mensaje', 'La Informacion fue actualizado');

                        }
                     }


                }


        }else {
            return redirect()->route('login') ->with('info');
         }

    }

    public function editarPas(Request $request,$id){

        $this->validate(
            $request,
            [
                'old_password'=>'required|string|max:255',
                'password' => 'required|string:password_confirmation|min:6|confirmed'

            ] );

                $pasw1=$request->input('old_password');
                $pasw=sha1($pasw1);
                $newpas1=$request->input('password');
                $newpas=sha1($newpas1);
                $confir1=$request->input('password_confirmation');
                $confir=sha1($confir1);
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usr  $usr
     * @return \Illuminate\Http\Response
     */
    public function editUs(Request $request,$edit)
    {
        $this->validate(
            $request,
            [
                'name' =>'required|string|max:255',
                'apelliP'=>'required|string|max:255',
                'apelliM'=>'required|string|max:255',
                'Login'=>'required|string|max:255',
                'email' => 'required|string|email|max:255',
                'telefono'=>'required|digits_between:6,12',
                'rol'=>'required|integer',
/*                 'password' => 'string:password_confirmation|min:6|confirmed'
 */
                ] );

                $name=$request->input('name');
                $last_name=$request->input('apelliP');
                $last_ape=$request->input('apelliM');
                //$ci = $request->input('ci');
                $login=$request->input('Login');
                $ema=$request->input('email');
                $tel=$request->input('telefono');
                $idr=$edit;
                $rol=$request->input('rol');
                /* $passw=$request->input('password');
                $conf=$request->input('password_confirmation'); */

        if(session()->get('id') ?? ''){
            $maxs=Rol::max('id_rol');
            if(session()->get('user_rol')->first()<=$maxs){

                $ci=DB::table('usr')->join('persona','ci','ci_per')->where('usr.id_usr','=',$idr)->pluck('persona.ci');
                $email=DB::table('usr')->join('persona','ci','ci_per')->where('usr.id_usr','=',$idr)->pluck('usr.email');

                if($ema==$email[0]){
                    $per=Persona::where('ci','=',$ci[0])->update(['nombre'=>$name,'apepa'=>$last_name,'apema'=>$last_ape]);
                    $usr=DB::table('usr')->where('id_usr','=',$idr)->update(['login'=>$login, 'telefono'=>$tel]);


                    return back()->with('Mensaje', 'La Informacion fue actualizado');

                 }else{
                    $count=Usr::where('email','=',$email)->count();
                    if($count>0){

                        return back()->with('Mensaje', 'El correo ya existe');

                    }else{
                        $per=Persona::where('ci','=',$ci[0])->update(['nombre'=>$name,'apepa'=>$last_name,'apema'=>$last_ape]);
                        $usr=Usr::where('id_usr','=',$idr)->update(['login'=>$login,'email'=>$email,'telefono'=>$tel]);
                        $reset=DB::table('password_resets')->where('id_us','=',$idr)->update(['email'=>$email]);

                        return back()->with('Mensaje', 'La Informacion fue actualizado');

                    }
                 }


            }else
            return redirect()->route('login')
            ->with('info');

        }else return redirect()->route('login')
        ->with('info');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usr  $usr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usr $usr)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usr  $usr
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usr $usr)
    {
        //
    }
}
