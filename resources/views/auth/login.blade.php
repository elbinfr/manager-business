<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{{ asset('images/clever.png') }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,400italic,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:300,200,100' rel='stylesheet' type='text/css'>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('fonts/font-awesome-4/css/font-awesome.min.css') }}">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />

</head>

<body class="texture">

<div id="cl-wrapper" class="login-container">

    <div class="middle-login">
        <div class="block-flat">
            <div class="header">
                <h3 class="text-center">
                    {{ config('app.name', 'Laravel') }}
                </h3>
            </div>
            <div>
                @if(count($errors) > 0)
                    <div class="alert alert-danger" style="margin-bottom: 0px;">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {!! Form::open([
                    'url'       => '/login',
                    'method'    => 'POST',
                    'class'     => 'form-horizontal',
                    'style'     => 'margin-bottom: 0px !important']) !!}

                    <div class="content">
                        <h4 class="title">Identificaci&oacute;n de usuario</h4>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" placeholder="Nombre de usuario" name="username" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <input type="password" placeholder="Contrase&ntilde;a" name="password" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="foot">
                        <button class="btn btn-primary" type="submit">
                            Ingresar al sistema
                        </button>
                    </div>

                {!! Form::close() !!}
            </div>
        </div>
        <div class="text-center out-links">
            <a href="http://nubedeideas.cloud/" target="_blank">
                &copy; 2016 Elbin Flores
            </a>
        </div>
    </div>

</div>

<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/general.js') }}"></script>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ asset('js/voice-commands.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>
