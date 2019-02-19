@extends('layouts.homeroot')

@section('content')
<style type="text/css">
       body {
    margin-top:40px;
}
.stepwizard-step p {
    margin-top: 10px;
}
.stepwizard-row {
    display: table-row;
}
.stepwizard {
    display: table;
    width: 50%;
    position: relative;
}
.stepwizard-step button[disabled] {
    opacity: 1 !important;
    filter: alpha(opacity=100) !important;
}
.stepwizard-row:before {
    top: 14px;
    bottom: 0;
    position: absolute;
    content: " ";
    width: 100%;
    height: 1px;
    background-color: #ccc;
    z-order: 0;
}
.stepwizard-step {
    display: table-cell;
    text-align: center;
    position: relative;
}
.btn-circle {
    width: 30px;
    height: 30px;
    text-align: center;
    padding: 6px 0;
    font-size: 12px;
    line-height: 1.428571429;
    border-radius: 15px;
}
    </style>
<div class="container">
  <center><h2>Create a new group</h2></center>
  @if(count($errors)>0)
        <div class="alert alert-danger">
         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h2>! Error occured, please check following conditions.</h2>
        <ul>
          @foreach($errors->all() as $error)
         <li>{{$error}}</li>

          @endforeach
          </ul>
 </div>
        @endif
<div class="stepwizard col-md-offset-3">
    <div class="stepwizard-row setup-panel">
      <div class="stepwizard-step">
        <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
        <p>Step 1</p>
      </div>
      <div class="stepwizard-step">
        <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
        <p>Step 2</p>
      </div>
      <div class="stepwizard-step">
        <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
        <p>Step 3</p>
      </div>
    </div>
  </div>
  
  <form role="form" action="newgroup" method="post">

  {{ csrf_field() }}
    <div class="row setup-content" id="step-1">
      <div class="col-xs-6 col-md-offset-3">
        <div class="col-md-12">
          <h3> Step 1</h3>
          <div class="form-group">
            <label class="control-label">Group Name</label>
            <input  maxlength="100" type="text" required="required" class="form-control" name="group_name" placeholder="Enter Group Name"  />
          </div>
          
          <div class="form-group">
            <label class="control-label">Group Objectives</label>
            <textarea required="required" class="form-control" name="objectives" placeholder="Enter your Objectives" ></textarea>
          </div>
          <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
        </div>
      </div>
    </div>
    <div class="row setup-content" id="step-2">
      <div class="col-xs-6 col-md-offset-3">
        <div class="col-md-12">
          <h3> Step 2</h3>
          <div class="form-group">
             <label class="control-label">Amount of contribution</label>
            <input maxlength="200" type="number" required="required" class="form-control" name="amount" placeholder="Enter amount of contribution" />

            <label class="control-label">Period of contributions</label>
            <select class="form-control" name="period">
  <option value="1">Daily</option>
  <option value="2">Weekly</option>
  <option value="2">Monthly</option>
  
</select>
            <label class="control-label">Penalty per day</label>
            <input maxlength="200" type="number" required="required" name="penalty" class="form-control" placeholder="penalty" />
          </div>
       
          <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
        </div>
      </div>
    </div>
    <div class="row setup-content" id="step-3">
      <div class="col-xs-6 col-md-offset-3">
        <div class="col-md-12">
          <h3> Step 3</h3>
          <label class="control-label">Payment phone number</label>
            <input maxlength="200" value="{{ Auth::user()->phone}}" type="number" required="required" name="pay_number" class="form-control" placeholder="pay number" />
          <button class="btn btn-success btn-lg pull-right" type="submit">Submit</button>
        </div>
      </div>
    </div>
  </form>
  
</div>

@endsection
