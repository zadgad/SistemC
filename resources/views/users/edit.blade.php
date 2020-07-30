@extends('layouts.appl', ['activePage' => 'user-management', 'titlePage' => __(' Formulario Para Editar ')])

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
                          <li class="breadcrumb-item active" aria-current="page">Editar Infor.</li>
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
                        @if(empty($users->foto))
                        <p class="centered"><a {{$id=session()->get('nombre')->first()}} href="{{route('infoRut',$id)}}"><img src="{{Storage::url('image.gif')}}" class="img-circle" width="200"></a></p>
                        @else
        {{--                 {{$im=DB::table('usr')->where('usr','=',session()->get('nombre')->first())->pluck('usr.foto')}}
                         {{--{{dd($ima[0])}}--}}
                         <p class="centered"><a {{$id=session()->get('nombre')->first()}} href="{{route('infoRut',$id)}}"><img {{$ima=session()->get('image')}} src="{{Storage::url($users->foto)}}" class="img-circle" width="200"></a></p>
                        @endif
                                                <h4 class="mt-20 mb-0">{{$users->nombre}} {{$users->apepa}}</h4>
                        <a href="#" >johndoe@admin.com</a>
                    </div>
                    
                </div>
             </div>
        </div>
    
@endsection





