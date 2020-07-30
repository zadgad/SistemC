@extends('layouts.appl', ['activePage' => 'user-management', 'titlePage' => __(' Editar Sensores ')])
@section('content')
<div class="main-content">
   <div class="container-fluid">
       <div class="page-header">
           <div class="row align-items-end">
               <div class="col-lg-8">
                   <div class="page-header-title">
                       <i class="ik ik-calendar bg-blue"></i>
                       <div class="d-inline">
                           <h5>Editar Sensor</h5>
                           <span>Formulario para editar la informacion del Sensor en el Sistema</span>
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
                           <li class="breadcrumb-item active" aria-current="page">Editar de Sensor</li>
                       </ol>
                   </nav>
               </div>
           </div>
       </div>
       <div class="col-xl-12 col-lg-6 col-md-12">
        <div class="col-md-8">
            <div class="card" style="min-height: 484px;">
                <div class="card-header"><h3>Formulario de Editar Sensores</h3>

                </div>
                    <div class="card-body">

                        <div class="col-lg-12">
                            <div class="col-md-12 text-right">
                                <a href="{{ route('list_senores') }}" class="btn btn-sm btn-primary">{{ __('Volver Atras') }}</a>
                            </div>
                            <div class="form-panel">
                                <div class="form">
                                    <form method="post" action="{{route('editarD',$id=$ins->id_sensor)}}" autocomplete="off" class="cmxform form-horizontal style-form" id="signupForm" method="get" action=""
                                    enctype="multipart/form-data">
                                      @csrf
                                      @method('put')

                                      <div class="row">
                                          <label class="col-sm-2 col-form-label">{{ __('Nombre Del Sensor') }}</label>
                                          <div class="col-sm-7">
                                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                              <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="nomb" id="input-name" type="text" placeholder="{{ __('Nombre del Sensor') }}" value="{{ old('nomb',$ins->nombre) }}" required="true" aria-required="true"/>
                                              @if ($errors->has('name'))
                                                <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                              @endif
                                            </div>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <label class="col-sm-2 col-form-label">{{ __('Estado') }}</label>
                                          <div class="col-sm-7">
                                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
          {{--                                     <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="estado" id="input-name" type="text" placeholder="{{ __('Seleccionar Estado') }}" value="{{ old('estado',$ins->estado) }}" required="true" aria-required="true" list="dire"/>
           --}}                                    <select class="form-control" id="dire" name="estado" id="input-name" type="text">
                                                  <option value="Reparacion">Reparacion</option>
                                                  <option value="Pausado">Pausa</option>
                                                  <option value="Desactivado">Desactivado</option>
                                                  <option value="Activo">Activado</option>

                                              </select>
                                              @if ($errors->has('name'))
                                                <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                              @endif
                                            </div>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <label class="col-sm-2 col-form-label">{{ __('Activo') }}</label>
                                          <div class="col-sm-7">
                                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
          {{--                                     <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="act" id="input-name" type="text" placeholder="{{ __('Activo') }}" value="{{ old('act',$ins->activo) }}" required="true" aria-required="true" list="act"/>
           --}}                                    <select class="form-control" id="act" name="act" id="input-name" type="text">
                                                  <option value="Deshabilitado">Deshabilitado</option>
                                                  <option value="Habilitado">Habilitado</option>
                                              </select>
                                              @if ($errors->has('name'))
                                                <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                              @endif
                                            </div>
                                          </div>
                                        </div>


                                       <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                          <button class="btn btn-theme" type="submit">Editar</button>
                                        </div>
                                      </div>
                                    </form>
                                  </div>

                            </div>
                            <!-- /form-panel -->
                          </div>
                        </div>
        </div>
    </div>


       </div>
   </div>
 </div>
@endsection
