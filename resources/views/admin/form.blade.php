@extends('layouts.appl', ['activePage' => 'user-management', 'titlePage' => __('Añadir Usuario')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('user.store') }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('post')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Añadir Nuevo Usuario') }}</h4>
                <p class="card-category"></p>
              </div>
                <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('user.index') }}" class="btn btn-sm btn-primary">{{ __('Volver a Lista') }}</a>
                  </div>
                </div>
                <div class="row ">
                    {{--  <p class="card-description text-center">{{ __('') }}</p>  --}}
                    <div class="bmd-form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                              {{-- <i class="material-icons">face</i> --}}
                          </span>
                        </div>
                        <input type="text" name="name" class="form-control" placeholder="{{ __('Nombre...') }}" value="{{ old('name') }}" maxlength="20" minlength="4" required>
                      </div>
                      @if ($errors->has('name'))
                        <div id="name-error" class="error text-danger pl-3" for="name" style="display: block;">
                          <strong>{{ $errors->first('name') }}</strong>
                        </div>
                      @endif
                    </div>
                    <div class="bmd-form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                              {{-- <i class="material-icons">face</i> --}}
                          </span>
                        </div>
                        <input type="text" name="last_name" class="form-control" placeholder="{{ __('Apellido Paterno...') }}" value="{{ old('last_name') }}" maxlength="20" minlength="4" required>
                      </div>
                      @if ($errors->has('name'))
                        <div id="name-error" class="error text-danger pl-3" for="name" style="display: block;">
                          <strong>{{ $errors->first('name') }}</strong>
                        </div>
                      @endif
                    </div>
                    <div class="bmd-form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                              {{-- <i class="material-icons">face</i> --}}
                          </span>
                        </div>
                        <input type="text" name="last_ape" class="form-control" placeholder="{{ __('Apellido Materno...') }}" value="{{ old('last_ape') }}" maxlength="20" minlength="4" required>
                      </div>
                      @if ($errors->has('name'))
                        <div id="name-error" class="error text-danger pl-3" for="name" style="display: block;">
                          <strong>{{ $errors->first('name') }}</strong>
                        </div>
                      @endif
                    </div>
                    <div class="bmd-form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                              {{-- <i class="material-icons">face</i> --}}
                          </span>
                        </div>
                        <input type="text" name="ci" class="form-control" placeholder="{{ __('CI...') }}" value="{{ old('ci') }}" maxlength="15" minlength="7" required pattern="[A-Za-z-0-9]{7,10}"
                        title="codigo con 7 a 15 digitos">
                      </div>
                      @if ($errors->has('name'))
                        <div id="name-error" class="error text-danger pl-3" for="name" style="display: block;">
                          <strong>{{ $errors->first('name') }}</strong>
                        </div>
                      @endif
                    </div>

                    <div class="bmd-form-group{{ $errors->has('email') ? ' has-danger' : '' }} mt-3">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            {{-- <i class="material-icons">email</i> --}}
                          </span>
                        </div>
                        <input type="email" name="email" class="form-control" placeholder="{{ __('Email...') }}" value="{{ old('email') }}" required>
                      </div>
                      @if ($errors->has('email'))
                        <div id="email-error" class="error text-danger pl-3" for="email" style="display: block;">
                          <strong>{{ $errors->first('email') }}</strong>
                        </div>
                      @endif
                    </div>
                    <div class="bmd-form-group{{ $errors->has('password') ? ' has-danger' : '' }} mt-3">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            {{-- <i class="material-icons">lock_outline</i> --}}
                          </span>
                        </div>
                        <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('Contraseña...') }}" required>
                      </div>
                      @if ($errors->has('password'))
                        <div id="password-error" class="error text-danger pl-3" for="password" style="display: block;">
                          <strong>{{ $errors->first('password') }}</strong>
                        </div>
                      @endif
                    </div>
                    <div class="bmd-form-group{{ $errors->has('password_confirmation') ? ' has-danger' : '' }} mt-3">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            {{-- <i class="material-icons">lock_outline</i> --}}
                          </span>
                        </div>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="{{ __('Confirmar contraseña...') }}" required>
                      </div>
                      @if ($errors->has('password_confirmation'))
                        <div id="password_confirmation-error" class="error text-danger pl-3" for="password_confirmation" style="display: block;">
                          <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </div>
                      @endif
                    </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Add User') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
