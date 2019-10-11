@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'home', 'title' => __('Inicio')])

@section('content')
<div class="container" style="height: auto;">
  <div class="row justify-content-center">
      <div class="col-lg-7 col-md-8">
          <h1 class="text-white text-center">{{ __('Sistema de Control Vehicular.') }}</h1>
      </div>
  </div>
</div>
<link href="{{asset('plantillas')}}/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link href="{{asset('plantillas')}}/lib/animate/animate.min.css" rel="stylesheet">
<link href="{{asset('plantillas')}}/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
<link href="{{asset('plantillas')}}/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
<link href="{{asset('plantillas')}}/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

<link href="{{asset('plantillas')}}css/sweetalert2.css" rel="stylesheet">

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
          <li><a href="#Vehiculos">Vehiculos</a></li>
          <li><a href="#Vias">Vias</a></li>
          <li><a href="#team">Sistema</a></li>
          
          <li><a href="login.html">Iniciar Sesion</a></li>
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
            <div class="carousel-background"><img src="img/1.jpg" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>Sistema de Control Vehicular TPDA</h2>
                <p>Dado el carácter dinámico que presentan los volúmenes de tránsito (TRÁNSITO PROMEDIO DIARIO ANUAL), 
                  es necesario conocer las variaciones periódicas que tiene el mismo dentro de las horas de máxima demanda, en las horas del día, en los días de la semana y en los meses del año. Así mismo, se debe considerar las variaciones de los volúmenes de tránsito en función de su distribución por carriles, su distribución direccional, y su composición.</p>
                <a href="#featured-services" class="btn-get-started scrollto">Registrarse</a>
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <div class="carousel-background"><img src="img/2.jpg" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>Sistema de Control Vehicular TDMA</h2>
                <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut.</p>
                <a href="#featured-services" class="btn-get-started scrollto">Registrarse</a>
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <div class="carousel-background"><img src="img/3.jpg" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>Deterioros de la Superficie</h2>
                <p>Es la desintegración total de la superficie de rodadura que puede extenderse a otras capas del pavimento, formando una cavidad de bordes y profundidades irregulares. Tambien se considera en el afloramiento de un material bituminoso de la mezcla asfáltica a la superficie del pavimento, formando una película contínua de ligante, creando una superficie brillante, reflectante, resbaladiza y pegajosa durante el tiempo cálido.</p>
                <a href="#featured-services" class="btn-get-started scrollto">Registrarse</a>
              </div>
            </div>
          </div>

          <div class="carousel-item">
            
            <div class="carousel-background"><img src="img/4.jpg" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>Aplicacion del Calculo Estructural del TPDA</h2>
                <p>La capacidad se define como el máximo número de vehículos que pueden circular por una vía en un periodo determinado bajo las condiciones prevalecientes de la infraestructura vial, del tránsito y de los dispositivos de control. Refleja la habilidad de la vía para acomodar una corriente de movimiento de vehículos.</p>
                <a href="#featured-services" class="btn-get-started scrollto">Registrarse</a>
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <div class="carousel-background"><img src="img/5.jpg" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>Tráfico y Viavilidad</h2>
                <p>En medida que cualquier ciudad crece las necesidades de sus habitantes se incrementan notoriamente generando una “dinámica de ciudad” que genera movimiento económico, poblacional y por ende vehicular (mientras una ciudad crece el tráfico vehicular se incrementa) por lo que el trasladarse de un punto de la ciudad a otro se vuelve indispensable.</p>
                <a href="#featured-services" class="btn-get-started scrollto">Registrarse</a>
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
  </section><!-- #intro -->

  <main id="main">

    <!--==========================
      Featured Services Section
    ============================-->
    

    <!--==========================
      About Us Section
    ============================-->
    <section id="Vias">
      <div class="container">

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
                <img src="img/calle.jpg" alt="" class="img-fluid">
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


    <!--==========================
      Services Section
    ============================-->
  

    <!--==========================
      Contact Section
    ============================-->
    <section id="contact" class="section-bg wow fadeInUp">
      <div class="container">

        <div class="section-header">
          <h3>Contactos</h3>
          <p>Cual quier duda o problemas con el sistema, datos erroneos o errores encontrados comunicarse</p>
        </div>

        <div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address">
              <i class="ion-ios-location-outline"></i>
              <h3>Direccion</h3>
              <address>Av. Santa cruz, America</address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="ion-ios-telephone-outline"></i>
              <h3>Numero Telefonico</h3>
              <p><a href="tel:+155895548855"> 68505794</a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="ion-ios-email-outline"></i>
              <h3>Email</h3>
              <p><a href="mailto:info@example.com">SystemCV@gmail.com</a></p>
            </div>
          </div>

        </div>

        <div class="form">
          <div id="sendmessage">Envianos tus dudas. Gracias!</div>
          <div id="errormessage"></div>
          <form action="" method="post" role="form" class="contactForm">
            <div class="form-row">
              <div class="form-group col-md-6">
                <input type="text" name="name" class="form-control" id="name" placeholder="Nombre" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validation"></div>
              </div>
              <div class="form-group col-md-6">
                <input type="email" class="form-control" name="email" id="email" placeholder="Email" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validation"></div>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Asunto" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
              <div class="validation"></div>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Mensaje"></textarea>
              <div class="validation"></div>
            </div>
            <div class="text-center"><button type="submit">Enviar Mensaje</button></div>
          </form>
        </div>

      </div>
    </section><!-- #contact -->

  </main>

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">
            <h3>SVC.Sytem</h3>
            <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus. Scelerisque felis imperdiet proin fermentum leo. Amet volutpat consequat mauris nunc congue.</p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="ion-ios-arrow-right"></i> <a href="#">Home</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#">About us</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#">Services</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              A108 Adam Street <br>
              New York, NY 535022<br>
              United States <br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>

            <div class="social-links">
              <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
              <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
              <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
              <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
            </div>

          </div>

          <div class="col-lg-3 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna veniam enim veniam illum dolore legam minim quorum culpa amet magna export quem marada parida nodela caramase seza.</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit"  value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>BizPage</strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=BizPage
        -->
        Best <a href="https://bootstrapmade.com/">Bootstrap Templates</a> by BootstrapMade
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/isotope/isotope.pkgd.min.js"></script>
  <script src="lib/lightbox/js/lightbox.min.js"></script>
  <script src="lib/touchSwipe/jquery.touchSwipe.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>
@endsection
