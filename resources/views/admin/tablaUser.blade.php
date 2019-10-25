@extends('layouts.app', ['activePage' => 'user-management', 'titlePage' => __('Lista de Usuarios')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">{{ __('Usuarios') }}</h4>
                <p class="card-category"> {{ __('Lista usuarios Registrados en el Sistema') }}</p>
              </div>
              <div class="card-body">
                @if (session('status'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                <div class="row">
                  <div class="col-12 text-right">
                    <a href="{{ route('añadir_us') }}" class="btn btn-sm btn-primary">{{ __('Añadir Usuario') }}</a>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                          {{ __('ID') }}
                      </th>
                      <th>
                        {{ __('Nombre') }}
                      </th>
                      <th>
                        {{ __('Apellido Pa.') }}
                      </th><th>
                        {{ __('Apellido Ma') }}
                      </th>
                      <th>
                        {{ __('Login') }}
                      </th>
                      <th>
                        {{ __('Email') }}
                      </th>
                      <th>
                        {{ __('Rol') }}
                      </th>
                      <th class="text-right">
                        {{ __('Actions') }}
                      </th>
                    </thead>
                    <tbody>
                      @foreach($users as $user)
                        <tr>
                          <td>
                            {{ $user->id_usr }}
                          </td>
                          <td>
                            {{ $user->nombre }}
                          </td>
                          <td>
                            {{ $user->apepa }}
                          </td>
                          <td>
                            {{ $user->apema }}
                          </td>
                          <td>
                            {{ $user->login }}
                          </td>
                          <td>
                            {{ $user->email }}
                          </td>
                          <td>
                            {{ $user->ro }}
                          </td>

                          <td class="td-actions text-right">
                            @if ($user->id_usr ??'')
                            <form action={{-- "{{ route('user.destroy', $user) }}"  --}}method="post">
                                  @csrf
                                  @method('delete')

                                  <a rel="tooltip" class="btn btn-success btn-link" href={{-- "{{ route('user.edit', $user) }}" --}} data-original-title="" title="">
                                    <i class="material-icons">editar</i>
                                    <div class="ripple-container"></div>
                                  </a>
                                  <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''">
                                      <i class="material-icons">borrar</i>
                                      <div class="ripple-container"></div>
                                  </button>
                              </form>
                            @else
                              <a rel="tooltip" class="btn btn-success btn-link" href={{-- "{{ route('profile.edit') }}" --}} data-original-title="" title="">
                                <i class="material-icons">editar</i>
                                <div class="ripple-container"></div>
                              </a>
                            @endif
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>


@endsection
