<div class="app-sidebar colored">
    <div class="sidebar-header">
        <a class="header-brand" href="index.html">
            <div class="logo-img">
               <img src="{{ asset('proyect') }}./img/syste.JPG" class="header-brand-img" alt="lavalite">
            </div>
            <span class="text">SISTEM SCV</span>
        </a>
        <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
    </div>

    <div class="sidebar-content">
        <div class="nav-container">
            <nav id="main-menu-navigation" class="navigation-main">
                <div class="nav-lavel">Funciones Usuario {{session()->get('rol')->first()}}</div>
                <div class="nav-item">
                    @if(session()->get('user_rol')->first()==1)
                    <a href="{{route('inicio',$id=session()->get('nombre')->first())}}"><i class="ik ik-home"></i><span>Inicio</span></a>
                    @else
                     @if(session()->get('user_rol')->first()==2)
                     <a href=""><i class="ik ik-home"></i><span>Inicio</span></a>
                     @else
                     @if(session()->get('user_rol')->first()>2)
                     <a href="{{ route('inius',$id=session()->get('nombre')->first()) }}"><i class="ik ik-home"></i><span>Inicio</span></a>
                     @endif
                    @endif
                    @endif
                    </div>
                <div class="nav-item has-sub" id="listts" style="display: none" >
                    <a href="#"><i class="ik ik-users"></i><span>Lista De Usuarios</span> <span class="badge badge-danger"></span></a>
                    <div class="submenu-content">
                        <a id="añadir_us" style="display: none" href="{{route('formulario')}}" class="menu-item">Añadir Usuario</a>
                        <a id="list_add" style="display: none" href="{{route('list_ad')}}" class="menu-item">Lista de Administradores</a>
                        <a id="list_em" style="display: none" href="{{route('list_em')}}" class="menu-item">Lista de Empledos</a>
                        <a id="list_user" style="display: none" href="{{route('list')}}" class="menu-item">Lista de Ususarios</a>
                        <a id="list_glo" style="display: none" href="{{route('listUs')}}" class="menu-item">Lista de Usuarios Goblal</a>

                    </div>
                </div>
                <div class="nav-item has-sub" id="depst" style="display: none">
                    <a href="#"><i class="ik ik-bar-chart-2"></i><span>Depar. y Ciudades</span></a>
                    <div class="submenu-content">
                        <a href="{{ route('ListD') }}" class="menu-item">Lista de Departamentos</a>
                        <a href="{{route('listCiu')}}" class="menu-item">Lista de Ciudades</a>

                    </div>
                </div>
                <div class="nav-item has-sub" id="vias" style="display: none">
                    <a href="#"><i class="ik ik-grid"></i><span>Vias</span> <span class="badge badge-success"></span></a>
                    <div class="submenu-content">
                        <a id="añad_via" style="display: none" href="{{route('añadir_via')}}" class="menu-item">Añadir Vias</a>
                        <a  href="{{route('list_vias')}}" class="menu-item">Lista de Vias</a>

                    </div>
                </div>
                <div class="nav-item has-sub" id="vehiculos" style="display: none">
                    <a href="#"><i class="ik ik-truck"></i><span>Vehiculos</span></a>
                    <div class="submenu-content">
                        <a id="vehñadir" style="display: none" href="{{route('añadir_vehi')}}" class="menu-item" >Añadir Vehiculos</a>
                        <a href="{{route('list_vehic')}}" class="menu-item" >Tipos de Vehiculos</a>

                    </div>
                </div>
                <div class="nav-item has-sub" id="sensor_id" style="display: none">
                    <a href="#"><i class="ik ik-radio"></i><span>Sensores</span></a>
                    <div class="submenu-content">
                        <a href="{{route('añadirS')}}" class="menu-item" id="sensor_añ" style="display: none">Añadir Sensor</a>
                        <a href="{{route('list_senores')}}" class="menu-item" id="list_sen" style="display: none">Lista de Sensores</a>
                    </div>
                </div>
                <div class="nav-item has-sub" id="ubicacion" style="display: none">
                    <a href="#"><i class="ik ik-clipboard"></i><span>Ubicacion</span></a>
                    <div class="submenu-content">
                        <a href="{{route('añadirubica')}}" class="menu-item" id="ubicañadir" style="display: none">Añadir Ubicacion</a>
                        <a href="{{route('listUbication')}}" class="menu-item">Lista de Ubicaciones</a>
                    </div>
                </div>
                <div class="nav-item has-sub" id="estadistic" style="display: none">
                    <a href="#"><i class="ik ik-pie-chart"></i><span>Estadistica</span></a>
                    <div class="submenu-content">
                        <a href="{{ route('formEsta') }}" class="menu-item" id="formuss" style="display: none">Formulario De Busqueda</a>
                        <a href="{{ route('aforo') }}" class="menu-item" id="aforos" style="display: none">Tablas de AFORO</a>
                        <a href="form-components.html" class="menu-item" id="regedit" style="display: none">Registro de Ubicacion</a>
                        <a href="form-components.html" class="menu-item" id="esta" style="display: none">Cuadros Estadisticos</a>
                        <a href="{{ route('registerD') }}" class="menu-item" id="recolec" style="display: none">Recoleccion de Datos</a>

                    </div>
                </div>
                <div class="nav-item">
                    <a href="table-datatable.html"><i class="ik ik-map-pin"></i><span>Google Maps</span></a>
                </div>

                <div class="nav-lavel">Simulacion</div>
                <div class="nav-item has-sub" id="demosimulacion" style="display: none">
                    <a href="#"><i class="ik ik-cpu"></i><span>Simulador</span> <span class="badge badge-success"></span></a>
                    <div class="submenu-content">
                        <a href="{{ route('formularioSim') }}" class="menu-item" >Generar Datos</a>
                        <a href="charts-flot.html" class="menu-item" >Tablas</a>
                    </div>
                </div>

                <div class="nav-item">
                    <a href="javascript:void(0)"><i class=""></i><span></span></a>
                </div>
            </nav>
        </div>
    </div>
</div>
<script language="JavaScript" type="text/javascript" src="{{ asset('proyect')}}./js/select/permisos.js"></script>
