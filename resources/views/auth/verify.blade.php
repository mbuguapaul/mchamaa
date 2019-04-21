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
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->

     <link href="{{asset('css/theme-1.css')}}" rel="stylesheet" type="text/css" media="all"/>
        <link href="{{asset('css/custom.css')}}" rel="stylesheet" type="text/css" media="all"/>
        
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" media="all"/>


</head>
<body>
  <style type="text/css">
    .listgroups:hover{
      background-color: #008285;
    }
  </style>
    <div>
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
                   <!--  <ul class="nav navbar-nav">
                        &nbsp;
                    </ul> -->

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                         <li><a href="/" style="color: #fff;">Home</a></li>
                       
                    </ul>
                </div>
            </div>

        </nav>
        
        
    
 <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-2"> </div>
        <div class="col-md-8">
            <div class="card">
                <center><img class="logo logo-dark" style="width:20%;" alt="Logo" src="{{asset('img/logo.png')}}"></center>
                 @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif
                    <br><br>
                <center><h3><b><div class="card-header">{{ __('Verify Your Email Address') }}</div></b></h3></center>

                <div class="card-body">
                   

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},<br><br>
                     <center><a style="background-color: #F1592D;" class="btn btn-primary" href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a></center>
                </div>
            </div>
        </div>



    <!-- ///////////////// -->
    </div>
</div>

         </div>  
<br><br><br><br><br><br><br><br>

          <div class="footer-container fixed-bottom" >
                    
            
                    
            <footer class="social bg-secondary-1">
            
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <h1 class="text-white">Feel free to contact us</h1>
                            <a href="#" class="text-white"><strong>contact@cEmgraphicsKenya.com</strong></a><br>
                           <br>
                            <span class="sub">© Copright 2019 Emgraphics. All Rights Reserved. </span>
                        </div>
                    </div>
                </div>
            
            </footer>
    <!-- Scripts -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   
</body>
</html>
