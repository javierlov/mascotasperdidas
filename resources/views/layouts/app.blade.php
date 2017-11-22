<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

         <!--  
        {{Html::style('bower_components/bootstrap/dist/css/bootstrap.min.css')}}

        {{Html::style('bower_components/bootstrap-material-design/dist/css/bootstrap-material-design.min.css')}}
        {{Html::style('bower_components/bootstrap-material-design/dist/css/ripples.min.css')}}
    -->

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

    @include('flash::message');

    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" 
                    data-target="#app-navbar-collapse">
                    <span class="sr-only">Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Registrarse</a></li>
                    @else

                    <li><a href="{{ route('task.index') }}">Tareas</a></li>
                    <li><a href="{{ route('profile.index') }}">Perfiles</a></li>
                    <li><a href="{{ route('mercaderia.index') }}">Mercaderia</a></li>
                    <li><a href="{{ route('tercero.index') }}">Tercero</a></li>

                    <li><a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Salir</a></li>

                        <li class="dropdown">

                         <a href="#" class="dropdown-toggle" data-toggle="dropdown" 
                         role="button" aria-expanded="false">
                         {{ Auth::user()->name }} <span class="caret"></span>
                     </a>

                     <ul class="dropdown-menu" role="menu">

                        <li><a href="{{ route('task.index') }}">Tareas</a></li>
                        <li><a href="{{ route('profile.index') }}">Profile</a></li>
                        <li><a href="{{ route('mercaderia.index') }}">Mercaderia</a></li>
                        <li><a href="{{ route('tercero.index') }}">Tercero</a></li>
                        <li><a href="{{ route('book.index') }}">Book</a></li>

                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Salir</a>

                            <form id="logout-form" action="{{ route('logout') }}" 
                            method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>

                </ul>

            </li>
            @endif
        </ul>
    </div>
</div>
</nav>

@yield('content')

@if (Session::has('generalmsg'))
    <div class="alert alert-danger" role='alert'>{{ Session::get('generalmsg') }}</div>
@endif

</div>

<!-- Scripts -->

 <!-- 
        {{Html::script('bower_components/jquery/dist/jquery.min.js')}}
         {{Html::script('bower_components/bootstrap/dist/js/bootstrap.min.js')}}
         {{Html::script('bower_components/bootstrap-material-design/dist/js/ripples.min.js')}}
         {{Html::script('bower_components/bootstrap-material-design/dist/js/material.min.js')}}
        <script type="text/javascript" >
            $(document).on('ready', function(){
                $.material.init();
            });
        </script>

    -->         
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
