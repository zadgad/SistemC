@extends('layouts.appl', ['activePage' => 'user-management', 'titlePage' => __(' Añadir Via ')])

 @section('content')



 <div class="main-content">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-calendar bg-blue"></i>
                        <div class="d-inline">
                            <h5>Añadir Via</h5>
                            <span>Registrar Nueva Via En El Sistema</span>
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
                            <li class="breadcrumb-item active" aria-current="page">Registrar Via</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div  class="row">
            <div class="col-md-8">
                <div class="card">
                    <h3 class="card-header">Formulario de Registro</h3>
                    <div class="col-md-6 text-right">
                        <a href="{{ route('list_vias') }}"  class="btn btn-sm btn-primary">{{ __('Volver a Lista') }}</a>

                      </div>

                    <div class="card-block">
                        <div class="form-panel">
                            <div class="col-md-9">
                                <form method="post" action="{{route('viainsert')}}" autocomplete="off" class="cmxform form-horizontal style-form" id="signupForm" method="get" action=""
                                enctype="multipart/form-data">
                                  @csrf
                                  @method('post')
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">{{ __('Nombre de Via') }}</label>
                                            <div class="col-sm-9">
                                              <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                                <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="nomV" id="input-name" type="text" placeholder="{{ __('Nombre de Via') }}" value="{{ old('nomV') }}" required="true" aria-required="true"/>
                                                @if ($errors->has('name'))
                                                  <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                                @endif
                                              </div>
                                            </div>
                                          </div>
                                          <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">{{ __('Departamento') }}</label>
                                            <div class="col-sm-9">
                                              <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
    {{--                                              <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="dep" id="depa" type="text" placeholder="{{ __('Seleccione el Departamento') }}" value="{{ old('dep') }}" required="true" aria-required="true" list="input-list"/>
     --}}                                     <select name="depa" id="depal" class="form-control " required="true" aria-required="true" >
                                                    <option value="">Seleccionar Departamento</option>
                                                    @foreach($dep as $de)
                                                    <option value="{{$de->id_dep}}" > {{$de->nomb}} </option>
                                                    @endforeach
                                              </select>
                                                @if ($errors->has('name'))
                                                  <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                                @endif
                                              </div>
                                            </div>
                                          </div>
                                          <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">{{ __('Ciudad') }}</label>
                                            <div class="col-sm-9">
                                              <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                                <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="ciudad" id="input-name" type="text" placeholder="{{ __('Ciudad') }}" value="{{ old('ciudad') }}" required="true" aria-required="true" list="select-ciu"/>
                                                <datalist  id="select-ciu">
                                                    <option value="" >Seleccionar Ciudad</option>
                                                </datalist>
                                                @if ($errors->has('name'))
                                                  <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                                @endif
                                              </div>
                                            </div>
                                          </div>
                                          <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">{{ __('Dimencion') }}</label>
                                            <div class="col-sm-9">
                                              <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                                <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="dime" id="input-name" type="text" placeholder="{{ __('Dimencion') }}" value="{{ old('dime') }}" required="true" aria-required="true" />
                                                @if ($errors->has('name'))
                                                  <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                                @endif
                                              </div>
                                            </div>
                                          </div>
                                          <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">{{ __('Numero de Carriles') }}</label>
                                            <div class="col-sm-9">
                                              <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                                <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="carri" id="input-name" type="text" placeholder="{{ __('Numero de Carriles') }}" value="{{ old('carri') }}" required="true"
                                                />
                                                @if ($errors->has('name'))
                                                  <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                                @endif
                                              </div>
                                            </div>
                                          </div>
                                          <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">{{ __('Clasificacion') }}</label>
                                            <div class="col-sm-9">
                                              <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
    {{--                                             <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="clasi" id="input-name" type="text" placeholder="{{ __('Clasificacion') }}" value="{{ old('clasi') }}" required="true" aria-required="true" list="list_vial"/>
     --}}                                          <select id="list_vial" class="form-control input-lg" name="clasi">
                                                  <option value="Autopista">Autopista</option>
                                                  <option value="Calle">Calle</option>
                                                  <option value="Avenida">Avenida</option>
                                                  <option value="Carretera">Carretera</option>

                                                </select>
                                                @if ($errors->has('name'))
                                                  <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                                @endif
                                              </div>
                                            </div>
                                          </div>
                                          <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">{{ __('Tipo de via') }}</label>
                                            <div class="col-sm-9">
                                              <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
    {{--                                             <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="tipo" id="input-name" type="text" placeholder="{{ __('Seleccionar Tipo') }}" value="{{ old('tipo') }}" required="true" aria-required="true" list="dire"/>
     --}}                                            <select id="dire" class="form-control" name="tipo">
                                                    <option value="Vidireccional">Vidireccional</option>
                                                    <option value="Unidireccional">Unidireccional</option>
                                                    <option value="Multicarril">Multicarril</option>
                                                </select>
                                                @if ($errors->has('name'))
                                                  <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                                @endif
                                              </div>
                                            </div>
                                          </div>

                                      <div class="card-footer ml-auto mr-auto">
                                        <button type="submit" class="btn btn-primary">{{ __('Añadir Via') }}</button>
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
 @endsection

 @section('scripts')
 <script language="JavaScript" type="text/javascript" src="{{ asset('proyect')}}./js/select/ciud.js"></script>

 @endsection

