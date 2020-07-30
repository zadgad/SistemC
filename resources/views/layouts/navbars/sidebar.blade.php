 <div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="https://creative-tim.com/" class="simple-text logo-normal">
        @if(session()->get('rol')?? '')
            {{session()->get('rol')->first()}}
        @else

        @endif
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href={{route('home')}}>
          <i class="material-icons">dashboard</i>
            <p>{{ __('Pagina de Inicio') }}</p>
        </a>
      </li>
      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
          <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>
          <p>{{ __('Informacion Personal') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="laravelExample">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
              <a class="nav-link" href= "{{ route('editw') }}" >
                <span class="sidebar-mini"> UP </span>
                <span class="sidebar-normal">{{ __('Perfil de Usuario') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('list_us') }} ">
                <span class="sidebar-mini"> UM </span>
                <span class="sidebar-normal"> {{ __('Lista de Usuario') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item{{ $activePage == 'table' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('list_em') }}" >
          <i class="material-icons">content_paste</i>
            <p>{{ __('Empleados') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'map' ? ' active' : '' }}">
        <a class="nav-link" href= "{{ route('list_vehic') }}">
          <i class="material-icons">location_ons</i>
            <p>{{ __('Vehiculos') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'notifications' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('list_vias') }}" >
          <i class="material-icons">notifications</i>
          <p>{{ __('Vias') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'typography' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('list_senores') }}" >
          <i class="material-icons">library_books</i>
            <p>{{ __('Sensores') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'icons' ? ' active' : '' }}">
        <a class="nav-link" href= "{{ route('list_ciudad') }}" >
          <i class="material-icons">bubble_chart</i>
          <p>{{ __('Ciudades') }}</p>
        </a>
      </li>


      <li class="nav-item{{ $activePage == 'language' ? ' active' : '' }}">
        <a class="nav-link" href={{-- "{{ route('language') }}" --}}>
          <i class="material-icons">language</i>
          <p>{{ __('Tabla TDMA') }}</p>
        </a>
      </li>
      <li class="nav-item active-pro{{ $activePage == 'upgrade' ? ' active' : '' }}">
        <a class="nav-link" href={{-- "{{ route('upgrade') }}" --}}>
          <i class="material-icons">unarchive</i>
          <p>{{ __('Recoleccion de datos') }}</p>
        </a>
      </li>
      <li class="nav-item active-pro{{ $activePage == 'upgrade' ? ' active' : '' }}">
        <a class="nav-link" href={{-- "{{ route('upgrade') }}" --}}>
          <i class="material-icons">unarchive</i>
          <p>{{ __('Tablas De TDMA') }}</p>
        </a>
      </li>
    </ul>
  </div>
</div>

