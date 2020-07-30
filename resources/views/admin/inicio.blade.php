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
                           <h5>Pagina Inicio del Administrador</h5>
                           <span>Informacion de las actividades de los usuarios registrados en sistema</span>
                           <br>
                           <br>
                           <h6>Bienvenido al Sistema Nombre de user </h6>
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
                           <li class="breadcrumb-item active" aria-current="page">Administrador</li>
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
                               <h6>Empleados</h6>
                               <h2>41,410</h2>
                           </div>
                           <div class="icon">
                               <i class="ik ik-github"></i>
                           </div>
                       </div>
                       <a href="#" class="badge badge-primary mb-1">Añadir</a>
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
                               <h2>410</h2>
                           </div>
                           <div class="icon">
                               <i class="ik ik-gitlab"></i>
                           </div>
                       </div>
                       <a href="#" class="badge badge-primary mb-1">Añadir</a>
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
                               <h2>41,410</h2>
                           </div>
                           <div class="icon">
                               <i class="ik ik-users"></i>
                           </div>
                       </div>
                       <a href="#" class="badge badge-primary mb-1">Añadir</a>
                   </div>
                   <div class="progress progress-sm">
                       <div class="progress-bar bg-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"></div>
                   </div>
               </div>
           </div>
       </div>
       <div class="col-xl-6 col-md-8">
           <div class="card new-cust-card">
               <div class="card-header">
                   <h3>New Customers</h3>
                   <div class="card-header-right">
                       <ul class="list-unstyled card-option">
                           <li><i class="ik ik-chevron-left action-toggle"></i></li>
                           <li><i class="ik ik-minus minimize-card"></i></li>
                           <li><i class="ik ik-x close-card"></i></li>
                       </ul>
                   </div>
               </div>
               <div class="card-block">
                   <div class="align-middle mb-25">
                       <img src="../img/users/1.jpg" alt="user image" class="rounded-circle img-40 align-top mr-15">
                       <div class="d-inline-block">
                           <a href="#!"><h6>Alex Thompson</h6></a>
                           <p class="text-muted mb-0">Cheers!</p>
                           <span class="status active"></span>
                       </div>
                   </div>
                   <div class="align-middle mb-25">
                       <img src="../img/users/2.jpg" alt="user image" class="rounded-circle img-40 align-top mr-15">
                       <div class="d-inline-block">
                           <a href="#!"><h6>John Doue</h6></a>
                           <p class="text-muted mb-0">stay hungry stay foolish!</p>
                           <span class="status active"></span>
                       </div>
                   </div>
                   <div class="align-middle mb-25">
                       <img src="../img/users/3.jpg" alt="user image" class="rounded-circle img-40 align-top mr-15">
                       <div class="d-inline-block">
                           <a href="#!"><h6>Alex Thompson</h6></a>
                           <p class="text-muted mb-0">Cheers!</p>
                           <span class="status deactive text-mute"><i class="far fa-clock mr-10"></i>30 min ago</span>
                       </div>
                   </div>
                   <div class="align-middle mb-25">
                       <img src="../img/users/4.jpg" alt="user image" class="rounded-circle img-40 align-top mr-15">
                       <div class="d-inline-block">
                           <a href="#!"><h6>John Doue</h6></a>
                           <p class="text-muted mb-0">Cheers!</p>
                           <span class="status deactive text-mute"><i class="far fa-clock mr-10"></i>10 min ago</span>
                       </div>
                   </div>
               </div>
           </div>
       </div>


       </div>
   </div>
</div>
@endsection
