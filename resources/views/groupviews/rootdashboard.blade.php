<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
@foreach($groups as $groupt)
  <title>M-chamaa| {{$groupt->group_name}}</title>
  @endforeach
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
     <!--  <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Reports</span></a>
      </li> -->

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
    
 

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
         <h1 class="h3 mb-0 text-gray-800"> @foreach($groups as $groupp)
            {{$groupp->group_name}}
            @endforeach</h1>
        

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            
            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">{{count($confirmed)}}</span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Alerts Center
                </h6>

@foreach($mygroup as $mygroupc)
            @if($mygroupc->user_level==1)
        
            @else
                @foreach($confirmed as $confirmp)
                <a class="dropdown-item d-flex align-items-center" href="invites/{{$id=$mygroupc->id}}">

                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-user-plus text-white"></i>
                    </div>
                  </div>
                  <div>
                    
                    <div class="small text-gray-500">{{Carbon\Carbon::parse($confirmp->updated_at)->diffForHumans()}}</div>
                    <span class="font-weight-bold">{{$confirmp->name}} {{$confirmp->sname}}
                    accepted your invitation to this group, kindly confirm.</span>
                   
                  </div>
                </a>
                
                @endforeach
                @endif
                 @endforeach

                 @foreach($logg as $loggs)
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-donate text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">{{Carbon\Carbon::parse($loggs->created_at)->diffForHumans()}}</div>
                    {{$loggs->amount}} has been deposited into this account by {{$loggs->name}}
                  </div>
                </a>
                @endforeach

            @foreach($withh as $withhs)
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">{{Carbon\Carbon::parse($withhs->created_at)->diffForHumans()}}</div>
                    {{$withhs->amount}} has been withdrawn for {{$withhs->description}}.
                  </div>
                </a>

                @endforeach
                
              </div>
            </li>

            <!-- Nav Item - Messages -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
                <span class="badge badge-danger badge-counter">{{count($lchats)}}</span>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Message Center
                </h6>
                                  @foreach($lchats as $chats)
 @foreach($groups as $groupm)
                <a class="dropdown-item d-flex align-items-center" href="/gs/chat/{{$id=$groupm->id}}">
                  @endforeach
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div class="font-weight-bold">
                    <div class="text-truncate">{{$chats->message}}</div>
                    @foreach($users as $we)
                    @if($chats->user_id== $we->id)
                    <div class="small text-gray-500">
                      @if($we->id==Auth::user()->id)
                      you
                      @else
                      {{$we->name}} {{$we->sname}} 
                      @endif
                      {{Carbon\Carbon::parse($chats->created_at)->diffForHumans()}}</div>
                    @endif
                    
                    @endforeach
                  </div>


                </a>
                 @endforeach
                
               
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                <img class="img-profile rounded-circle" src="{{asset('img/avatar/'.Auth::user()->avatar)}}">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="/profile">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <!-- <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a> -->
                <a class="dropdown-item" href="/home">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                 My Groups
                </a>
                <div class="dropdown-divider"></div>
                
                  <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" >

                                                     <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
             
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->
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
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
           
        
            @foreach($mygroup as $mygroup)
            @if($mygroup->user_level==1)

             <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-md-6 ">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Earnings (Deposit-Withdraws)</div>
                      <?php $counting = 0; ?> 
                      @foreach($logs as $amt)
                      
                      <?php $counting = $counting+$amt->amount;?>

                   
                    @endforeach
                    {{$counting}}
                    -

                    <?php $withdr = 0; ?> 
                    @foreach($withdraws as $withdraw)
                    <?php $withdr = $withdr+$withdraw->amount;?>
                    @endforeach
                    {{$withdr}}

                    </div>
                    <div class="col-auto">
                      <i class="fas fa-money-bill-alt fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-md-6 ">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total (Annual)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                         @foreach($groups as $groupo)
                      {{$groupo->worth}}
                      @endforeach
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
            @else
              <a  class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target=".bs-example-modal-lg" style="color: #fff;"><i class="fas fa-user-plus fa-sm text-white-50"></i> Invite Member</a>

               <a  class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target=".withdraw" style="color: #fff;"><i class="fas fa-hand-holding-usd fa-hand-holding-usd text-white-50"></i> Withdraw</a>
            
