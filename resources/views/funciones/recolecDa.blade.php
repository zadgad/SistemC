@extends('layouts.appl', ['activePage' => 'user-management', 'titlePage' => __(' Lista de Administradores')])
@section('content')
 <div class="main-content">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-calendar bg-blue"></i>
                        <div class="d-inline">
                            <h5>Recoleccion de Datos por los Sensores</h5>
                            <span>Informacion de los diferentes dispositivos que se encuentra en el sistema</span>
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
                                @if(session()->get('user_rol')->first()==1)
                                <a href="{{route('inicio',$id=session()->get('nombre')->first())}}"><i class="ik ik-home"></i></a>
                                @else
                                @if(session()->get('user_rol')->first()!=1)
                                <a href="../index.html"><i class="ik ik-home"></i></a>
                                @endif
                                @endif
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">Apps</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Registro de Datos</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header d-block">
                <h3>Datos Recolectados De los Sensores
                </h3>
            </div>
            <div class="card-body">
                <div class="dt-responsive">
                    <table id="scr-vrt-dt"
                           class="table table-striped table-bordered nowrap">
                        <thead>
                        <tr>
                            <th class="text-center">
                                {{ __('#') }}
                            </th>
                            <th class="text-center"> {{ __('Nom. Sen') }}</thtext-center>
                            <th class="text-center">{{ __('Activo') }}</th>
                            <th class="text-center">{{ __('Departamento') }}Departamento</th>
                            <th class="text-center">{{ __('Ciudad') }}</th>
                            <th class="text-center">{{ __('Nom. Via') }}</th>
                            <th class="text-center">{{ __('Clasif') }}</th>
                            <th class="text-center">{{ __('Tipo') }}</th>
                            <th class="text-center">{{ __('Fecha') }}</th>
                            <th class="text-center">{{ __('Hora') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($dates as $date)
                            <td class="text-center">
                                {{ $loop->iteration }}
                              </td>
                              <td class="text-center">
                                {{ $date->nombre }}
                              </td>
                              <td class="text-center">
                                {{ $dato->activo }}
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
                              <td class="text-center">
                                {{ $dato->clacificacion}}
                              </td>
                              <td class="text-center">
                                {{ $dato->tipo}}
                              </td>
                              <td class="text-center">
                                {{ $dato->fecha}}
                              </td>
                              <td class="text-center">
                                {{ $dato->hora}}
                              </td>

                            @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th class="text-center">
                                {{ __('#') }}
                            </th>
                            <th class="text-center"> {{ __('Nom. Sen') }}</thtext-center>
                            <th class="text-center">{{ __('Activo') }}</th>
                            <th class="text-center">{{ __('Departamento') }}</th>
                            <th class="text-center">{{ __('Ciudad') }}</th>
                            <th class="text-center">{{ __('Nom. Via') }}</th>
                            <th class="text-center">{{ __('Clasif') }}</th>
                            <th class="text-center">{{ __('Tipo') }}</th>
                            <th class="text-center">{{ __('Fecha') }}</th>
                            <th class="text-center">{{ __('Hora') }}</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    </div>
  </div>
 @endsection
