@extends('layouts.homeroot')

@section('content')
@if(Session::has('status'))
  <div class="">
    <div class="row">
      <div class="col-md-12">
        <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <center>{{Session::get('status')}}</center>


        </div>
      </div>
    </div>

    <br>
  </div>
@endif

<center><h2>My Profile</h2></center>

@endsection
