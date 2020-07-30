@extends('layouts.appl', ['activePage' => 'user-management', 'titlePage' => __(' Lista de Empleados ')])
@section('content')
 <div class="main-content">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-calendar bg-blue"></i>
                        <div class="d-inline">
                            <h5>Editar Informacion De La Via</h5>
                            <span>Modificar la informacion de la via</span>
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
                            <li class="breadcrumb-item active" aria-current="page">Lista De Vias</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="col-xl-12 col-lg-6 col-md-12">
            <div class="col-md-8">
                <div class="card" style="min-height: 484px;">
                    <div class="card-header"><h3>Formulario De Registros</h3></div>
                    <div class="row">
                        <div class="col-md-10 text-right">
                            <a href="{{ route('list_vias') }}"  class="btn btn-sm btn-primary">{{ __('Volver a Lista') }}</a>
                        </div>
                      </div>    
                    <div class="card-body">

                            <form method="post" action="{{ route('viaedit',$via->id_via) }}"  autocomplete="off" class="form-horizontal">
                                @csrf
                                @method('put')
                                
                                  <div class="card-body ">
                                  
                                  <div class="row">
                                      <label class="col-sm-3 col-form-label">{{ __('Nombre de Via') }}</label>
                                      <div class="col-sm-9">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                          <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="nomV" id="input-name" type="text" placeholder="{{ __('Nombre de Via') }}" value="{{ old('nomV',$via->nomvia) }}" required="true" aria-required="true"/>
                                          @if ($errors->has('name'))
                                            <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                          @endif
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <label class="col-sm-3 col-form-label">{{ __('Departamento') }}</label>
                                      <div class="col-sm-9">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
      {{--                                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="dep" id="input-name" type="text" placeholder="{{ __('Seleccione el Departamento') }}" value="{{ old('dep',$via->nomb) }}" required="true" aria-required="true" list="input-list"/>
       --}}                             <select name="dep" id="input-list" class="form-control" required="true" aria-required="true">
                                              @foreach($dep as $de)
                                              <option value="{{$de->nomb}}" > {{$de->nomb}} </option>
                                              @endforeach
                                        </select>
                                          @if ($errors->has('name'))
                                            <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                          @endif
                                        </div>
                                      </div>
                                    </div>
      
                                    <div class="row">
                                      <label class="col-sm-3 col-form-label">{{ __('Ciudad') }}</label>
                                      <div class="col-sm-9">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                           <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="ciudad" id="input-name" type="text" placeholder="{{ __('Ciudad') }}" value="{{ old('ciudad',$via->nombc) }}" required="true" aria-required="true" list="input-names"/>
                                           <datalist id=input-names >
                                              @foreach($ciud as $ci)
                                              <option value="{{$ci->nombc}}" > {{$ci->nombc}} </option>
                                              @endforeach
                                          </datalist>
                                          @if ($errors->has('name'))
                                            <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                          @endif
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <label class="col-sm-3 col-form-label">{{ __('Dimencion') }}</label>
                                      <div class="col-sm-9">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                          <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="dime" id="input-name" type="text" placeholder="{{ __('Dimencion') }}" value="{{ old('dime',$via->dimension) }}" required="true" aria-required="true" />
                                          @if ($errors->has('name'))
                                            <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                          @endif
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <label class="col-sm-3 col-form-label">{{ __('Numero de Carriles') }}</label>
                                      <div class="col-sm-9">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                          <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="carri" id="input-name" type="text" placeholder="{{ __('Numero de Carriles') }}" value="{{ old('carri',$via->nuncarril) }}" required="true"
                                          />
                                          @if ($errors->has('name'))
                                            <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                          @endif
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <label class="col-sm-3 col-form-label">{{ __('Clasificacion') }}</label>
                                      <div class="col-sm-9">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
      {{--                                     <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="clasi" id="input-name" type="text" placeholder="{{ __('Clasificacion') }}" value="{{ old('clasi',$via->clacificacion) }}" required="true" aria-required="true" list="list_vial"/>
       --}}                                  <select id="list_vial" class="form-control" name="clasi">
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
                                    <div class="row">
                                      <label class="col-sm-3 col-form-label">{{ __('Tipo de via') }}</label>
                                      <div class="col-sm-9">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
      {{--                                     <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="tipo" id="input-name" type="text" placeholder="{{ __('Seleccionar Tipo') }}" value="{{ old('tipo',$via->tipo) }}" required="true" aria-required="true" list="dire"/>
       --}}                                    <select id="dire" class="form-control" name="tipo">
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
                                      <button type="submit" class="btn btn-primary">{{ __('Editar Via') }}</button>
                                    </div>
      
                              </form>
                </div>
            </div>
        </div>       
    </div>
  </div>
 @endsection
