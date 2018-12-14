<!DOCTYPE html>
<html>


<!-- Mirrored from www.wms.samenlinea.com/inspinia/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 Jun 2018 23:33:58 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">


    <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <!-- Toastr style -->
    <link href="{{ asset('css/plugins/toastr/toastr.min.css')}}" rel="stylesheet">

    <!-- Gritter -->
    <link href="{{ asset('js/plugins/gritter/jquery.gritter.css')}}" rel="stylesheet">
    @yield('includes')

    <link href="{{ asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{ asset('css/style.css')}}" rel="stylesheet">

</head>

<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation"> <!-- menu izquierdo -->
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    @yield('Menu')
                </ul>
            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg dashbard-1"> <!-- cabecera de la pagina-->
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                  <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#">
                            <i class="fa fa-bars"></i>     
                        </a>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar sesión') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                            </form>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-12">
                    @yield('title')
                </div>
            </div>
                
             <!-- cuerpo de la pagina-->
                @yield('content')
            
        </div>


        <div class="row">   <!-- pie de pagina-->
            <div class="col-lg-12">
                <div class="wrapper wrapper-content">
                        
                    <div class="row">
                        <div class="col-lg-4">
                        </div>

                    </div>
                </div>
                <div class="footer">
                    
                </div>
            </div>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script type="text/javascript" src="{{ asset('js/jquery-2.1.1.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

    <!-- Flot -->
    <script type="text/javascript" src="{{ asset('js/plugins/flot/jquery.flot.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/flot/jquery.flot.tooltip.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/flot/jquery.flot.spline.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/flot/jquery.flot.resize.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/flot/jquery.flot.pie.js') }}"></script>


    <!-- Peity -->
    <script type="text/javascript" src="{{ asset('js/plugins/peity/jquery.peity.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/demo/peity-demo.js') }}"></script>

    <!-- Custom and plugin javascript -->
    <script type="text/javascript" src="{{ asset('js/inspinia.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/pace/pace.min.js') }}"></script>


    <!-- jQuery UI -->
    <script type="text/javascript" src="{{ asset('js/plugins/jquery-ui/jquery-ui.min.js') }}"></script>

    <!-- GITTER -->
    <script type="text/javascript" src="{{ asset('js/plugins/gritter/jquery.gritter.min.js') }}"></script>

    <!-- Sparkline -->
    <script type="text/javascript" src="{{ asset('js/plugins/sparkline/jquery.sparkline.min.js') }}"></script>

    <!-- Sparkline demo data  -->
    <script type="text/javascript" src="{{ asset('js/demo/sparkline-demo.js') }}"></script>

    <!-- ChartJS-->
    <script type="text/javascript" src="{{ asset('js/plugins/chartJs/Chart.min.js') }}"></script>

    <!-- Toastr -->
    <script type="text/javascript" src="{{ asset('js/plugins/toastr/toastr.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/datapicker/bootstrap-datepicker.js') }}"></script>
    @yield('mainscript')



</body>

<!-- Mirrored from www.wms.samenlinea.com/inspinia/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 Jun 2018 23:38:03 GMT -->
</html>
