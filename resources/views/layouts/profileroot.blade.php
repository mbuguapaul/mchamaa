
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Mchamaa| profile</title>
  
  
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css'>

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
                         <li><a href="/home" style="color: #fff;">Myaccount</a></li>
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

        
    @if(Session::has('status'))
 
      <div class="col-md-12">
        <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <center>{{Session::get('status')}}</center>


        </div>
      </div>
    
@endif



  <div class="container">
    <div class="row profile">
    <div class="col-md-3">
      <div class="profile-sidebar">
        <!-- SIDEBAR USERPIC -->
        <div class="profile-userpic">
          <img src="{{asset('img/avatar/'.Auth::user()->avatar)}}" class="img-responsive" alt="">
        </div>
        <!-- END SIDEBAR USERPIC -->
        <!-- SIDEBAR USER TITLE -->
        <div class="profile-usertitle">
          <div class="profile-usertitle-name">
            {{ Auth::user()->name }} &nbsp {{ Auth::user()->sname }}
          </div>
          
        </div>
        <!-- END SIDEBAR USER TITLE -->


        <form method="post" action="updateimg" enctype="multipart/form-data">
      <div class="form-group">
                               
                            <input type="file"  name="prfimage" id="file" onchange="return fileValidation()">
                            <!-- <div id="imagePreview"></div> -->
                            <div id="red" style="color: red;"></div>
                            </div>
                            <input type="hidden" name="_token"value="{{csrf_token()}}"/>

                            <input type="submit" class="mybtn btn" style="background: #01A2A6; color: #fff; border-radius: 7px;" value="Update profile" name="">
                          </form>



        <!-- SIDEBAR BUTTONS -->
     
        <!-- END SIDEBAR BUTTONS -->
        <!-- SIDEBAR MENU -->
       <!--  <div class="profile-usermenu">
          <ul class="nav">
            <li class="active">
              <a href="#">
              <i class="glyphicon glyphicon-home"></i>
              Overview </a>
            </li>
            <li>
              <a href="https://codepen.io/jasondavis/pen/jVRwaG?editors=1000">
              <i class="glyphicon glyphicon-user"></i>
              Account Settings </a>
            </li>
            <li>
              <a href="#" target="_blank">
              <i class="glyphicon glyphicon-ok"></i>
              Tasks </a>
            </li>
            <li>
              <a href="#">
              <i class="glyphicon glyphicon-flag"></i>
              Help </a>
            </li>
          </ul>
        </div> -->
        <!-- END MENU -->
         
                       
                                           
        
        
      </div>
    </div>
    <div class="col-md-9">
            <div class="profile-content">
        @yield('content')
            </div>
    </div>
  </div>
</div>
  
  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script type="text/javascript">
            function fileValidation(){
    var fileInput = document.getElementById('file');
    var filePath = fileInput.value;
     var FileSize = file.files[0].size / 1024 / 1024; // in MB
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif|\.JPG)$/i;

    if(!allowedExtensions.exec(filePath)){
        // alert('Please upload file having extensions .jpeg/.jpg/.png/.gif/.JPG only.');
        document.getElementById('red').innerHTML = 'invalid file format. Please choose .jpeg, .jpg, .png';

fileInput.value = '';
        return false;


    }else{
        //Image preview

        if (FileSize > 3) {
             document.getElementById('red').innerHTML = 'The file is too big. Exceeds 3MB';
           // $(file).val(''); //for clearing with Jquery
                
        fileInput.value = '';
        return false;
        } else {


             if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').innerHTML = '<img src="'+e.target.result+'"/>';
            };
            reader.readAsDataURL(fileInput.files[0]);
        }


        }
       

    }
}
        </script>
</body>

</html>
