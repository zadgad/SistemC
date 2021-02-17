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
                            <h5>Lista Tipos de Vehiculos</h5>
                            <span>Informacion de los Vehiculos registrados en sistema</span>
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
                            <li class="breadcrumb-item active" aria-current="page">Lista Vehiculos</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3>Lista de Departamentos</h3>
            </div>
            <a  id="añad_via" style="display: none" href="{{route('añadir_vehi')}}" class="btn btn-sm btn-primary">{{ __('Añadir Vehiculo') }}</a>
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
                                  {{ __('Foto') }}
                            </th>
                              <th class="text-center">
                                Nombre
                              </th>
                              <th class="text-center">
                                Peso Ini
                              </th>
                              <th class="text-center">
                                Peso Fin
                              </th>
                              <th class="text-center">
                                Distancia I
                              </th>
                              <th class="text-center">
                                Distancia F
                              </th>
                              <th class="text-center">
                                Activo
                              </th>
                              <th  id="axions" style="display: none">
                                {{ __('Accion') }}
                              </th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($datos as $dato)
                                <tr>
                                  <td class="text-center">
                                    {{ $loop->iteration }}
                                  </td>
                                  <td class="text-center">
                                    @if(!empty($dato->imagen))
                                    <img src="{{Storage::url($dato->imagen)}}" class="img-circle" width="80"/>
                                    @else
                                    <img src="{{Storage::url('image.gif')}}" class="img-circle" width="80"/>

                                    @endif
                                  </td>
                                  <td class="text-center">
                                    {{ $dato->nombr_ve }}
                                  </td>
                                  <td class="text-center">
                                    {{ $dato->peso }}
                                  </td>
                                  <td class="text-center">
                                      {{ $dato->pesoI }}
                                  </td>
                                  <td class="text-center">
                                    {{ $dato->distan_ini }}
                                  </td>
                                  <td class="text-center">
                                    {{ $dato->distaci_fin }}
                                  </td>
                                  <td  class="text-center">
                                    @if($dato->activo==0)
                                    <label class="badge badge-danger">Desactivado</label>
                                    @else
                                    <label class="badge badge-primary">Activo</label>
                                    @endif
                                  </td>

                                  <td class="td-actions text-right" id="axions" style="display: none">
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
                                        <a href="{{route('editVehiculo',$id=$dato->id_tipo)}}"><i class="ik ik-edit f-16 mr-15 text-green"></i></a>
                                        <a href=""><i class="ik ik-trash-2 f-16 text-red"></i></a>

                                        </button>
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
                                  {{ __('Foto') }}
                            </th>
                              <th class="text-center">
                                Nombre
                              </th>
                              <th class="text-center">
                                Peso Ini
                              </th>
                              <th class="text-center">
                                Peso Fin
                              </th>
                              <th class="text-center">
                                Distancia I
                              </th>
                              <th class="text-center">
                                Distancia F
                              </th>
                              <th class="text-center">
                                Activo
                              </th>
                              <th  class="text-right" id="axions" style="display: none">
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
