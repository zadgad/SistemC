@extends('layouts.appl', ['activePage' => 'user-management', 'titlePage' => __(' Informacion De Usuario ')])
@section('content')
<div class="main-content">
   <div class="container-fluid">
       <div class="page-header">
           <div class="row align-items-end">
               <div class="col-lg-8">
                   <div class="page-header-title">
                       <i class="ik ik-tablet bg-blue"></i>
                       <div class="d-inline">
                           <h5>Informacion Personal Del Usuario</h5>
                           <span>La informacion debe ser tratada con cuidado por seguridad del sistema</span>
                           <br>
                           <br>
                           <h6></h6>
                       </div>
                   </div>
               </div>
               <div class="col-lg-4">
                   <nav class="breadcrumb-container" aria-label="breadcrumb">
                       <ol class="breadcrumb">
                           <li class="breadcrumb-item">
                               @if(session()->get('user_rol')->first()==1)
                               <a href="{{route('inicio',$id=session()->get('nombre')->first())}}"><i class="ik ik-home"></i></a>
                               @else
                               @if(session()->get('user_rol')->first()!=1)
                               <a href="../index.html"><i class="ik ik-home"></i></a>
                               @endif
                               @endif
                           </li>
                           <li class="breadcrumb-item">
                               <a href="#">Funcion</a>
                           </li>
                           <li class="breadcrumb-item active" aria-current="page">Super Us</li>
                       </ol>
                   </nav>
               </div>
           </div>
       </div>
          <div class="row">
                    <div class="col-lg-4 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center"> 
                                    @if(!empty($users->foto))
                                    <img src="{{Storage::url($users->foto)}}" class="rounded-circle img-150 align-top mr-15" width="150"/>
                                    @else
                                    <img src="{{Storage::url('image.gif')}}" class="rounded-circle img-150 align-top mr-15" width="150"/>
    
                                    @endif
                                    <h4 class="card-title mt-10">{{$users->nombre}} {{$users->apepa}} {{$users->apema}} </h4>
                                    <p class="card-subtitle">{{$users->ro}}</p>
                    
                                </div>
                            </div>
                            <hr class="mb-0"> 
                            <div class="card-body"> 
                                <small class="text-muted d-block">Correo Electronico </small>
                                <h6>{{$users->email}}</h6> 
                                <small class="text-muted d-block pt-10">Tel o Celular</small>
                                <h6>{{$users->telefono}}</h6> 
                                <small class="text-muted d-block pt-10">C.I.</small>
                                <h6>{{$users->ci}}</h6>
                                <small class="text-muted d-block pt-10">Nick</small>
                                <h6>{{$users->login}}</h6>
                                <small class="text-muted d-block pt-30">Social Profile</small>
                                <br/>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-7">
                        <div class="card">
                            <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#last-month" role="tab" aria-controls="pills-profile" aria-selected="false">Editar Informacion</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-setting-tab" data-toggle="pill" href="#previous-month" role="tab" aria-controls="pills-setting" aria-selected="false">Cambiar Contraseña</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade" id="last-month" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <div class="card-body">
                                        <form method="post" action="{{ route('edit',$id=session()->get('id')->first()) }}" autocomplete="off" class="form-horizontal"  enctype="multipart/form-data">
                                            @csrf
                                            @method('put')

                                            <div class="row">
                                                <label class="col-sm-2 col-form-label">{{ __('Cambiar Imagen') }}</label>
                                                   <div class="col-sm-7">
                                                      <div class="form-group">
                                                          <input type="file" name="Foto" id="Foto" class="default" value=""/>

                                                      </div>
                                                   </div>
                                                </div>

                                            <div class="row">
                                                    <label class="col-sm-2 col-form-label">{{ __('Nombre') }}</label>
                                                       <div class="col-sm-7">
                                                         <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                                           <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Nombre') }}" value="{{ old('name', $users->nombre) }}" required="true" aria-required="true"/>
                                                           @if ($errors->has('name'))
                                                             <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                                           @endif
                                                         </div>
                                                       </div>
                                                    </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Apellido Pater') }}</label>
                                    <div class="col-sm-7">
                                      <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="lastN" id="input-name" type="text" placeholder="{{ __('Apellido Paterno') }}" value="{{ old('lastN', $users->apepa) }}" required="true" aria-required="true"/>
                                            @if ($errors->has('name'))
                                            <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                            @endif
                                      </div>
                                    </div>
                                </div>
                                <div class="row">
                                        <label class="col-sm-2 col-form-label">{{ __('Apellido Mater') }}</label>
                                        <div class="col-sm-7">
                                          <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="lastM" id="input-name" type="text" placeholder="{{ __('Apellido Materno') }}" value="{{ old('lastM', $users->apema) }}" required="true" aria-required="true"/>
                                            @if ($errors->has('name'))
                                              <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                            @endif
                                          </div>
                                        </div>
                                </div>
                                <div class="row">
                                        <label class="col-sm-2 col-form-label">{{ __('Login') }}</label>
                                        <div class="col-sm-7">
                                          <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="login" id="input-name" type="text" placeholder="{{ __('Login') }}" value="{{ old('login', $users->login) }}" required="true" aria-required="true"/>
                                            @if ($errors->has('name'))
                                              <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                            @endif
                                          </div>
                                        </div>
                                </div>
                                <div class="row">
                                        <label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                                        <div class="col-sm-7">
                                            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="email" placeholder="{{ __('Email') }}" value="{{ old('email',$users->email) }}" required />
                                                @if ($errors->has('email'))
                                                <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Num. Telefonico') }}</label>
                                    <div class="col-sm-7">
                                      <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="telefono" id="input-name" type="text" placeholder="{{ __('telefono') }}" value="{{ old('lastM', $users->telefono) }}" required="true" aria-required="true"/>
                                        @if ($errors->has('name'))
                                          <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                        @endif
                                      </div>
                                    </div>
                            </div>
                                <div class="card-footer ml-auto mr-auto">
                                  <button type="submit" class="btn btn-primary">{{ __('Editar') }}</button>
                               </div>
                              </form>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
                                    <div class="card-body">
                                        <form method="post" action="{{ route('editP',$id=session()->get('id')->first())}}" autocomplete="off" class="form-horizontal"  enctype="multipart/form-data">
                                            @csrf
                                            @method('put')
                                            <div class="col-sm-12">
                                            <div class="row">
                                                <label class="col-sm-2 col-form-label" for="input-current-password">{{ __('Contraseña Actual') }}</label>
                                                <div class="col-sm-7">
                                                  <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                                    <input class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}" input type="password" name="old_password" id="input-current-password" placeholder="{{ __('Contraseña Actual') }}" value="" required />
                                                    @if ($errors->has('old_password'))
                                                      <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('old_password') }}</span>
                                                    @endif
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-sm-12">
                                              <div class="row">
                                                <label class="col-sm-2 col-form-label" for="input-password">{{ __(' Nueva Contraseña') }}</label>
                                                  <div class="col-sm-7">
                                                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                                      <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" input type="password" name="password" id="input-password" placeholder="{{ __('Contraseña') }}" />
                                                        @if ($errors->has('password'))
                                                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('password') }}</span>
                                                        @endif
                                                    </div>
                                                  </div>
                                            </div>
                                          <div class="row">
                                            <label class="col-sm-2 col-form-label" for="input-password-confirmation">{{ __('Confirmar Contraseña') }}</label>
                                            <div class="col-sm-7">
                                              <div class="form-group">
                                                <input class="form-control" name="password_confirmation" id="input-password-confirmation" type="password" placeholder="{{ __('Confirmar Contraseña') }}" />
                                              </div>
                                            </div>
                                          </div>
                                          <div class="col-sm-">
                                            <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
                                          </div>
                                          </div>
                                        </div>
                                    </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       

    </div>

    </div>
</div>
@endsection

