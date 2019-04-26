     @extends('groupviews.rootdashboard')

@section('content')


members

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
@endsection