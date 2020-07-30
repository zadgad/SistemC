@extends('layouts.appl', ['activePage' => 'user-management', 'titlePage' => __('User Management')])

@section('content')
 <div class="main-content">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-user bg-blue"></i>
                        <div class="d-inline">
                            <h5>Pagina Inicio del {{$i=session()->get('rol')->first()}}</h5>
                            <span>Informacion de las actividades de los usuarios registrados en sistema</span>
                            <br>
                            <br>
                            <h6>Bienvenido al Sistema {{$id=session()->get('nombre')->first()}} </h6>
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
                            <li class="breadcrumb-item active" aria-current="page">{{$i=session()->get('rol')->first()}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h5 class="mb-4">Tipos de Vehiculos</h5>
                <p>Los diferentes volúmenes de tráfico que se obtienen de las estaciones programadas durante el año y que clasifican los contadores de tráfico por automotores en ambos Sentidos de circulación.</p>
                <div class="row mb-4">
                    <div class="col-md-12 mb-4 pl-0 pr-0">
                        <div class="owl-container">
                            <div class="owl-carousel single">
                               @foreach ($vehs as $veh)
                               <div class="card d-flex flex-row">

                                <a class="d-flex" href="#">
                                    <img alt="Thumbnail" src="{{ Storage::url($veh->imagen) }}" class="list-thumbnail responsive border-0">
                                </a>

                                <div class="pl-2 d-flex flex-grow-1 min-width-zero">
                                    <div class="card-body align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">
                                        <h6 class="mb-6">{{ $veh->nombr_ve }}</h6>
                                        <a href="#">
                                            <p class="list-item-heading mb-1 truncate">Rango de Distancia {{ $veh->distan_ini }} - {{ $veh->distaci_fin }} cm.</p>
                                        </a>
                                        <p class="list-item-heading mb-1 truncate">Rango en Peso {{ $veh->peso }} - {{ $veh->pesoI }} Tn.</p>

                                    </div>
                                </div>
                            </div>
                               @endforeach

                            </div>
                            <div class="slider-nav text-center">
                                <a href="#" class="left-arrow owl-prev">
                                    <i class="ik ik-chevron-left"></i>
                                </a>
                                <div class="slider-dot-container"></div>
                                <a href="#" class="right-arrow owl-next">
                                    <i class="ik ik-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <h5 class="mb-4">Tipos de Vias</h5>
                <p> Las vías terrestres son obras de infraestructuras , que se diseñaron para mejorar el transporte y disminuir el tiempo que se tarda en movilizarse de un punto a otro, entre las vías terrestres están: carreteras, autopistas, caminos.</p>

                <div class="row">
                    <div class="col-md-12 mb-4 pl-0 pr-0">
                        <div class="owl-container">
                            <div class="owl-carousel basic">
                                <div class="card flex-row">
                                    <div class="w-50 position-relative">
                                        <img class="card-img-left" src="{{ asset('proyect') }}./img/carretera.jpg" alt="Card image cap">
                                        <span class="badge badge-pill badge-primary position-absolute badge-top-left"></span>
                                    </div>
                                    <div class="w-50">
                                        <div class="card-body">
                                            <h6 class="mb-4">Carretera</h6>

                                            <footer>
                                                <p class="text-muted text-small mb-0 font-weight-light">La carretera o ruta es un camino público pavimentado que está dispuesto para el tránsito de vehículos. Por lo general se trata de vías anchas que permiten fluidez en la circulación. </p>
                                            </footer>
                                        </div>
                                    </div>
                                </div>

                                <div class="card flex-row">
                                    <div class="w-50 position-relative">
                                        <img class="card-img-left" src="{{ asset('proyect') }}./img/autopista.jpg" alt="Card image cap">
                                        <span class="badge badge-pill badge-primary position-absolute badge-top-left"></span>
                                    </div>
                                    <div class="w-50">
                                        <div class="card-body">
                                            <h6 class="mb-4">Autopista</h6>
                                            <footer>
                                                <p class="text-muted text-small mb-0 font-weight-light">Son vías en las que no se interrumpe el tránsito con
                                                    entradas y salidas que obliguen a los vehículos a cambiar
                                                    la velocidad ni con señales de PARE, en ellas se puede
                                                    circular con un régimen continuo de velocidad.</p>
                                            </footer>
                                        </div>
                                    </div>
                                </div>

                                <div class="card flex-row">
                                    <div class="w-50 position-relative">
                                        <img class="card-img-left" src="{{ asset('proyect') }}./img/calle.jpg" alt="Card image cap">
                                        <span class="badge badge-pill badge-primary position-absolute badge-top-left"></span>
                                    </div>
                                    <div class="w-50">
                                        <div class="card-body">
                                            <h6 class="mb-4">Calle</h6>

                                            <footer>
                                                <p class="text-muted text-small mb-0 font-weight-light">Vía especialmente reservada para automóviles, con un único carril hacia el mismo sentido y con limitación de acceso desde las propiedades colindantes. No tendrán acceso otros vehículos distintos de los automóviles.</p>
                                            </footer>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="slider-nav text-center">
                                <a href="#" class="left-arrow owl-prev">
                                    <i class="ik ik-chevron-left"></i>
                                </a>
                                <div class="slider-dot-container"></div>
                                <a href="#" class="right-arrow owl-next">
                                    <i class="ik ik-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </div>

 @endsection
