<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ __('Svc.System TDPA') }}</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('plantillas/img/syste.jpg') }}">
    <link rel="icon" type="image/png" href="{{ asset('plantillas/img/system.jpg') }}">

    <link href="{{ asset('proyect') }}https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('proyect') }}./plugins/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('proyect') }}./plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('proyect') }}./plugins/icon-kit/dist/css/iconkit.min.css">
    <link rel="stylesheet" href="{{ asset('proyect') }}./plugins/ionicons/dist/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('proyect') }}./plugins/perfect-scrollbar/css/perfect-scrollbar.css">
    <link rel="stylesheet" href="{{ asset('proyect') }}./plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('proyect') }}./plugins/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="{{ asset('proyect') }}./plugins/tempusdominus-bootstrap-4/build/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="{{ asset('proyect') }}./plugins/weather-icons/css/weather-icons.min.css">
    <link rel="stylesheet" href="{{ asset('proyect') }}./plugins/c3/c3.min.css">
    <link rel="stylesheet" href="{{ asset('proyect') }}./plugins/datedropper/datedropper.min.css">
    <link rel="stylesheet" href="{{ asset('proyect') }}./plugins/summernote/dist/summernote-bs4.css">
    <link rel="stylesheet" href="{{ asset('proyect') }}./plugins/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('proyect') }}./plugins/summernote/dist/summernote-bs4.css">
    <link rel="stylesheet" href="{{ asset('proyect') }}./plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
    <link rel="stylesheet" href="{{ asset('proyect') }}./plugins/mohithg-switchery/dist/switchery.min.css">
    <link rel="stylesheet" href="{{ asset('proyect') }}./plugins/weather-icons/css/weather-icons.min.css">
    <link rel="stylesheet" href="{{ asset('proyect') }}./plugins/chartist/dist/chartist.min.css">
    <link rel="stylesheet" href="{{ asset('proyect') }}./plugins/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="{{ asset('proyect') }}./plugins/fullcalendar/dist/fullcalendar.min.css">
    <link rel="stylesheet" href="{{ asset('proyect') }}./plugins/jquery-bar-rating/dist/themes/bars-1to10.css">
    <link rel="stylesheet" href="{{ asset('proyect') }}./plugins/jquery-bar-rating/dist/themes/bars-horizontal.css">
    <link rel="stylesheet" href="{{ asset('proyect') }}./plugins/jquery-bar-rating/dist/themes/bars-movie.css">
    <link rel="stylesheet" href="{{ asset('proyect') }}./plugins/jquery-bar-rating/dist/themes/bars-pill.css">
    <link rel="stylesheet" href="{{ asset('proyect') }}./plugins/jquery-bar-rating/dist/themes/bars-reversed.css">
    <link rel="stylesheet" href="{{ asset('proyect') }}./plugins/jquery-bar-rating/dist/themes/bars-square.css">
    <link rel="stylesheet" href="{{ asset('proyect') }}./plugins/jquery-bar-rating/dist/themes/css-stars.css">
    <link rel="stylesheet" href="{{ asset('proyect') }}./plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css">
    <link rel="stylesheet" href="{{ asset('proyect') }}./plugins/jquery-bar-rating/dist/themes/fontawesome-stars-o.css">
    <link rel="stylesheet" href="{{ asset('proyect') }}./plugins/bootstrap-slider/dist/css/bootstrap-slider.min.css">
    <link rel="stylesheet" href="{{ asset('proyect') }}./node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('proyect') }}./node_modules/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('proyect') }}./node_modules/ionicons/dist/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('proyect') }}./node_modules/icon-kit/dist/css/iconkit.min.css">
    <link rel="stylesheet" href="{{ asset('proyect') }}./node_modules/perfect-scrollbar/css/perfect-scrollbar.css">

    <link rel="stylesheet" href="{{ asset('proyect') }}./plugins/jquery-minicolors/jquery.minicolors.css">
    <link rel="stylesheet" href="{{ asset('proyect') }}./plugins/owl.carousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('proyect') }}./plugins/owl.carousel/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ asset('proyect') }}./dist/css/theme.min.css">
    <script src="{{ asset('proyect') }}./src/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        @include('layouts.page_templates.authh')

        <div class="modal fade apps-modal" id="appsModal" tabindex="-1" role="dialog" aria-labelledby="appsModalLabel" aria-hidden="true" data-backdrop="false">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ik ik-x-circle"></i></button>
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="quick-search">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4 ml-auto mr-auto">
                                    <div class="input-wrap">
                                        <input type="text" id="quick-search" class="form-control" placeholder="Search..." />
                                        <i class="ik ik-search"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body d-flex align-items-center">
                        <div class="container">
                            <div class="apps-wrap">
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-mail"></i><span>Message</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-users"></i><span>Accounts</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-shopping-cart"></i><span>Sales</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-briefcase"></i><span>Purchase</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-server"></i><span>Menus</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-clipboard"></i><span>Pages</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-message-square"></i><span>Chats</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-map-pin"></i><span>Contacts</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-box"></i><span>Blocks</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-calendar"></i><span>Events</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-bell"></i><span>Notifications</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-pie-chart"></i><span>Reports</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-layers"></i><span>Tasks</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-edit"></i><span>Blogs</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-settings"></i><span>Settings</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-more-horizontal"></i><span>More</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('proyect') }}https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script>window.jQuery || document.write('<script src="{{ asset('proyect') }}./src/js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
        <script src="{{ asset('proyect') }}./plugins/popper.js/dist/umd/popper.min.js"></script>
        <script src="{{ asset('proyect') }}./plugins/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="{{ asset('proyect') }}./plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
        <script src="{{ asset('proyect') }}./plugins/screenfull/dist/screenfull.js"></script>
        <script src="{{ asset('proyect') }}./plugins/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="{{ asset('proyect') }}./plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="{{ asset('proyect') }}./plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="{{ asset('proyect') }}./plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
        <script src="{{ asset('proyect') }}./plugins/jvectormap/jquery-jvectormap.min.js"></script>
        <script src="{{ asset('proyect') }}./plugins/jvectormap/tests/assets/jquery-jvectormap-world-mill-en.js"></script>
        <script src="{{ asset('proyect') }}./plugins/moment/moment.js"></script>
        <script src="{{ asset('proyect') }}./plugins/tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.min.js"></script>
        <script src="{{ asset('proyect') }}./plugins/d3/dist/d3.min.js"></script>
        <script src="{{ asset('proyect') }}./plugins/jquery.repeater/jquery.repeater.min.js"></script>
        <script src="{{ asset('proyect') }}./plugins/mohithg-switchery/dist/switchery.min.js"></script>
        <script src="{{ asset('proyect') }}./plugins/jquery-minicolors/jquery.minicolors.min.js"></script>
        <script src="{{ asset('proyect') }}./plugins/datedropper/datedropper.min.js"></script>
        <script src="{{ asset('proyect') }}./plugins/amcharts/amcharts.js"></script>
        <script src="{{ asset('proyect') }}./plugins/nestable/jquery.nestable.js"></script>
        <script src="{{ asset('proyect') }}./plugins/amcharts3/amcharts/amcharts.js"></script>
        <script src="{{ asset('proyect') }}./plugins/amcharts3/amcharts/gauge.js"></script>
        <script src="{{ asset('proyect') }}./plugins/amcharts3/amcharts/serial.js"></script>
        <script src="{{ asset('proyect') }}./plugins/amcharts3/amcharts/themes/light.js"></script>
        <script src="{{ asset('proyect') }}./plugins/amcharts3/amcharts/pie.js"></script>
        <script src="{{ asset('proyect') }}./plugins/ammap3/ammap/ammap.js"></script>
        <script src="{{ asset('proyect') }}./plugins/ammap3/ammap/maps/js/usaLow.js"></script>
        <script src="{{ asset('proyect') }}./plugins/chartist/dist/chartist.min.js"></script>
        <script src="{{ asset('proyect') }}./plugins/flot-charts/jquery.flot.js"></script>
        <script src="{{ asset('proyect') }}./plugins/flot-charts/jquery.flot.categories.js"></script>
        <script src="{{ asset('proyect') }}./plugins/flot-charts/curvedLines.js"></script>
        <script src="{{ asset('proyect') }}./plugins/flot-charts/jquery.flot.tooltip.min.js"></script>
        <script src="{{ asset('proyect') }}./plugins/jquery-kn 0ob/dist/jquery.knob.min.js"></script>
        <script src="{{ asset('proyect') }}./plugins/jvectormap/jquery-jvectormap.min.js"></script>
        <script src="{{ asset('proyect') }}./plugins/jvectormap/tests/assets/jquery-jvectormap-world-mill-en.js"></script>
        <script src="{{ asset('proyect') }}./plugins/fullcalendar/dist/fullcalendar.min.js"></script>
        <script src="{{ asset('proyect') }}./plugins/jquery-knob/dist/jquery.knob.min.js"></script>
        <script src="{{ asset('proyect') }}./plugins/bootstrap-slider/dist/bootstrap-slider.min.js"></script>
        <script src="{{ asset('proyect') }}./plugins/jquery-toast-plugin/dist/jquery.toast.min.js"></script>
        <script src="{{ asset('proyect') }}./node_modules/popper.js/dist/umd/popper.min.js"></script>
        <script src="{{ asset('proyect') }}./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="{{ asset('proyect') }}./node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
        <script src="{{ asset('proyect') }}./node_modules/screenfull/dist/screenfull.js"></script>
        <script src="{{ asset('proyect') }}./plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
        <script src="{{ asset('proyect') }}./plugins/summernote/dist/summernote-bs4.min.js"></script>
        <script src="{{ asset('proyect') }}./plugins/c3/c3.min.js"></script>
        <script src="{{ asset('proyect') }}./js/tables.js"></script>
        <script src="{{ asset('proyect') }}./js/widgets.js"></script>
        <script src="{{ asset('proyect') }}./js/charts.js"></script>
        <script src="{{ asset('proyect') }}./js/chart-chartist.js"></script>
        <script src="{{ asset('proyect') }}./js/rating.js"></script>
        <script src="{{ asset('proyect') }}./js/range-slider.js"></script>
        <script src="{{ asset('proyect') }}./js/alerts.js"></script>
        <script src="{{ asset('proyect') }}./dist/js/theme.min.js"></script>
        <script src="{{ asset('proyect') }}./js/datatables.js"></script>
        <script src="{{ asset('proyect') }}./js/form-components.js"></script>
        <script src="{{ asset('proyect') }}./plugins/owl.carousel/dist/owl.carousel.min.js"></script>
        <script src="{{ asset('proyect') }}./js/carousel.js"></script>
        <script language="JavaScript" type="text/javascript" src="{{ asset('proyect')}}./js/select/ciud.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
        <script>
            //    console.log(user);
                    $(document).ready(function(){
                        const user_rol = {!! json_encode(session()->get('rol')->first()) !!};
                        //(ocultarMostrar)();
                        if(user_rol=="Supremo"){
                            $("#listts").show("slow");
                            $("#añadir_us").show("slow");
                            $("#list_add").show("slow");
                            $("#list_em").show("slow");
                            $("#list_user").show("slow");
                            $("#list_glo").show("slow");
                            $("#depst").show("slow");
                            $("#vias").show("slow");
                            $("#vehiculos").show("slow");
                            $("#sensor_id").show("slow");
                            $("#list_sen").show("slow");
                            $("#ubicacion").show("slow");
                        }
                        if(user_rol=="Administrador"){
                            $("#listts").show("slow");
                            $("#list_em").show("slow");
                            $("#list_user").show("slow");
                            $("#depst").show("slow");
                            $("#vias").show("slow");
                            $("#añad_via").show("slow");
                            $("#vehiculos").show("slow");
                            $("#vehñadir").show("slow");
                            $("#sensor_id").show("slow");
                            $("#sensor_añ").show("slow");
                            $("#list_sen").show("slow");
                            $("#ubicacion").show("slow");
                            $("#ubicañadir").show("slow");
                            $("#estadistic").show("slow");
                            $("#formuss").show("slow");
                            $("#aforos").show("slow");
                            $("#regedit").show("slow");
                            $("#esta").show("slow");
                            $("#recolec").show("slow");
                            $("#demosimulacion").show("slow");
                        }
                        if(user_rol=="Personal"){
                            $("#depts").show("slow");
                            $("#vias").show("slow");
                            $("#añad_via").show("slow");
                            $("#vehiculos").show("slow");
                            $("#vehñadir").show("slow");
                            $("#sensor_id").show("slow");
                            $("#sensor_añ").show("slow");
                            $("#list_sen").show("slow");
                            $("#ubicacion").show("slow");
                            $("#ubicañadir").show("slow");
                            $("#estadistic").show("slow");
                            $("#formuss").show("slow");
                            $("#aforos").show("slow");
                            $("#regedit").show("slow");
                            $("#esta").show("slow");
                            $("#recolec").show("slow");
                        }
                        if(user_rol=="Usuario"){
                            $("#depst").show("slow");
                            $("#vias").show("slow");
                            $("#vehiculos").show("slow");
                            $("#sensor_id").show("slow");
                            $("#list_sen").show("slow");
                            $("#ubicacion").show("slow");
                            $("#estadistic").show("slow");
                            $("#formuss").show("slow");
                            $("#aforos").show("slow");
                            $("#regedit").show("slow");
                            $("#esta").show("slow");
                            $("#recolec").show("slow");
                            $("#formuss").show("slow");
                            $("#aforos").show("slow");
                            $("#regedit").show("slow");
                            $("#esta").show("slow");
                            $("#recolec").show("slow");
                            $("#demosimulacion").show("slow");
                        }
                    });


           </script>
        @yield('scripts')
    </body>
</html>
