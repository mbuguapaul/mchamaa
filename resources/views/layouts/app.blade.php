<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>e Chamaa</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     <link href="css/theme-1.css" rel="stylesheet" type="text/css" media="all"/>
        <link href="css/custom.css" rel="stylesheet" type="text/css" media="all"/>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top" style="background-color: #01A2A6;">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}" style="color: #fff;">
                        e-chamaa
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
                         <li><a href="/" style="color: #fff;">Home</a></li>
                        @guest
                            <li><a href="{{ route('login') }}" style="color: #fff;">Login</a></li>
                            <li><a href="{{ route('register') }}" style="color: #fff;">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre style="color: #fff;">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>

        </nav>
        </div>
        
        @yield('content')
    
            <footer class="social bg-secondary-1">
            
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <h1 class="text-white">Feel free to contact us</h1>
                            <a href="#" class="text-white"><strong>contact@emgraphicskenya.com</strong></a><br>
                            <ul class="social-icons">
                                <li>
                                    <a href="#">
                                        <i class="icon social_twitter"></i>
                                    </a>
                                </li>
                                
                                <li>
                                    <a href="#">
                                        <i class="icon social_facebook"></i>
                                    </a>
                                </li>
                                
                                <li>
                                    <a href="#">
                                        <i class="icon social_instagram"></i>
                                    </a>
                                </li>
                                
                                <li>
                                    <a href="#">
                                        <i class="icon social_dribbble"></i>
                                    </a>
                                </li>
                                
                                <li>
                                    <a href="#">
                                        <i class="icon social_tumblr"></i>
                                    </a>
                                </li>
                                
                                <li>
                                    <a href="#">
                                        <i class="icon social_pinterest"></i>
                                    </a>
                                </li>
                            </ul><br>
                            <span class="sub">© Copright 2019 Emgraphics. All Rights Reserved.</span>
                        </div>
                    </div>
                </div>
            
            </footer>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
