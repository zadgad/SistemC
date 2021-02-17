@extends('layouts.appl', ['activePage' => 'user-management', 'titlePage' => __('  ')])
@section('content')
<div class="main-content">
   <div class="container-fluid">
       <div class="page-header">
           <div class="row align-items-end">
               <div class="col-lg-8">
                   <div class="page-header-title">
                       <i class="ik ik-tablet bg-blue"></i>
                       <div class="d-inline">
                           <h5>Pagina Inicio de {{$id=session()->get('rol')->first()}}</h5>
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
                               @if(session()->get('user_rol')->first()==1)
                               <a href="{{route('inicio',$id=session()->get('nombre')->first())}}"><i class="ik ik-home"></i></a>
                               @else
                               @if(session()->get('user_rol')->first()!=1)
                               <a href="../index.html"><i class="ik ik-home"></i></a>
                               @endif
                               @endif
                           </li>
                           <li class="breadcrumb-item">
                               <a href="#">Funcion</a>
                           </li>
                           <li class="breadcrumb-item active" aria-current="page">Super Us</li>
                       </ol>
                   </nav>
               </div>
           </div>
       </div>

       <div class="row clearfix">
           <div class="col-lg-3 col-md-6 col-sm-12">
               <div class="widget">
                   <div class="widget-body">
                       <div class="d-flex justify-content-between align-items-center">
                           <div class="state">
                               <h6>Administradores</h6>
                               <h2>{{$countA}}</h2>
                           </div>
                           <div class="icon">
                               <i class="ik ik-award"></i>
                           </div>
                       </div>
                       <a href="{{ route('register',$rol[1]->id_rol) }}" class="badge badge-primary mb-1">Añadir</a>
                   </div>
                   <div class="progress progress-sm">
                       <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100" style="width: 62%;"></div>
                   </div>
               </div>
           </div>
           <div class="col-lg-3 col-md-6 col-sm-12">
               <div class="widget">
                   <div class="widget-body">
                       <div class="d-flex justify-content-between align-items-center">
                           <div class="state">
                               <h6>Empleados</h6>
                               <h2>{{$countE}}</h2>
                           </div>
                           <div class="icon">
                               <i class="ik ik-github"></i>
                           </div>
                       </div>
                       <a href="{{ route('register',$rol[2]->id_rol) }}" class="badge badge-primary mb-1">Añadir</a>
                   </div>
                   <div class="progress progress-sm">
                       <div class="progress-bar bg-success" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100" style="width: 78%;"></div>
                   </div>
               </div>
           </div>
           <div class="col-lg-3 col-md-6 col-sm-12">
               <div class="widget">
                   <div class="widget-body">
                       <div class="d-flex justify-content-between align-items-center">
                           <div class="state">
                               <h6>Usuarios</h6>
                               <h2>{{$countU}}</h2>
                           </div>
                           <div class="icon">
                               <i class="ik ik-gitlab"></i>
                           </div>
                       </div>
                       <a href="{{ route('register',$rol[3]->id_rol) }}" class="badge badge-primary mb-1">Añadir</a>
                   </div>
                   <div class="progress progress-sm">
                       <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100" style="width: 31%;"></div>
                   </div>
               </div>
           </div>
           <div class="col-lg-3 col-md-6 col-sm-12">
               <div class="widget">
                   <div class="widget-body">
                       <div class="d-flex justify-content-between align-items-center">
                           <div class="state">
                               <h6>Global</h6>
                               <h2>{{ $count }}</h2>
                           </div>
                           <div class="icon">
                               <i class="ik ik-users"></i>
                           </div>
                       </div>
                       <a href="{{ route('formulario') }}" class="badge badge-primary mb-1">Añadir</a>
                   </div>
                   <div class="progress progress-sm">
                       <div class="progress-bar bg-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"></div>
                   </div>
               </div>
           </div>
       </div>
       <div class="col-xl-6 col-md-12">
           <div class="card new-cust-card">
               <div class="card-header">
                   <h3>Actividades De Usuarios</h3>
                   <div class="card-header-right">
                       <ul class="list-unstyled card-option">
                           <li><i class="ik ik-chevron-left action-toggle"></i></li>
                           <li><i class="ik ik-minus minimize-card"></i></li>
                           <li><i class="ik ik-x close-card"></i></li>
                       </ul>
                   </div>
               </div>
               <div class="card-block">
                @foreach ($session as $sesion)
                    <div class="align-middle mb-25">
                        @if(!empty($sesion->foto))
                                     <img src="{{Storage::url($sesion->foto)}}" alt="user image" class="rounded-circle img-40 align-top mr-15">

                                     @else
                                     <img src="{{Storage::url('image.gif')}}" alt="user image" class="rounded-circle img-40 align-top mr-15">

                                     @endif
                        <div class="d-inline-block">
                            <a href="#!"><h6>{{$sesion->pid}}</h6></a>
                            <a href="">H. Conet  </a><a class="text-muted mb-0">{{$sesion->hora_conect}}</a>
                            <a href=""> - H. Des  </a><a class="text-muted mb-0">{{$sesion->hora_disconect}}</a>
                         @if($sesion->activo==true)
                         <span class="status active"></span>
                         @endif
                        </div>
                    </div>

                @endforeach

               </div>
           </div>
       </div>

       </div>
   </div>
</div>
@endsection
