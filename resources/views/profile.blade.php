@extends('layouts.profileroot')

@section('content')
<center><h2><b style="color: #F15A2F;">Personal Profile</b></h2></center>
<div class="row">
  <!-- start row -->
  <div class="col-md-1"></div>


<div class="col-md-6">
    <!-- form -->
    <form method="post" action="updateuser">
<input type="hidden" name="_token"value="{{csrf_token()}}"/>

      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
        <input type="text" name="name" value="{{ Auth::user()->name }}" placeholder="First name" class="form-control" required>
      </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
        <input type="text" name="sname" value="{{ Auth::user()->sname }}" placeholder="Second name" class="form-control" required>
      </div>
        </div>
      </div>
<input type="submit" class="btn btn-primary" value="update profile" style="background: #01A2A6;" name="">
    </form>
    <!-- end form -->
</div>

</div>
<!-- end row -->





@endsection
