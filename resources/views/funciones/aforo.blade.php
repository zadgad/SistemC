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
                            <h5>Tablas de AFORO </h5>
                            <span>Tabla de AFORO del sensor en la ubicacion</span>
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
                            <li class="breadcrumb-item active" aria-current="page">Aforo</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3>Datos Recolectados AFORO</h3>
            </div>
            <div class="card-body">
                <div class="dt-responsive">
                    <table id="scr-vtr-dynamic"
                           class="table table-striped table-bordered nowrap">
                        <thead>
                        <tr>
                            <th class="text-center">
                                {{ __('#') }}
                            </th>
                            <th class="text-center"> {{ __('Fecha') }}</thtext-center>
                            <th class="text-center">{{ __('Hora') }}</th>
                            <th class="text-center">{{ __(' Liviano') }}</th>
                            <th class="text-center">{{ __('Mediano') }}</th>
                            <th class="text-center">{{ __('Pesado') }}</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        <tfoot>
                        <tr>
                            <th class="text-center">
                                {{ __('#') }}
                            </th>
                            <th class="text-center"> {{ __('Fecha') }}</thtext-center>
                            <th class="text-center">{{ __('Hora') }}</th>
                            <th class="text-center">{{ __(' Liviano') }}</th>
                            <th class="text-center">{{ __('Mediano') }}</th>
                            <th class="text-center">{{ __('Pesado') }}</th>                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
  </div>
 @endsection
