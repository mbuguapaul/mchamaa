  @extends('groupviews.rootdashboard')

@section('content')

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
              <h6 class="m-0 font-weight-bold text-primary">Activity logs (Withdraws)</h6>
              <small>The table below indicates the recorded withdrawals that has taken place from group.</small>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                     <th>amount</th>
                      <th>description</th>
                      
                      <th>date</th>
                   
                     
                    </tr>
                  </thead>
                 
                  <tbody>
                   
                  @foreach($withdraws as $withdraw)
                    <tr>
                     <td>#</td>
                     @foreach($users as $us)
                     @if($us->id==$withdraw->user_id)
                      <td>{{$us -> name}} {{$us -> sname}}</td>
                      @endif
                      @endforeach
                      
                      <td>{{$withdraw -> amount}}</td>
                      <td>{{$withdraw -> description}}</td>

                      <td>{{Carbon\Carbon::parse($withdraw->created_at)->format('d-m-Y')}}</td>
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