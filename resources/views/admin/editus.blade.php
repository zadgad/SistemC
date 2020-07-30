@extends('layouts.appl', ['activePage' => 'user-management', 'titlePage' => __(' Editar Usuarios ')])
@section('content')
<div class="main-content">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-calendar bg-blue"></i>
                        <div class="d-inline">
                            <h5>Editar Informacion De Usuario</h5>
                            <span>Los cambios seran guardados en Sistema</span>
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
                            <li class="breadcrumb-item active" aria-current="page">Editar Usuario</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="profile-pic mb-20">
                            <img src="../img/user.jpg" width="150" class="rounded-circle" alt="user">
                            <h4 class="mt-20 mb-0">John Doe</h4>
                            <a href="#" >johndoe@admin.com</a>
                        </div>
                        <div class="badge badge-pill badge-dark">Dashboard</div>
                        <div class="badge badge-pill badge-dark">UI</div>
                        <div class="badge badge-pill badge-dark">UX</div>
                        <div class="badge badge-pill badge-info" data-toggle="tooltip" data-placement="top" title="3 more">+3</div>
                    </div>
                    <div class="p-4 border-top mt-15">
                        <div class="row text-center">
                            <div class="col-6 border-right">
                                <a href="#" class="link d-flex align-items-center justify-content-center"><i class="ik ik-message-square f-20 mr-5"></i>Message</a>
                            </div>
                            <div class="col-6">
                                <a href="#" class="link d-flex align-items-center justify-content-center"><i class="ik ik-box f-20 mr-5"></i>Portfolio</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        
@endsection

