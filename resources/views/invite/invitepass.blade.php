@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    	<center><img class="logo logo-dark" style="width:20%;" alt="Logo" src="{{asset('img/logo.png')}}"></center>
        <div class="col-md-9 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: #01A2A6; color: #fff;">Confirm the information below and set your password</div>

                <div class="panel-body">
                	@foreach($invites as $invite)
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                    <div class="col-md-5">
    <!--First name -->
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class=" control-label">First Name</label>

                            <div >
                                <input id="name" type="text" class="form-control" name="name" value="{{ $invite->name}}" required autofocus placeholder="John">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
<!-- end first name -->

<!--Second name -->
                        <div class="form-group{{ $errors->has('sname') ? ' has-error' : '' }}">
                            <label for="sname" class=" control-label">Second Name</label>

                            <div >
                                <input id="sname" type="text" class="form-control" name="sname" value="{{ $invite->sname }}" required autofocus placeholder="Doe">

                                @if ($errors->has('sname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
<!-- end first name -->
 <!-- Phone number -->
                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone"  class="control-label">Phone Number</label>

                                <input id="phone" type="number" class="form-control" name="phone" min="0"  value="0{{ $invite->phne_number}}" required placeholder="0712345678" >
                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                        </div>
<!-- end Phone number-->

</div>

<div class="col-md-5 col-md-offset-1">
 <!-- email -->
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <!-- <label for="email"  class="control-label">E-Mail Address</label> -->
                                <input id="email" type="hidden" class="form-control" name="email" value="{{ $invite->email}}" required placeholder="example@company.com">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>
<!-- end email -->
 <!-- password -->
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class=" control-label">Password</label>
                                <input id="password" type="password" class="form-control" name="password" required placeholder="Your password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>

<!-- confirm password -->
                        <div class="form-group">
                            <label for="password-confirm" class=" control-label">Confirm Password</label>


                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="confirm password">
                        </div>                       
<!-- end confirm passwoed -->

                        <div class="form-group">
                           
                                <button type="submit" style="background-color: #F1592D;" class="btn btn-primary">
                                    Register
                                </button>
                         
                        </div>
                    </div>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
