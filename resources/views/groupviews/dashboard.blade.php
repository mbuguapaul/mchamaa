      @extends('groupviews.rootdashboard')

@section('content')
    <!-- Content Row -->
@foreach($mygroup as $mygroupp)
            @if($mygroupp->user_level==1)
        
            @else
          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                  </div>
                  <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> Direct
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> Social
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-info"></i> Referral
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>


<!-- end charts -->
          <!-- Content Row -->
          <div class="row">

           
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"></h1>
          <p class="mb-4"></p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Invites</h6>
              <small>The table below indicates those who have been invited to the group but not yet confirmed in their emails</small>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>First Name</th>
                      <th>Second name</th>
                      <th>Phone Number</th>
                      <th>Email</th>
                      <th>Role</th>
                      <th>Invite By</th>
                    </tr>
                  </thead>
                 
                  <tbody>
                   
                    @foreach($invites as $invite)
                    <tr>
                      <td>#</td>
                      <td>{{$invite->name}}</td>
                      <td>{{$invite->sname}}</td>
                      <td>0{{$invite->phne_number}}</td>
                      <td>{{$invite->email}}</td>
                      <td>{{$invite->role}}</td>
                      <td>{{$invite->invite_by}}</td>

                    </tr>
                    @endforeach
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      </div>
      <!-- End of Main Content -->
      <!-- /////////////////////////////////////////////////////////////////// -->

<!-- confirmed Members -->

       <!-- Content Row -->
          <div class="row">

           
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"></h1>
          <p class="mb-4"></p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Confirmed Invites</h6>
              <small>The table below indicates Members who have reacted to invitation and your confirmation is pending</small>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>First Name</th>
                      <th>Second name</th>
                      <th>Phone Number</th>
                      <th>Email</th>
                      <th>Role</th>
                      <th>Confirm</th>
                    </tr>
                  </thead>
                 
                  <tbody>
                   
                    @foreach($confirmed as $confirm)
                    <tr>
                      <td>#</td>
                      <td>{{$confirm->name}}</td>
                      <td>{{$confirm->sname}}</td>
                      <td>0{{$confirm->phne_number}}</td>
                      <td>{{$confirm->email}}</td>
                      <td>{{$confirm->role}}</td>
                      <td>
                       
                       <!--  <a href="confirm/{{$confirm->id}}" class="btn btn-success btn-circle btn-sm">
                    
                  </a> -->
                   
                   @foreach($users as $user)
                   @if($confirm->email==$user->email)
                    <form method="post" action="confirmmember">
                      {{ csrf_field() }}
                      <input type="hidden" name="userid" value="{{$user->id}}">
                 <!-- <input type="hidden" name="email" value="{{$confirm->email}}"> -->
                  <input type="hidden" name="role" value="{{$confirm->role}}">
                  <input type="hidden" name="groupid" value="{{$confirm->groupid}}">
                  <input type="hidden" name="cid" value="{{$confirm->id}}">
                  <button class="btn btn-success">
                    
                    <i class="fas fa-check"></i>
                  </button>
                </form>
                   @else
                   <!-- <i class="fas fa-exclamation-triangle"></i> -->
                   @endif
                   @endforeach
                 
                      </td>

                    </tr>
                    @endforeach
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      </div>

      @endif
      @endforeach

<!-- /////////////members table -->
     <!-- Content Row -->
          <div class="row">

           
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"></h1>
          <p class="mb-4"></p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Group members</h6>
              <small>The table below indicates the confirmed members of the group</small>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>First Name</th>
                      <th>Second name</th>
                      <th>Phone Number</th>
                      <th>Email</th>
                      <th>role</th>
                      <th>action</th>
                     
                    </tr>
                  </thead>
                 
                  <tbody>
                   
                    @foreach($group_members as $group_members)
                    <tr>
                      @foreach($users as $umember)
                      @if($group_members->User_id==$umember->id)
                      <td>#</td>
                      <td>{{$umember->name}}</td>
                      <td>{{$umember->sname}}</td>
                      <td>0{{$umember->phone}}</td>
                      <td>{{$umember->email}}</td>
                      <td>
                        @if($group_members->user_level==5)
                         <td>
                          chairperson
                        </td>
                        @elseif($group_members->user_level==4)
                        <td>
                          vicechairperson
                        </td>
                        @elseif($group_members->user_level==3)
                        <td>
                          secretary
                        </td>
                        @elseif($group_members->user_level==2)
                        <td>
                          treasurer
                        </td>
                        @elseif($group_members->user_level==1)
                        <td>
                          Member
                        </td>
                        @else
                        <td>invalid</td>
                        @endif
                        
                      
                      @endif
                      @endforeach

                    </tr>
                    @endforeach
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      </div>
    </div>
      <!-- End of Main Content -->



     
      <!-- End of Main Content -->
      @endsection