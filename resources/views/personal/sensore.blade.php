@extends('layouts.app', ['activePage' => 'table', 'titlePage' => __('Lista De Sensores')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Lista De Sensores Registrados</h4>
            <p class="card-category"> Sensores en el sistema</p>
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
            <div class="card">
                <div class="card-header">
                    <h3>Lista de Sensores</h3>
                </div>
                <a href="{{ route('añadirS') }}" class="btn btn-sm btn-primary">{{ __('Añadir Sensor') }}</a>
                <div class="card-body">
                    <div class="dt-responsive">
                        <table id="lang-dt"
                               class="table table-striped table-bordered nowrap">
                            <thead>
                            <tr>
                                <th>
                                    Nom-Sensor
                                  </th>
                                  <th>

                                  </th>
                                  <th>
                                    Estado
                                  </th>
                                  <th>
                                    Activo
                                  </th>
                                  <th class="text-right">
                                    {{ __('Accion') }}
                                  </th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($ins as $in)
                                <tr>
                                  <td>
                                    {{ $in->nombre }}
                                  </td>
                                  <td>
                                    {{ $in->estado }}
                                  </td>
                                  <td>
                                    {{ $in->activo }}
                                  </td>

                                  <td class="td-actions text-right">
                                    {{-- @if ($user->id != auth()->id())

                                    @else
                                      <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('profile.edit') }}" data-original-title="" title="">
                                        <i class="material-icons">editar</i>
                                        <div class="ripple-container"></div>
                                      </a>
                                    @endif --}}
                                    <form action={{-- "{{ route('user.destroy', $user) }}" --}} method="post">
                                        @csrf
                                        @method('delete')

                                        <a rel="tooltip" class="btn btn-success btn-link" href="{{-- {{ route('editVia', $via->id_via) }} --}}" data-original-title="" title="">
                                          <i class="material-icons">editar</i>
                                          <div class="ripple-container"></div>
                                        </a>
                                        <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''">
                                            <i class="material-icons">borrar</i>
                                            <div class="ripple-container"></div>
                                        </button>
                                    </form>
                                  </td>
                                </tr>
                              @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>
                                    Nom-Sensor
                                  </th>
                                  <th>

                                  </th>
                                  <th>
                                    Estado
                                  </th>
                                  <th>
                                    Activo
                                  </th>
                                  <th class="text-right">
                                    {{ __('Accion') }}
                                  </th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
      </div>

      </div>
    </div>
  </div>
</div>
@endsection
