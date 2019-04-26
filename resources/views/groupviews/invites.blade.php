     @extends('groupviews.rootdashboard')

@section('content')

invitations

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
@endsection