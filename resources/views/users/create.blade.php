@extends('layouts.appl', ['activePage' => 'user-management', 'titlePage' => __(' Añadir Ciudad ')])

 @section('content')
 <div class="main-content">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-calendar bg-blue"></i>
                        <div class="d-inline">
                            <h5>Añadir Usuario</h5>
                            <span>Formulario de registro de nuevos Usuarios</span>
                            <br>
                            <br>
                            <h6> </h6>
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
                                <a href="#">Apps</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Registro</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div  class="row">
            <div class="col-md-8">
                <div class="card">
                        <div class="card-header"><h3>Formulario De Registros</h3></div>
                         <div class="col-md-8 text-right">
                            @if($rol==2)
                                 <a href="{{route('list_ad')}}" class="btn btn-sm btn-primary">{{ __('Volver a Lista Admin.') }}</a>
                            @endif
                           @if($rol==3)
                           <a href="{{route('list_em')}}" class="btn btn-sm btn-primary">{{ __('Volver a Lista Emp.') }}</a>

                            @endif
                            @if($rol==4)
                            <a href="{{route('list')}}" class="btn btn-sm btn-primary">{{ __('Añadir Usua.') }}</a>

                            @endif
                         </div>
                        <div class="card-body">
                                <form method="post" action="{{route('insertar2',$rol)}}" autocomplete="off" class="cmxform form-horizontal style-form" id="signupForm" method="get" action=""
                              enctype="multipart/form-data">

                              @csrf
                                @method('post')
                                 <div class="form-group row">
                                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">{{ __('Nombres') }}</label>
                                        <div class="col-sm-9">
                                          <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Nombre') }}" value="{{ old('name') }}" minlength="4" maxlength="25" required="true" aria-required="true"/>
                                            @if ($errors->has('name'))
                                              <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                            @endif
                                          </div>
                                        </div>
                                        </div>

                                      <div class="form-group row">
                                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">{{ __('Apellido Pat.') }}</label>
                                        <div class="col-sm-9">
                                          <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="apelliP" id="input-name" type="text" placeholder="{{ __('Apellido Paterno') }}" value="{{ old('name') }}" required="true" minlength="4" maxlength="25" minlength="4" maxlength="25" aria-required="true"/>
                                            @if ($errors->has('name'))
                                              <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                            @endif
                                          </div>
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">{{ __('Apellido Mat.') }}</label>
                                        <div class="col-sm-9">
                                          <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="apelliM" id="input-name" type="text" placeholder="{{ __('Apellido Materno') }}" value="{{ old('name') }}" required="true" minlength="4" maxlength="25" aria-required="true"/>
                                            @if ($errors->has('name'))
                                              <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                            @endif
                                          </div>
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">{{ __('CI') }}</label>
                                        <div class="col-sm-9">
                                          <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="CI" id="input-name" type="text" patter="" placeholder="{{ __('Numero De Cedula De Identidad') }}" value="{{ old('CI') }}" required="true"  aria-required="true"/>
                                            @if ($errors->has('name'))
                                              <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                            @endif
                                          </div>
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">{{ __('Email') }}</label>
                                        <div class="col-sm-9">
                                          <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="email" placeholder="{{ __('Email') }}" value="{{ old('email') }}" minlength="4" maxlength="25" required />
                                            @if ($errors->has('email'))
                                              <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                                            @endif
                                          </div>
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">{{ __('Num. Telefonico') }}</label>
                                        <div class="col-sm-9">
                                          <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="telefono" id="input-name" type="text" placeholder="{{ __('Numero Telefonico o Celular') }}" value="{{ old('telefono') }}" required="true" minlength="6" maxlength="9" aria-required="true"/>
                                            @if ($errors->has('name'))
                                              <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                            @endif
                                          </div>
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label" for="input-password">{{ __(' Password') }}</label>
                                        <div class="col-sm-9">
                                          <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" input type="password" name="password" id="input-password" placeholder="{{ __('Password') }}" value="" minlength="4" maxlength="25" required />
                                            @if ($errors->has('password'))
                                              <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('password') }}</span>
                                            @endif
                                          </div>
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label" for="input-password-confirmation">{{ __('Confirm Password') }}</label>
                                        <div class="col-sm-9">
                                          <div class="form-group">
                                            <input class="form-control" name="password_confirmation" id="input-password-confirmation" type="password" placeholder="{{ __('Confirm Password') }}" value="" minlength="4" maxlength="25" required />
                                          </div>
                                        </div>
                                      </div>
                            <div class="form-group">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Seleccionar Imagen</label>
                                <input type="file" name="Foto" class="file-upload-default">
                                <div class="input-group col-xs-9">
                                    <input type="text" class="form-control file-upload-info" disabled placeholder="Nombre">
                                    <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Buscar</button>
                                    </span>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mr-1">Enviar</button>
                            <button class="btn btn-light">Cancelar</button>
                        </form>
                                        </div>
                </div>
            </div>

        </div>
    </div>
  </div>
 @endsection
