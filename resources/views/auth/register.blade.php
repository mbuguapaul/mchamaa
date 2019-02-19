@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: #01A2A6; color: #fff;">Register For free</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
<div class="col-md-5">
    <!--First name -->
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class=" control-label">First Name</label>

                            <div >
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus placeholder="John">

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
                                <input id="sname" type="text" class="form-control" name="sname" value="{{ old('sname') }}" required autofocus placeholder="Doe">

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

                            <div >
                                <input id="phone" type="number" class="form-control" name="phone" value="{{ old('phone') }}" required placeholder="+254712345678">
                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                               
                            </div>
                        </div>
<!-- end Phone number-->

</div>
<div class="col-md-5 col-md-offset-1">
 <!-- email -->
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email"  class="control-label">E-Mail Address</label>

                            <div >
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="example@company.com">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
<!-- end email -->
 <!-- password -->
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class=" control-label">Password</label>

                            <div >
                                <input id="password" type="password" class="form-control" name="password" required placeholder="Johndoe">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

<!-- confirm password -->
                        <div class="form-group">
                            <label for="password-confirm" class=" control-label">Confirm Password</label>

                            <div >
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Johndoe">
                            </div>
                        
<!-- end confirm passwoed -->
</div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
