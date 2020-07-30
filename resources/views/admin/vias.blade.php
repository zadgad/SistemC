@extends('layouts.appl', ['activePage' => 'user-management', 'titlePage' => __('Lista de Vias ')])

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
                            <span>Formulario de registro de nuevas Vias en el Sistema</span>
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
                            <li class="breadcrumb-item active" aria-current="page">Registro de Vias</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

            <div class="col-xl-12 col-lg-6 col-md-12">
                <div class="col-md-8">
                    <div class="card" style="min-height: 484px;">
                        <div class="card-header"><h3>Formulario De Registros De Vias</h3></div>
                            <div class="card-body">
                                <form class="forms-sample">
                                    <div class="form-group row">
                                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nombre de Via</label>
                                           <div class="col-sm-9">
                                                <input type="text" class="form-control is-valid" id="exampleInputUsername2" placeholder="Nombre">
                                           </div>
                             </div>
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Departamento</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control is-valid" id="exampleInputUsername2" placeholder="Ingresar Departamento">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Provincia o Ciudad</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control is-valid" id="exampleInputUsername2" placeholder="Provincia o Ciudad">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Dimencion</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control is-valid" id="exampleInputUsername2" placeholder="Dimencion">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Numero de Carriles</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control is-valid" id="exampleInputUsername2" placeholder="# de Carril">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">{{ __('Clacificacion') }}</label>
                                <div class="col-sm-7">
                                  <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <input class="form-control is-valid" name="act" id="input-name" type="text" placeholder="{{ __('Activo') }}" value="{{ old('act') }}" required="true" aria-required="true" list="act"/>
                                    <datalist id="act">
                                        <option value="Deshabilitado">Deshabilitado</option>
                                        <option value="Habilitado">Habilitado</option>
                                    </datalist>
                                    @if ($errors->has('name'))
                                      <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                    @endif
                                  </div>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">{{ __('Tipo de Via') }}</label>
                                <div class="col-sm-7">
                                  <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <input class="form-control is-valid" name="act" id="input-name" type="text" placeholder="{{ __('Activo') }}" value="{{ old('act') }}" required="true" aria-required="true" list="act"/>
                                    <datalist id="act">
                                        <option value="Deshabilitado">Deshabilitado</option>
                                        <option value="Habilitado">Habilitado</option>
                                    </datalist>
                                    @if ($errors->has('name'))
                                      <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                    @endif
                                  </div>
                                </div>
                              </div>
                              <button type="submit" class="btn btn-primary mr-2">Enviar</button>
                            <button class="btn btn-light">Cancelar</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
  </div>
 @endsection
