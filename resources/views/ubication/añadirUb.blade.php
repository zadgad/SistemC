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
                            <h5>Lista de Ubicacion</h5>
                            <span>Informacion de las Ubicaciones registrados en sistema</span>
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
                            <li class="breadcrumb-item active" aria-current="page">Lista Ubicaciones</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div  class="row">
            <div class="col-md-8">
                <div class="card">
                <div class="card-header"><h3>Formulario De Registros de Ubicacion</h3></div>
                <div class="col-md-8 text-right">
                        <a href="{{ route('listUbication') }}"  class="btn btn-sm btn-primary">{{ __('Volver a Lista') }}</a>
                    </div>

                <div class="card-block">

                        <div class="form">
                            <form method="post" action="{{route('insertDates')}}" autocomplete="off" class="cmxform form-horizontal style-form" id="signupForm" method="get" action=""
                            enctype="multipart/form-data"
                            >
                              @csrf
                              @method('post')
                              <div class="form-group row">
                                  <div class="col-md-12 text-right">
                                  </div>
                                </div>
                              <div class="form-group row">
                                  <label class="col-sm-3 col-form-label">{{ __('Dispositivo') }}</label>
                                  <div class="col-sm-9">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="sen" id="input-name" type="text" placeholder="{{ __('Dispositivo') }}" value="{{ old('sen') }}" required="true" aria-required="true" list="sen"/>
                                      <datalist id="sen" >
                                          @foreach($sensor as $sen)
                                          <option value="{{$sen->nombre}}" > {{$sen->nombre}} </option>
                                          @endforeach
                                    </datalist>
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label class="col-sm-3 col-form-label" >{{ __('Departamento') }}</label>
                                  <div class="col-sm-9">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
  {{--                                     <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="depa" id="input-name" type="text" placeholder="{{ __('Departamento') }}" value="{{ old('depa') }}" required="true" aria-required="true" list="departa"/>
   --}}                                    <select class="form-control" name="depa" id="depal"  required="true" aria-required="true" data-depende="select-ciu">
                                            <option value="">Seleccionar Departamento</option>
                                          @foreach($depa as $de)
                                          <option value="{{$de->id_dep}}" > {{$de->nomb}} </option>
                                          @endforeach
                                    </select>
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label class="col-sm-3 col-form-label">{{ __('Ciudad') }}</label>
                                  <div class="col-sm-9">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                     <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="ciudad" id="ciuds" type="text" placeholder="{{ __('Ciudad') }}" value="{{ old('ciudad') }}" required="true" aria-required="true" list="select-ciu"/>
                                      <datalist name="ciudad" id="select-ciu" class="form-group " required="true" aria-required="true" data-depende="depal" >

                                          <option  value="campo" >Seleccionar Ciudad </option>

                                    </datalist>
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label class="col-sm-3 col-form-label">{{ __('Nom. Via') }}</label>
                                  <div class="col-sm-9">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="vias" id="input-name" type="text" placeholder="{{ __('Via Registrados') }}" value="{{ old('vias') }}" required="true" aria-required="true" list="list_via"/>
                                      <datalist name="vias" id="list_via" class="form-group " required="true" aria-required="true">
                                          @foreach($vias as $via)
                                          <option value="{{$via->nomvia}}" > {{$via->nomvia}} </option>
                                          @endforeach
                                    </datalist>
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label class="col-sm-3 col-form-label">{{ __('Clasificacion') }}</label>
                                  <div class="col-sm-9">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
  {{--                                             <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="clasi" id="input-name" type="text" placeholder="{{ __('Clasificacion') }}" value="{{ old('clasi') }}" required="true" aria-required="true" list="list_vial"/>
  --}}                                          <select id="list_vial" class="form-control" name="clasi" onchange="mostrar()" >
                                        <option value="">Seleccionar Clasificacion</option>
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

                                <div id="entre" class="form-group row" style="display:none;">
                                  <label class="col-sm-3 col-form-label">{{ __('Entre') }}</label>
                                  <div class="col-sm-9">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="info" id="input-name" type="text" placeholder="{{ __('Entre') }}" value="{{ old('info', $aux) }}" required="true" aria-required="true"/>
                                        @if ($errors->has('name'))
                                          <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                  </div>
                                </div>
                                <div id="kilometro" class="form-group row" style="display:none;">
                                  <label class="col-sm-3 col-form-label">{{ __('Kilometro') }}</label>
                                  <div class="col-sm-9">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="info1" id="input-name" type="text" placeholder="{{ __('Kilometro') }}" value="{{ old('info1', $aux1) }}" required="true" aria-required="true"/>
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

                                <div class="form-group row">
                                  <label class="col-sm-3 col-form-label">{{ __('Estado') }}</label>
                                  <div class="col-sm-9">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
  {{--                                     <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="act" id="input-name" type="text" placeholder="{{ __('Activo') }}" value="{{ old('act',$ins->activo) }}" required="true" aria-required="true" list="act"/>
   --}}                                    <select class="form-control" id="act" name="act" id="input-name" type="text">
                                          <option value="Deshabilitado">Deshabilitado</option>
                                          <option value="Habilitado">Habilitado</option>
                                      </select>

                                  </div>
                                  </div>
                                </div>
                              <div class="form-group">
                                  <label for="Foto" class="col-sm-2 col-form-label">{{ __('Seleccionar Imagen') }}</label>
                                  <input type="file" name="Foto" id="Foto" class="default" value=""/>

                              </div>
                              <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                  <button class="btn btn-theme" type="submit">Añadir Ubi</button>
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
 <script language="JavaScript" type="text/javascript">

      function mostrar(){
      var paquet=document.getElementById("list_vial").value;
      if(paquet=="Autopista"||paquet=="Carretera"){
        //alert(paquet);
        $("#kilometro").show("slow");
        $("#entre").hide();

      }
      if((paquet=="Calle"||paquet=="Avenida")){
        //alert(paquet);
        $("#kilometro").hide();
        $("#entre").show("slow");

      }
    }
 </script>
  @endsection
   <script language="JavaScript" type="text/javascript" src="{{ asset('proyect/js/select/ciud.js')}}"></script>

  {{-- @section('scripts')
  <script language="JavaScript" type="text/javascript" src="{{ asset('proyect')}}./js/select/avenidas.js"></script>

 @endsection --}}
