     @extends('groupviews.rootdashboard')

@section('content')

Deposits

<!-- Activity logs -->


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
              <h6 class="m-0 font-weight-bold text-primary">Activity logs</h6>
              <small>The table below indicates the confirmed members of the group</small>

              <!--  <a  class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target=".bs-example-modal-lg" style="color: #fff; float: right;"><i class="fas fa-user-plus fa-sm text-white-50"></i> Add deposit</a> -->
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Phone Number</th>
                      <th>ref_no</th>
                      <th>amount</th>
                      <th>date</th>
                   
                     
                    </tr>
                  </thead>
                 
                  <tbody>
                   
                  @foreach($logs as $log)
                    <tr>
                     <td>#</td>
                     @foreach($users as $use)
                     @if($use->id==$log->user_id)
                      <td>{{$use -> name}} {{$use -> sname}}</td>
                      @endif
                      @endforeach
                      <td>0{{$log -> phone_number}}</td>
                      <td>{{$log -> ref_no}}</td>
                      <td>{{$log -> amount}}</td>

                      <td>{{Carbon\Carbon::parse($log->created_at)->format('d-m-Y')}}</td>
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


      <!-- //////////end activity logs -->
@endsection