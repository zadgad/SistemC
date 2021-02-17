@extends('layouts.appl', ['activePage' => 'user-management', 'titlePage' => __(' Lista de Sensores ')])
@section('content')
 <div class="main-content">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-calendar bg-blue"></i>
                        <div class="d-inline">
                            <h5>Lista de Sensores</h5>
                            <span>Informacion de los Sensores registrados en sistema</span>
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
                            <li class="breadcrumb-item active" aria-current="page">Lista Sensores</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
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
                            <th class="text-center">
                                #
                              </th>
                                <th class="text-center">
                                  Nom-Sensor
                                </th>

                                <th class="text-center">
                                  Estado
                                </th>
                                <th class="text-center">
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
                                        <td class="text-center">
                                            {{$loop->iteration}}
                                        </td>
                                      <td class="text-center">
                                        {{ $in->nombre }}
                                      </td>
                                      <td class="text-center">
                                        {{ $in->estado }}
                                      </td>
                                      <td class="text-center">
                                        @if($in->activo==0)
                                        <label class="badge badge-danger">Desactivado</label>
                                        @else
                                        <label class="badge badge-primary">Activo</label>
                                        @endif
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

                                            <form action={{-- "{{ route('user.destroy', $user) }}" --}}  method="post">
                                              @csrf
                                              @method('delete')

                                              <a href="{{route('editarSen',$in->id_sensor)}}" class="ik ik-edit f-16 mr-15 text-green"></a>            
                                              <a href=""><i class="ik ik-trash-2 f-16 text-red"></i></a>
                                          </form>

                                        </form>
                                      </td>
                                    </tr>
                                  @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th class="text-center">
                                #
                              </th>
                                <th class="text-center">
                                  Nom-Sensor
                                </th>

                                <th class="text-center">
                                  Estado
                                </th>
                                <th class="text-center">
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
 @endsection
