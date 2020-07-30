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
                            <h5>Añadir Vehiculo</h5>
                            <span>Formulario de registro de nuevos Tipos de Vehiculos</span>
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
                                <a href="../index.html"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">Apps</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Registro de Vehiculos</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div  class="row">
            <div class="col-md-8">
                <div class="card">
                        <div class="card-header"><h3>Formulario De Registros De Vehiculos</h3></div>

                            <div class="col-md-12 text-right">
                                <a href="{{ route('list_vehic') }}"  class="btn btn-sm btn-primary">{{ __('Volver a Lista') }}</a>
                            </div>

                        <div class="card-body">
                                <div class="form-panel">
                                    <div class="form">
                                      <form method="post" action="{{route('vehinsert')}}" autocomplete="off" class="cmxform form-horizontal style-form" id="signupForm" method="get" action=""
                                      enctype="multipart/form-data">
                                        @csrf
                                        @method('post')
                                        <div class="card-body ">

                                            <div class="row">
                                                <label class="col-sm-3 col-form-label">{{ __('Categoria de Vehi.') }}</label>
                                                <div class="col-sm-9">
                                                  <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                                    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="clasi" id="input-name" type="text" placeholder="{{ __('Categoria de Vehiculo') }}" value="{{ old('clasi') }}" required="true" aria-required="true"/>
                                                    @if ($errors->has('name'))
                                                      <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                                    @endif
                                                  </div>
                                                </div>
                                              </div>

                                              <div class="row">
                                                <label class="col-sm-3 col-form-label">{{ __('Promedio De Peso Inicial') }}</label>
                                                <div class="col-sm-9">
                                                  <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                                    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="pesoI" id="input-name" type="text" placeholder="{{ __('Peso Inicial') }}" value="{{ old('pesoI') }}" required="true" aria-required="true" />
                                                    @if ($errors->has('name'))
                                                      <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                                    @endif
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="row">
                                                <label class="col-sm-3 col-form-label">{{ __('Promedio De Peso Final') }}</label>
                                                <div class="col-sm-9">
                                                  <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                                    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="pesoF" id="input-name" type="text" placeholder="{{ __('Peso Final') }}" value="{{ old('pesoF') }}" required="true" aria-required="true" />
                                                    @if ($errors->has('name'))
                                                      <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                                    @endif
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="row">
                                                <label class="col-sm-3 col-form-label">{{ __('Ditancia Inicial') }}</label>
                                                <div class="col-sm-9">
                                                  <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                                    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="distanciaI" id="input-name" type="text" placeholder="{{ __('Distancia Inicial') }}" value="{{ old('distanciaI') }}" required="true"/>
                                                    @if ($errors->has('name'))
                                                      <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                                    @endif
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="row">
                                                <label class="col-sm-3 col-form-label">{{ __('Ditancia Final') }}</label>
                                                <div class="col-sm-9">
                                                  <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                                    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="distanciaF" id="input-name" type="text" placeholder="{{ __('Distancia Final') }}" value="{{ old('distanciaF') }}" required="true"/>
                                                    @if ($errors->has('name'))
                                                      <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                                    @endif
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="row">
                                                <label class="col-sm-3 col-form-label">{{ __('Estado') }}</label>
                                                <div class="col-sm-9">
                                                  <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                                    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="estado" id="input-name" type="text" placeholder="{{ __('Seleccionar Tipo') }}" value="{{ old('estado') }}" required="true" aria-required="true" list="dire"/>
                                                    <datalist id="dire">
                                                        <option value="Desactivado">Desactivado</option>
                                                        <option value="Activo">Activo</option>
                                                    </datalist>
                                                    @if ($errors->has('name'))
                                                      <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                                    @endif
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="row">
                                                <label class="col-sm-3 col-form-label">{{ __('Añadir Imagen') }}</label>
                                                   <div class="col-sm-9">
                                                      <div class="form-group">
                                                          <input type="file" name="Foto" id="Foto" class="default" value=""/>

                                                      </div>
                                                   </div>
                                                </div>
                                    <div class="card-footer ml-auto mr-auto">
                                        <button type="submit" class="btn btn-primary">{{ __('Añadir Via') }}</button>
                                    </div>
                                      </form>
                                    </div>
                                  </div>                    </div>
                </div>
            </div>

        </div>
    </div>
  </div>
 @endsection
