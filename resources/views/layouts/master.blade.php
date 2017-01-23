<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{{ asset('images/clever.png') }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,400italic,700,800' rel='stylesheet' >
    <link href='http://fonts.googleapis.com/css?family=Raleway:300,200,100' rel='stylesheet' >

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.gritter.css') }}">

    <link rel="stylesheet" href="{{ asset('fonts/font-awesome-4/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pygments.css') }}">

    <link rel="stylesheet" href="{{ asset('css/nanoscroller.css') }}" >
    <link rel="stylesheet" href="{{ asset('css/bootstrap-switch.css') }}" >
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datetimepicker.css') }}" >
    <link rel="stylesheet" href="{{ asset('plugins/select2/select2-bootstrap.css') }}" >
    <link rel="stylesheet" href="{{ asset('css/slider.css') }}" >
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap.min.css') }}" >
    <link rel="stylesheet" href="{{ asset('css/fuentes.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/my-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom-style.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert/sweetalert.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/icheck/skins/square/blue.css') }}" >
</head>

<body>

<!-- Fixed navbar -->
<div id="head-nav" class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="fa fa-gear"></span>
            </button>
            <a href="#" class="navbar-brand"><span class="font-dosis">Manager Business</span></a>
        </div>
        <div class="navbar-collapse collapse">

            <ul class="nav navbar-nav navbar-right user-nav">
                <li class="dropdown profile_menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="padding-top: 15px;">
                        <img alt="Avatar" src="images/user.png"/>
                        {{ Auth::user()->empleado->printUserName() }}
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu menu-usuario">
                        <li><a href="#">My Account</a></li>
                        <li><a href="#">Profile</a></li>
                        <li><a href="#">Messages</a></li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{ url('/logout') }}"
                               onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                Salir
                            </a>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right not-nav">
                <li class="button dropdown">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa icon-alarm"></i><span class="bubble">2</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="nano nscroller">
                                <div class="content">
                                    <ul>
                                        <li>
                                            <a href="#"><i class="fa fa-cloud-upload info">
                                                </i><b>Daniel</b> is now following you <span
                                                        class="date">2 minutes ago.</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <ul class="foot">
                                <li><a href="#">View all activity </a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>

        </div>
        <!--/.nav-collapse -->
    </div>
</div>

<div id="cl-wrapper" class="fixed-menu">

    <!-- INICIO DE MENU VERTICAL +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
    <div class="cl-sidebar">
        <div class="cl-toggle"><i class="fa fa-bars"></i></div>
        <div class="cl-navblock">
            <div class="menu-space">
                <div class="content">
                    <ul class="cl-vnavigation">
                        @include('layouts.menu')
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- FIN DE MENU VERTICAL +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->

    <div class="container-fluid" id="pcont">

        <!-- TITULO DE SECCION ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
        <div class="page-head">
            <ol class="breadcrumb" id="text-header">
                <li><span>Dashboard</span></li>
            </ol>
        </div>
        <!-- FIN TITULO DE SECCION +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->

        <!-- CONTENIDO PRINCIPAL ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
        <div class="cl-mcont" id="main-content">
            @yield('main-content')
        </div>
        <!-- FIN TITULO DE SECCION ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
    </div>

</div>

@include('layouts.custom')

<!-- SCRIPTS -->
<script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.nanoscroller.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.sparkline.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/general.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery-ui.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.nestable.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap-switch.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap-datetimepicker.js') }}"></script>

<script type="text/javascript" src="{{ asset('plugins/select2/select2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap-slider.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.gritter.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('js/parsley.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/icheck/icheck.min.js') }}"></script>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script type="text/javascript" src="{{ asset('js/voice-commands.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/sweetalert/sweetalert.min.js') }}"></script>


<script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/events.js') }}"></script>

<script type="text/javascript">

    (function(){
        //initialize the javascript
        App.init();

    }());

</script>

</body>
</html>