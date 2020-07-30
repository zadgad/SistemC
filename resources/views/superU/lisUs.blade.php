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
                            <h5>Lista de Todos los Usuarios</h5>
                            <span>Informacion de los usuarios registrados en sistema</span>
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
                            <li class="breadcrumb-item active" aria-current="page">Lista Global</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card table-card">

                <div class="card">
                    <div class="card-header">
                        <h3>Lista de Usuarios</h3>
                    </div>
                    <a href="{{route('formulario')}}" class="btn btn-sm btn-primary">{{ __('Añadir Usuario') }}</a>                    <div class="card-body">
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
                                      {{ __('Nombre') }}
                                    </th>
                                    <th class="text-center">
                                      {{ __('Apellido Pa.') }}
                                    </th>
                                    <th class="text-center">
                                      {{ __('Apellido Ma') }}
                                    </th>
                                    <th class="text-center">
                                      {{ __('Login') }}
                                    </th>
                                    <th class="text-center">
                                      {{ __('Email') }}
                                    </th>
                                    <th class="text-center">
                                      {{ __('Rol') }}
                                    </th>
                                    <th class="text-right">
                                      {{ __('Actions') }}
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                     <td class="text-center">
                                   {{ $loop->iteration }}
                                 </td>
                                 <td>
                                     @if(!empty($user->foto))
                                     <img src="{{Storage::url($user->foto)}}" class="rounded-circle img-80 align-top mr-15" width="80"/>
                                     @else
                                     <img src="{{Storage::url('image.gif')}}" class="rounded-circle img-80 align-top mr-15" width="80"/>

                                     @endif
                                   </td>
                                 <td class="text-center">
                                   {{ $user->nombre }}
                                 </td>
                                 <td class="text-center">
                                   {{ $user->apepa }}
                                 </td>
                                 <td class="text-center">
                                   {{ $user->apema }}
                                 </td>
                                 <td class="text-center">
                                   {{ $user->login }}
                                 </td>
                                 <td class="text-center">
                                   {{ $user->email }}
                                 </td>
                                 <td class="text-center">
                                   {{ $user->ro }}
                                 </td>
                                <td class="td-actions text-right">
                                   @if ($user->id_usr != session()->get('id')->first())
                                   <form action={{-- "{{ route('user.destroy', $user) }}" --}}  method="post">
                                         @csrf
                                         @method('delete')

                                         <a  href="{{route('editaruser',$id=$user->id_usr)}}"><i class="ik ik-edit f-16 mr-15 text-green"></i></a>
                                           <a class="ik ik-trash-2 f-16 text-red"><i class="fa fa-trash-o "></i></a>
                                     </form>
                                   @else
                                   <a  href="{{route('infoRut',$user->id_usr)}}"><i class="ik ik-edit f-16 mr-15 text-green"></i></a>
                                   @endif
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
                                      {{ __('Nombre') }}
                                    </th>
                                    <th class="text-center">
                                      {{ __('Apellido Pa.') }}
                                    </th>
                                    <th class="text-center">
                                      {{ __('Apellido Ma') }}
                                    </th>
                                    <th class="text-center">
                                      {{ __('Login') }}
                                    </th>
                                    <th class="text-center">
                                      {{ __('Email') }}
                                    </th>
                                    <th class="text-center">
                                      {{ __('Rol') }}
                                    </th>
                                    <th class="text-right">
                                      {{ __('Actions') }}
                                    </th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
 @endsection