<!-- /////////////// start modal -->

            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
      <div class="modal-dialog modal-lg">
        <div class="modal-content container">
      <br>
      <center><h4 style="color: #F1592D;">Add a new Member to   @foreach($groups as $groupup)
            {{$groupup->group_name}}
            @endforeach</h4></center>
      <br>
      <form class="form-horizontal" action="invite" method="post">
        <!-- names -->
        <div class="form-group row">
    
    <div class="col-sm-6">
      <input type="text" class="form-control"  placeholder="First Name" required name="fname">
    </div>
    <div class="col-sm-6">
      <input type="text" class="form-control"  placeholder="Second name" name="sname" required>
    </div>
  </div>
  <!-- end names -->
  <!-- email -->
       <div class="form-group row">
    
    <div class="col-sm-6">
      <input type="email" class="form-control"  placeholder="email" required name="email">
    </div>
    <div class="col-sm-6">
      <input type="number" class="form-control"  placeholder="phone number" name="phone">
    </div>
  </div>
  <!-- end email -->
  @foreach($groups as $groupp)
  <input type="hidden" value="
  
  {{$groupp->group_name}}
  
  " name="groupname">

<input type="hidden" value="
  
  {{$groupp->objectives}}
  
  " name="objectives">

  @endforeach

  <input type="hidden" value="
  @foreach($groups as $groupp)
  {{$groupp->id}}
  @endforeach
  " name="groupid">
  Role
  <select class="form-control" name="role">

  <option value="1">Member</option>
  <option value="2">Secretary</option>
  <option value="3">Treasurer</option>
  <option value="4">Vice-chair</option>
  <option value="5">chairperson</option>
</select>
<br>
 {{ csrf_field() }}
 <button class="btn btn-success btn-icon-split pull-right" type="submit">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Add Member</span>
                  </button>
      </form>
      <i>NB: Upon adding member an email will be sent in which its only via confirmation that he/she becomes a member. Please remind your members to check their emails</i>
      <br><br>
    </div>
  </div>
</div>

<!-- ///////////////////// -->



<!-- /////////////// start modal withdrawals-->

            <div class="modal fade bs-example-modal-lg withdraw" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
      <div class="modal-dialog modal-lg">
        <div class="modal-content container">
      <br>
      <center><h4 style="color: #F1592D;">Add a withdraw record </h4></center>
      <br>
      <form class="form-horizontal" action="withdraw" method="post">
        <!-- names -->
        <div class="form-group row">
    
    <div class="col-sm-6">
      <input type="number" min="10" class="form-control"  placeholder="Amount" required name="amount">
    </div>
    <div class="col-sm-6">
      <input type="text" class="form-control"  placeholder="Short Description" name="Description" required>
    </div>
  </div>
  <!-- end names -->

 {{ csrf_field() }}

  @foreach($groups as $groupw)
  <input type="hidden" value="
  
  {{$groupw->id}}
  
  " name="groupid">

<input type="hidden" value="
  {{$groupw->worth}} " name="worth">
  @endforeach
 <button class="btn btn-success btn-icon-split pull-right" type="submit">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Withdraw</span>
                  </button>
      </form>
      <i>NB: Upon adding a withdrawal record you remain liable to the expense.</i>
      <br><br>
    </div>
  </div>
</div>

<!-- ///////////////////// -->

          </div>


          

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"> (Deposits- withdraws)</div>
                     
                     <?php $counting = 0; ?> 
                     <div class="h5 mb-0 font-weight-bold text-gray-800">
                      @foreach($logs as $amtr)
                      
                      <?php $counting = $counting+$amtr->amount;?>

                   
                    @endforeach
                    {{$counting}}
                    -
                    <?php $withdr = 0; ?> 
                    @foreach($withdraws as $withdraw)
                    <?php $withdr = $withdr+$withdraw->amount;?>
                    @endforeach
                    {{$withdr}}
                     </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-money-bill-alt fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
        </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Earnings </div>

                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        @foreach($groups as $groupo)
                      {{$groupo->worth}}
                      @endforeach
                    </div>

                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


      <!--  -->
<!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">confirmed invites</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{count($confirmed)}}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-plus fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
         

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending invites</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{count($invites)}}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-plus fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>

              </div>

            </div>
            @endif
            @endforeach
           
          </div>
         


 @yield('content')



      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Em creations 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

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
  <script src="https://unpkg.com/vue"></script>
        <script>
            var app = new Vue({
                el: '#app',
            });
        </script>
  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('js/jquery.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>

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
