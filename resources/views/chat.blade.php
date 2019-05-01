<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>M-chamaa</title>
  <!-- Custom fonts for this template-->
  <link href="{{asset('css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
 

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">





    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style=" position: fixed; z-index: 1">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        
        <div class="sidebar-brand-text mx-3"> <img class="logo logo-dark" style="width:40%;" alt="Logo" src="{{asset('img/Untitled3.png')}}"><sup></sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0" >

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        @foreach($groups as $groupd)
        <a class="nav-link" href="/gs/{{$groupd->id}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>
           Dashboard
          </span></a>
          @endforeach
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
     
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-money-bill-alt"></i>
          <span>Deposits</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
             @foreach($groups as $groupd)
            
           
            
        
          
            <a class="collapse-item" href="/gs/deposits/{{$id=$groupd->id}}">Deposits</a>
           
        @endforeach
            
            <!-- <a class="collapse-item" href="cards.html">Cards</a> -->
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-money-bill-wave"></i>
          <span>Withdrawals</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
        @foreach($groups as $groupw)
            
           
            
        
          
            <a class="collapse-item" href="/gs/withdraws/{{$id=$groupw->id}}">Withdraws</a>
           
        @endforeach
          
           <!--  <a class="collapse-item" href="utilities-border.html">Borders</a>
            <a class="collapse-item" href="utilities-animation.html">Animations</a>
            <a class="collapse-item" href="utilities-other.html">Other</a> -->
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="members" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-users"></i>
          <span>Members</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
           @foreach($groups as $groupm)
            
           
            <a class="collapse-item" href="/gs/members/{{$id=$groupm->id}}">Members</a>
             @foreach($mygroup as $mygroupm)
            @if($mygroupm->user_level==1)
        
            @else
            <a class="collapse-item" href="/gs/invites/{{$id=$mygroupm->id}}">Invites</a>
            @endif
            @endforeach
        @endforeach
          </div>
        </div>
      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Reports</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        @foreach($groups as $groupc)
        <a class="nav-link" href="/gs/chat/{{$id=$groupc->id}}">
          @endforeach
          <i class="fas fa-fw fa-comments"></i>
          <span>chats</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
<div class="row">
  <div class="col-sm-2"></div>
  <div class="col-md-10">
    
 

      
        <!-- start error and status -->
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

        <!-- error and status -->
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
     
         


  
  <style type="text/css">
    
    body {
  
}
.page-header {

  background: #006A4E;
  margin: 0;
  padding: 20px 0 10px;
  color: #FFFFFF;
  position: fixed;
  width: 100%;
  z-index: 1;
  overflow-y: scroll;
}
.main {
background: #E5DDD5 url("https://www.toptal.com/designers/subtlepatterns/patterns/sports.png") repeat;

  height: 100vh;
  overflow-y: scroll;
  /*padding-top: ;*/
   /*z-index: -1;*/
   /*overflow: auto;*/
    overflow-x:hidden;
    position:fixed;
    width: 80%;
}

.chat-log {
  
/*overflow-y: scroll;*/
  padding: 40px 0 114px;
  height: auto;
  overflow: auto;
}
.chat-log__item {

  background: #C6EAEB;
  padding: 10px;
  margin: 0 auto 20px;
  max-width: 80%;
  float: left;
  border-radius: 4px;
  box-shadow: 0 1px 2px rgba(0,0,0,.1);
  clear: both;
}

.chat-log__item.chat-log__item--own {
  float: right;
  background-color: #F2633A;
  color:#fff;
  text-align: right;
}

.chat-form {
  background: #ccc;
  padding: 30px 0;
  position: fixed;
  bottom: 0;
  width: 80%;
 
}

.chat-log__author {
  margin: 0 auto .5em;
  font-size: 14px;
  font-weight: bold;
}
  </style>



  <div class="main">
  <div class="container ">
    <div class="chat-log">
     
      @foreach($chats as $chat)
      @if($chat->user_id==Auth::user()->id)
      <div class="chat-log__item chat-log__item--own">
         <!-- <img src="{{asset('img/avatar/'.Auth::user()->avatar)}}" style="width: 10%;border-radius: 50%; float: left;"> -->
        <h3 class="chat-log__author">You <small>{{Carbon\Carbon::parse($chat->created_at)->diffForHumans()}}</small></h3>
        <div class="chat-log__message">{{$chat->message}}</div>
      </div>
      @else
      @foreach($users as $user)

      @if($chat->user_id==$user->id)
       <div class="chat-log__item">
        <img src="{{asset('img/avatar/'.$user->avatar)}}" style="width: 10%;border-radius: 50%;">
        <h4 class="chat-log__author">{{$user->name}} &nbsp{{$user->sname}} <small>

          {{Carbon\Carbon::parse($chat->created_at)->diffForHumans()}}</small></h4>
        <div class="chat-log__message">{{$chat->message}}</div>
      </div>
      @endif
      @endforeach
      @endif
      @endforeach

      



    </div>
  </div>
  
</div>

<div class="chat-form" action="chat" method="post">
    <div class="container ">
       <div id="app">
        @foreach($groups as $cgroup)
        <!-- <example-component :modeldata="{{$cgroup->id}}"></example-component> -->
         <form class="form-horizontal" action="newchat" method="post" >

        <div class="row">
          <div class="col-sm-10 col-xs-8">
            <input type="text" class="form-control" id=""  placeholder="Message" name="message" />
 {{ csrf_field() }}

             
             <input type="hidden" name="groupid" class="form-control" id="" value="{{$cgroup->id}}" placeholder="Message" />
          </div>
          <div class="col-sm-2 col-xs-4">
            <button type="submit" class="btn btn-block" style="background-color: #F2633A; color: #fff;">Send</button>
          </div>
        </div>
      </form>
        @endforeach
       
       </div>
     <!--  <form class="form-horizontal">
        <div class="row">
          <div class="col-sm-10 col-xs-8">
            <input type="text" class="form-control" id="" placeholder="Message" />
            {{ csrf_field() }}
          </div>
          <div class="col-sm-2 col-xs-4">
            <button type="submit" class="btn btn-block" style="background-color: #F2633A; color: #fff;">Send</button>
          </div>
        </div>
      </form> -->
    </div>
  </div>

    

       </div>

</div>
<!-- end row -->



 




    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a href="{{ route('logout') }}" class="btn btn-primary" 
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('js/jquery.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>


 <script src="{{asset('js/app.js')}}"></script>
  <!-- Core plugin JavaScript-->
  <script src="{{asset('js/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('js/sb-admin-2.min.js')}}"></script>

  <!-- Page level plugins -->
  <script src="{{asset('js/Chart.min.js')}}"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset('js/chart-area-demo.js')}}"></script>
  <script src="{{asset('js/chart-pie-demo.js')}}"></script>

</body>

</html>
