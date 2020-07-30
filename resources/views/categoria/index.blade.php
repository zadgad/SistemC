<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Svc.System TDPA</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link href="{{asset('plantillas/img/syste.jpg')}}" rel="icon">
    <link href="{{asset('plantillas/img/system.jpg')}}" rel="apple-touch-icon">
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

    <header id="header">


        <div class="container-fluid">

          <div id="logo" class="pull-left">
            <h1><a href="#intro" class="scrollto">SVC.Sytem</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="#intro"><img src="img/logo.png" alt="" title="" /></a>-->
          </div>

          <nav id="nav-menu-container">
            <ul class="nav-menu">
              <li class="menu-active"><a href="#intro">Inicio</a></li>

              {{--  <li><a href="{{ route('login') }}" >Iniciar Sesion</a></li>   --}}
              @guest
              <li><a href={{route("login")}} >Iniciar sesion</a></li>

              {{--  <li><a href="{{ route('register') }}">Registrarse</a></li>  --}}
          @else
              <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                      {{ Auth::user()->name }} <span class="caret"></span>
                  </a>

                  <ul class="dropdown-menu">
                      <li>
                          <a href=logout
                              onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                              Logout
                          </a>

                          <form id="logout-form" action=logout method="POST" style="display: none;">
                              {{ csrf_field() }}
                          </form>
                      </li>
                  </ul>
              </li>
          @endguest


            </ul>
          </nav><!-- #nav-menu-container -->
        </div>
      </header><!-- #header -->
      <section id="intro">
        <div class="intro-container">
          <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

            <ol class="carousel-indicators"></ol>

            <div class="carousel-inner" role="listbox">

              <div class="carousel-item active">
                <div class="carousel-background"><img src="{{url('plantillas/img/1.jpg')}}" alt=""></div>
                <div class="carousel-container">
                  <div class="carousel-content">
                    <h2>Sistema de Control Vehicular TPDA</h2>
                    <p>Dado el carácter dinámico que presentan los volúmenes de tránsito (TRÁNSITO PROMEDIO DIARIO ANUAL),
                      es necesario conocer las variaciones periódicas que tiene el mismo dentro de las horas de máxima demanda, en las horas del día, en los días de la semana y en los meses del año. Así mismo, se debe considerar las variaciones de los volúmenes de tránsito en función de su distribución por carriles, su distribución direccional, y su composición.</p>
                      <a href="{{ route('registro') }}" class="btn-get-started scrollto">Registrarse</a>

                  </div>
                </div>
              </div>

              <div class="carousel-item">
                <div class="carousel-background"><img src="{{url('plantillas/img/2.jpg')}}" alt=""></div>
                <div class="carousel-container">
                  <div class="carousel-content">
                    <h2>Sistema de Control Vehicular TDMA</h2>
                    <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut.</p>
                    <a href="{{ route('registro') }}" class="btn-get-started scrollto">Registrarse</a>
                  </div>
                </div>
              </div>

              <div class="carousel-item">
                <div class="carousel-background"><img src="{{asset('plantillas/img/3.jpg')}}" alt=""></div>
                <div class="carousel-container">
                  <div class="carousel-content">
                    <h2>Deterioros de la Superficie</h2>
                    <p>Es la desintegración total de la superficie de rodadura que puede extenderse a otras capas del pavimento, formando una cavidad de bordes y profundidades irregulares. Tambien se considera en el afloramiento de un material bituminoso de la mezcla asfáltica a la superficie del pavimento, formando una película contínua de ligante, creando una superficie brillante, reflectante, resbaladiza y pegajosa durante el tiempo cálido.</p>
                    <a href="{{ route('registro') }}" class="btn-get-started scrollto">Registrarse</a>
                  </div>
                </div>
              </div>

              <div class="carousel-item">

                <div class="carousel-background"><img src="{{asset('plantillas/img/4.jpg')}}" alt=""></div>
                <div class="carousel-container">
                  <div class="carousel-content">
                    <h2>Aplicacion del Calculo Estructural del TPDA</h2>
                    <p>La capacidad se define como el máximo número de vehículos que pueden circular por una vía en un periodo determinado bajo las condiciones prevalecientes de la infraestructura vial, del tránsito y de los dispositivos de control. Refleja la habilidad de la vía para acomodar una corriente de movimiento de vehículos.</p>
                    <a href="{{ route('registro') }}" class="btn-get-started scrollto">Registrarse</a>
                  </div>
                </div>
              </div>

              <div class="carousel-item">
                <div class="carousel-background"><img src="{{asset('plantillas/img/5.jpg')}}" alt=""></div>
                <div class="carousel-container">
                  <div class="carousel-content">
                    <h2>Tráfico y Viavilidad</h2>
                    <p>En medida que cualquier ciudad crece las necesidades de sus habitantes se incrementan notoriamente generando una “dinámica de ciudad” que genera movimiento económico, poblacional y por ende vehicular (mientras una ciudad crece el tráfico vehicular se incrementa) por lo que el trasladarse de un punto de la ciudad a otro se vuelve indispensable.</p>
                    <a href="{{ route('registro') }}" class="btn-get-started scrollto">Registrarse</a>
                  </div>
                </div>
              </div>

            </div>

            <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>

            <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
              <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>

          </div>
        </div>

        <div class="container">
          <div class="copyright">
            &copy; Copyright <strong>Svc.System TDPA</strong>. Todos Los Derechos Reservados ZAD
          </div>
          <div class="credits">
            <!--
              All the links in the footer should remain intact.
              You can delete the links only if you purchased the pro version.
              Licensing information: https://bootstrapmade.com/license/
              Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=BizPage
            -->
            {{-- Best <a href="https://bootstrapmade.com/">Bootstrap Templates</a> by BootstrapMade --}}
          </div>
        </div>

      </section><!-- #intro -->



      </footer><!-- #footer -->

      {{-- <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a> --}}

      <!-- JavaScript Libraries -->
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

    </body>
    </html>
