@extends('layouts.app', ['activePage' => 'user-management', 'titlePage' => __('Añadir Sensor')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('insertS') }}"  autocomplete="off" class="form-horizontal">
            @csrf
            @method('post')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Registrar sensores') }}</h4>
                <p class="card-category"></p>
              </div>
                <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('list_senores') }}"  class="btn btn-sm btn-primary">{{ __('Volver a Lista') }}</a>
                  </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Nombre Del Sensor') }}</label>
                    <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="nomb" id="input-name" type="text" placeholder="{{ __('Nombre del Sensor') }}" value="{{ old('nomb') }}" required="true" aria-required="true"/>
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
                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="estado" id="input-name" type="text" placeholder="{{ __('Seleccionar Estado') }}" value="{{ old('estado') }}" required="true" aria-required="true" list="dire"/>
                        <datalist id="dire">
                            <option value="Reparacion">En Reparacion</option>
                            <option value="Pausado">En Pausa</option>
                            <option value="Desactivado">Desactivado</option>
                            <option value="Activo">Activado</option>

                        </datalist>
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
                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="act" id="input-name" type="text" placeholder="{{ __('Activo') }}" value="{{ old('act') }}" required="true" aria-required="true" list="act"/>
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
            </div>
            <div class="card-footer ml-auto mr-auto">
              <button type="submit" class="btn btn-primary">{{ __('Añadir Sensor') }}</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
