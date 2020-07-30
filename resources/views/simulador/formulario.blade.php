@extends('layouts.appl', ['activePage' => 'user-management', 'titlePage' => __(' Formulario de Simulacion ')])
@section('content')
<div class="main-content">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-calendar bg-blue"></i>
                        <div class="d-inline">
                            <h5>Simulador Generador de Datos </h5>
                            <span>Generar datos para ver el funcionamiento del sistema con Aforo</span>
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
                            <li class="breadcrumb-item active" aria-current="page">Simulador</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div  class="row">
            <div class="col-md-8">
                <div class="card">
                        <div class="card-header"><h3>Simulador De Datos</h3></div>
                       <div class="col-md-4">
                        <p class="centered"><a><img src="{{ asset('proyect') }}./img/material.jpg" class="img-circle" width="200"></a></p>

                       </div>

                            <div class="card-body">
                                <form method="post" action="{{ route('llenarDatos',$idus[0]) }}" autocomplete="off" class="form-horizontal style-form">

                              @csrf
                                @method('post')

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Tamaño de Muestra') }}</label>
                                    <div class="col-sm-7">
                                      <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="numiter" id="input-name" type="text" placeholder="{{ __('Muestra 1000 - 250000') }}" value="{{ old('numiter') }}" required="true" aria-required="true" list="sen"/>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Clasificacion') }}</label>
                                    <div class="col-sm-7">
                                      <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                      <select id="list_vial" class="form-control" name="clasi">
                                          {{-- <option value="0" ></option> vias </option> --}}
                                          <option value="Autopista">Autopista</option>
                                          <option value="Carretera">Carretera</option>
                                          <option value="Calle">Calle</option>
                                          <option value="Avenida">Avenida</option>
                                      </select>
                                        @if ($errors->has('name'))
                                          <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                        @endif
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Tipo de via') }}</label>
                                    <div class="col-sm-7">
                                      <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <select id="dire" class="form-control" name="tipo">
                                            {{-- <option value="0" ></option> tipo </option> --}}
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
                                  <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Intervalo de Fecha') }}</label>

                                        <div class="col-md-7">
                                            <div class="input-group input-large" data-date="01/01/2014" data-date-format="mm/dd/yyyy">
                                              <input type="date" class="form-control" name="from">
                                              <span class="input-group-addon">Al</span>
                                              <input type="date" class="form-control" name="to">
                                            </div>
                                            <span class="help-block">Seleccionar Rango de Fecha</span>
                                          </div>

                                  </div>

                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit"  onclick="cargar()" class="btn btn-primary">{{ __('Generar Datos') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
