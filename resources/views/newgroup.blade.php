
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>M-Chamaa</title>


  <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

   <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" media="all"/>
   <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.2/css/intlTelInput.css'>
<link rel='stylesheet' href='https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css'>
<link href="{{asset('css/theme-1.css')}}" rel="stylesheet" type="text/css" media="all"/>

      <link rel="stylesheet" href="{{asset('css/style.css')}}">

  
</head>

<body>
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
                        <li><a href="/home" style="color: #fff;">My account</a></li>
                            

                             <li style="color: #fff;">
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                        @endguest
                    </ul>
                </div>
            </div>

        </nav>

    @if(session('status'))
        <div class="container">
          <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          {{session('status')}}
        </div>
        </div>
        @endif
     @if(count($errors)>0)
       <div class="container">
          <div class="alert alert-danger">
         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h2>! Error occured, please check following conditions.</h2>
        <ol>
          @foreach($errors->all() as $error)
         <li>{{$error}}</li>

          @endforeach
          </ol>
 </div>
       </div>
        @endif


  <!-- Multi step form --> 
<section class="multi_step_form ">  
  <form method="post" action="{{url('nwgroup')}}" id="msform"> 
    {{ csrf_field() }}
    <!-- Tittle -->
    <div class="tittle">
      <center><img class="logo logo-dark" style="width:20%;" alt="Logo" src="{{asset('img/logo.png')}}"></center>
      <h2>Create a New Group</h2>
      <!-- <p>In order to use this service, you have to complete this verification process</p> -->
    </div>
    <!-- progressbar -->
    <ul id="progressbar">
      <li class="active">Set up your group</li>  
      <li>Upload Documents</li> 
      <li>Account Set up</li>
    </ul>


    <!-- fieldsets -->
   
    <fieldset>
      <!-- <h3><b> Setup your group</b></h3> -->
      
     
      <div class="form-row"> 
        
          <div class="form-group fg_2"> 
            <label> Group name</label>
          <input type="text" class="form-control" placeholder="Your New group name:" name="group_name">
         </div>
          <!-- <input type="tel" id="phone" class="form-control" placeholder="+254">  -->
          <!-- <input type="text" class="form-control" placeholder="+2541123456789"> -->
          <label> Group description</label>
                    <textarea class="form-control" placeholder="Brief Group description, Describe objectives, Mission, Vision etc" name="description"></textarea>
     
      </div> 
<br>
      
      <button type="button" class="next action-button">Continue</button>  
    </fieldset>





    <fieldset>
      
      <div class="input-group fg_2"> 
        

              <input type="number"  class="form-control" placeholder="Enter amount of contribution" name="contribution_amount" >
        <!-- <div class="custom-file">
          <input type="file" class="custom-file-input" id="upload">
          <label class="custom-file-label" for="upload"><i class="ion-android-cloud-outline"></i>Choose file</label>
        </div> -->
      </div>

      <div class="form-group "> 
        <label>frequency of contribution</label>
        <select class="product_select" name="contribution_frequency" >
          <option data-display="Monthly contribution" value="1">Monthly</option> 
          <option value="2">weekly</option>
          <option value="3">Daily</option> 
        </select>
      </div> 
<br><br><br>
           <button type="button" class="action-button previous previous_button">Back</button>
      <button type="button" class="next action-button">Continue</button>  
    </fieldset>  
    <fieldset>
      <h3>Create Security Questions</h3>
      <h6>Please update your account with security questions</h6> 
     <!--  <div class="form-group"> 
        <select class="product_select">
          <option data-display="1. Choose A Question">1. Choose A Question</option> 
          <option>2. Choose A Question</option>
          <option>3. Choose A Question</option> 
        </select>
      </div>  -->
      <label>M-pesa transaction number</label>
      <div class="form-group fg_2"> 
        <input type="number" name="pay_number" class="form-control"  value="0{{ Auth::user()->phone }}">
      </div> 
      <!-- <div class="form-group"> 
        <select class="product_select">
          <option data-display="1. Choose A Question">1. Choose A Question</option> 
          <option>2. Choose A Question</option>
          <option>3. Choose A Question</option> 
        </select>
      </div>  -->
      <!-- <div class="form-group fg_3"> 
        <input type="text" class="form-control" placeholder="Anwser here:">
      </div>  -->

      <button type="button" class="action-button previous previous_button">Back</button> 
      <button type="submit" class="action-button submit" value="submit"> submit</button>
    </fieldset>  
  </form>  
</section> 
<!-- End Multi step form -->






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
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.2/js/intlTelInput.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js'></script>

  

    <script  src="{{asset('js/index.js')}}"></script>



</body>

</html>
