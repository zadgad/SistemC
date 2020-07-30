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
        <div class="card">
            <div class="card-header">
                <h3>Lista de Ubicaciones</h3>
            </div>
            <a href="{{route('añadirubica')}}" class="btn btn-sm btn-primary">{{ __('Añadir Usuario') }}</a>
            <div class="card-body">
                <div class="dt-responsive">
                    <table id="lang-dt"
                           class="table table-striped table-bordered nowrap">
                        <thead>
                        <tr>
                            <th class="text-center">
                                {{ __('#') }}
                            </th>
                            <th class="text-center">
                                  {{ __('Foto') }}
                            </th>
                            <th class="text-center">
                              {{ __('Sensor') }}
                            </th>

                            <th class="text-center">
                              {{ __('Esta. Sensor') }}
                            </th>
                            <th class="text-center">
                              {{ __('Departamento') }}
                            </th>
                            <th class="text-center">
                              {{ __('Ciudad') }}
                            </th>
                            <th class="text-center">
                              {{ __('Via') }}
                            </th>
                            <th class="text-center">
                              {{ __('Estado') }}
                            </th>

                            <th class="text-right">
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
                             @if(!empty($dato->foto))
                             <img src="{{Storage::url($dato->foto)}}" class="img-circle" width="80"/>
                             @else
                             <img src="{{Storage::url('image.gif')}}" class="img-circle" width="80"/>

                             @endif
                           </td>
                         <td class="text-center">
                           {{ $dato->nombre }}
                         </td>
                         <td class="text-center">
                           {{ $dato->estado }}
                         </td>

                         <td class="text-center">
                           {{ $dato->nomb }}
                         </td>
                         <td class="text-center">
                           {{ $dato->nombc }}
                         </td>
                         <td class="text-center">
                           {{ $dato->nomvia}}
                         </td>
                         <td class="text-center">
                           {{ $dato->activo}}
                         </td>
                         <td class="td-actions text-right">
                               <form action={{-- "{{ route('user.destroy', $user) }}" --}}  method="post">
                                     @csrf
                                     @method('delete')

                                     <a  href="{{route('editUbication',$id=$dato->id_ubicacion)}}"><i class="ik ik-edit f-16 mr-15 text-green"></i></a>
                                       <a href=""><i class="ik ik-trash-2 f-16 text-red"></i></a>
                                 </form>
                             </td>
                       </tr>
                     @endforeach

                        </tbody>
                        <tfoot>
                        <tr>
                            <th class="text-center">
                                {{ __('#') }}
                            </th>
                            <th class="text-center">
                                  {{ __('Foto') }}
                            </th>
                            <th class="text-center">
                              {{ __('Sensor') }}
                            </th>

                            <th class="text-center">
                              {{ __('Esta. Sensor') }}
                            </th>
                            <th class="text-center">
                              {{ __('Departamento') }}
                            </th>
                            <th class="text-center">
                              {{ __('Ciudad') }}
                            </th>
                            <th class="text-center">
                              {{ __('Via') }}
                            </th>
                            <th class="text-center">
                              {{ __('Estado') }}
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
