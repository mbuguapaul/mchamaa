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
<body >

  
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
                        M-chamaa
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
        
        
        @yield('content')
     <footer class="social bg-secondary-1">
            
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <h1 class="text-white">Feel free to contact us</h1>
                            <a href="#" class="text-white"><strong>contact@cEmgraphicsKenya.com</strong></a><br>
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
                            <span class="sub">© Copright 2019 Emgraphics. All Rights Reserved. </span>
                        </div>
                    </div>
                </div>
            
            </footer>
         </div> 



    <!-- Scripts -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
    import Vue from 'vue'
import App from './App'
import chat-messages from './components/chatMessages'
import router from './router' //this will import router/index.js  
</script>

    <script type="text/javascript">
    $(document).ready(function () {
  var navListItems = $('div.setup-panel div a'),
          allWells = $('.setup-content'),
          allNextBtn = $('.nextBtn');

  allWells.hide();

  navListItems.click(function (e) {
      e.preventDefault();
      var $target = $($(this).attr('href')),
              $item = $(this);

      if (!$item.hasClass('disabled')) {
          navListItems.removeClass('btn-primary').addClass('btn-default');
          $item.addClass('btn-primary');
          allWells.hide();
          $target.show();
          $target.find('input:eq(0)').focus();
      }
  });

  allNextBtn.click(function(){
      var curStep = $(this).closest(".setup-content"),
          curStepBtn = curStep.attr("id"),
          nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
          curInputs = curStep.find("input[type='text'],input[type='url']"),
          isValid = true;

      $(".form-group").removeClass("has-error");
      for(var i=0; i<curInputs.length; i++){
          if (!curInputs[i].validity.valid){
              isValid = false;
              $(curInputs[i]).closest(".form-group").addClass("has-error");
          }
      }

      if (isValid)
          nextStepWizard.removeAttr('disabled').trigger('click');
  });

  $('div.setup-panel div a.btn-primary').trigger('click');
});
</script>
</body>
</html>
