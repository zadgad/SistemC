@section('links')
@parent
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">
@endsection
<link href="{{asset('plantillas/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet"/>

<link href="{{asset('plantillas/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet"/>
<link href="{{asset('plantillas/lib/animate/animate.min.css')}}" rel="stylesheet">
<link href="{{asset('plantillas/lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet"/>
<link href="{{asset('plantillas/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet"/>
<link href="{{asset('plantillas/lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet"/>

<link href="{{asset('plantillas/css/sweetalert2.css')}}" rel="stylesheet"/>


@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Inicio')])

@section('content')
<section id="Vias">
    <div class="container">
<br>
      <header class="section-header">
        <h3>Tipos de Vias</h3>
        <p> Las vías terrestres son obras de infraestructuras , que se diseñaron para mejorar el transporte y disminuir el tiempo que se tarda en movilizarse de un punto a otro, entre las vías terrestres están: carreteras, autopistas, caminos.</p>
      </header>

      <div class="row about-cols">

        <div class="col-md-4 wow fadeInUp">
          <div class="about-col">
            <div class="img">
              <img src="plantillas/img/carretera.jpg" alt="" class="img-fluid">
              <div class="icon"><i class="ion-ios-speedometer-outline"></i></div>
            </div>
            <h2 class="title"><a href="#">Carretera</a></h2>
            <p>
              La carretera o ruta es un camino público pavimentado que está dispuesto para el tránsito de vehículos. Por lo general se trata de vías anchas que permiten fluidez en la circulación.                  </p>
          </div>
        </div>

        <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
          <div class="about-col">
            <div class="img">
              <img src="plantillas/img/autopista.jpg" alt="" class="img-fluid">
              <div class="icon"><i class="ion-ios-list-outline"></i></div>
            </div>
            <h2 class="title"><a href="#">Autopista</a></h2>
            <p>
              Sed ut perspiciatis unde omnis iste natus error sit voluptatem  doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
            </p>
          </div>
        </div>

        <div class="col-md-4 wow fadeInUp" data-wow-delay="0.2s">
          <div class="about-col">
            <div class="img">
              <img src="plantillas/img/calle.jpg" alt="" class="img-fluid">
              <div class="icon"><i class="ion-ios-eye-outline"></i></div>
            </div>
            <h2 class="title"><a href="#">Avenida</a></h2>
            <p>
              es un vía especialmente reservada para automóviles, con un único carril hacia el mismo sentido y con limitación de acceso desde las propiedades colindantes. No tendrán acceso otros vehículos distintos de los automóviles.                  </p>
          </div>
        </div>

      </div>

    </div>
  </section><!-- #about -->

  <section id="Vehiculos">
    <div class="container">

      <header class="section-header">
        <h3>Tipos de Vehiculos</h3>
        <p>Los diferentes volúmenes de tráfico que se obtienen de las estaciones programadas durante el año y que clasifican los contadores de tráfico por automotores en ambos Sentidos de circulación.</p>
      </header>

      <div class="row about-cols">

        <div class="col-md-4 wow fadeInUp">
          <div class="about-col">
            <div class="img">
              <img src="plantillas/img/about-mission.jpg" alt="" class="img-fluid">
              <div class="icon"><i class="ion-ios-speedometer-outline"></i></div>
            </div>
            <h2 class="title"><a href="#">Our Mission</a></h2>
            <p>
              Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            </p>
          </div>
        </div>

        <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
          <div class="about-col">
            <div class="img">
              <img src="plantillas/img/about-plan.jpg" alt="" class="img-fluid">
              <div class="icon"><i class="ion-ios-list-outline"></i></div>
            </div>
            <h2 class="title"><a href="#">Our Plan</a></h2>
            <p>
              Sed ut perspiciatis unde omnis iste natus error sit voluptatem  doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
            </p>
          </div>
        </div>

        <div class="col-md-4 wow fadeInUp" data-wow-delay="0.2s">
          <div class="about-col">
            <div class="img">
              <img src="plantillas/img/about-vision.jpg" alt="" class="img-fluid">
              <div class="icon"><i class="ion-ios-eye-outline"></i></div>
            </div>
            <h2 class="title"><a href="#">Our Vision</a></h2>
            <p>
              Nemo enim ipsam voluptatem quia voluptas sit aut odit aut fugit, sed quia magni dolores eos qui ratione voluptatem sequi nesciunt Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet.
            </p>
          </div>
        </div>

      </div>

    </div>
  </section><!-- #about -->

@endsection
<script src="{{asset('plantillas/lib/jquery/jquery.min.js')}}"></script>
      <script src="{{asset('plantillas/lib/jquery/jquery-migrate.min.js')}}"></script>
      <script src="{{asset('plantillas/lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{asset('plantillas/lib/easing/easing.min.js')}}"></script>
      <script src="{{asset('plantillas/lib/superfish/hoverIntent.js')}}"></script>
      <script src="{{asset('plantillas/lib/superfish/superfish.min.js')}}"></script>
      <script src="{{asset('plantillas/lib/wow/wow.min.js')}}"></script>
      <script src="{{asset('plantillas/lib/waypoints/waypoints.min.js')}}"></script>
      <script src="{{asset('plantillas/lib/counterup/counterup.min.js')}}"></script>
      <script src="{{asset('plantillas/lib/owlcarousel/owl.carousel.min.js')}}"></script>
      <script src="{{asset('plantillas/lib/isotope/isotope.pkgd.min.js')}}"></script>
      <script src="{{asset('plantillas/lib/lightbox/js/lightbox.min.js')}}"></script>
      <script src="{{asset('plantillas/lib/touchSwipe/jquery.touchSwipe.min.js')}}"></script>
      <!-- Contact Form JavaScript File -->
      <script src="{{asset('plantillas/contactform/contactform.js')}}"></script>

      <!-- Template Main Javascript File -->
      <script src="{{asset('plantillas/js/main.js')}}"></script>

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>
@endpush
