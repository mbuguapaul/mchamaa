@extends('layouts.profileroot')

@section('content')
<center><h2><b style="color: #F15A2F;">Personal Profile</b></h2></center>
<div class="row">
  <!-- start row -->
  <div class="col-md-1"></div>


<div class="col-md-6">
    <!-- form -->
    <form>

      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
        <input type="text" name="" value="{{ Auth::user()->name }}" placeholder="First name" class="form-control">
      </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
        <input type="text" name="" value="{{ Auth::user()->sname }}" placeholder="Second name" class="form-control">
      </div>
        </div>
      </div>


<!-- email -->
 <div class="form-group">
        <input type="text" name="" value="{{ Auth::user()->email }}" placeholder="email" class="form-control">
      </div>


 <div class="form-group">
        <input type="text" name="" value="+{{ Auth::user()->phone }}" placeholder="Phone number" class="form-control">
      </div>
    </form>
    <!-- end form -->
</div>

</div>
<!-- end row -->





@endsection
