@extends('layouts.appl', ['activePage' => 'user-management', 'titlePage' => __(' Lista de ciudades ')])
@section('content')
 <div class="main-content">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-calendar bg-blue"></i>
                        <div class="d-inline">
                            <h5>Lista de Ciudades</h5>
                            <span>Informacion de las Ciudades registrados en sistema</span>
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
                            <li class="breadcrumb-item active" aria-current="page">Lista Ciudades</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
                <div class="card">
                    <div class="card-header">
                        <h3>Lista de Departamentos</h3>
                    </div>
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
                                      {{ __('Nombre') }}
                                    </th>

                                    <th class="text-center">
                                      {{ __('# ciudades ') }}
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($dep as $de)
                                    <tr>
                                     <td class="text-center">
                                   {{ $loop->iteration }}
                                 </td>

                                 <td class="text-center">
                                   {{ $de->nomb }}
                                 </td>
                                 <td class="text-center">
                                       {{ $de->count }}
                                     </td>
                             @endforeach

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th class="text-center">
                                        {{ __('#') }}
                                    </th>
                                    <th class="text-center">
                                      {{ __('Nombre') }}
                                    </th>

                                    <th class="text-center">
                                      {{ __('# ciudades ') }}
                                    </th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Language - Comma Decimal Place table end -->
            </div>
        </div>
    </div>
  </div>
 @endsection
