<div class="wrapper">
    @include('layouts.navbars.navs.authh')

    <div class="page-wrap">
      @include('layouts.navbars.sidebarr')
      @yield('scripts')
      @yield('content')

      <div class="text-right">
        @include('layouts.footers.auth')
      </div>

    </div>
  </div>
