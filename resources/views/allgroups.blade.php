@extends('layouts.app')

@section('content')


<div class="container">
	<div class="row">
		<div class="col-md-3"></div>
			<div class="col-md-6">
				<center><img class="logo logo-dark" style="width:25%;" alt="Logo" src="{{asset('img/logo.png')}}"></center>
      <!-- panel begin -->

					      <div class="panel panel-default shadow">
					  <!-- Default panel contents -->
					  <div class="panel-heading"><center><b><h3>Join A group</h3></b></center></div>
					  <div class="panel-body">
					   
					  </div>

					  <!-- List group -->
					  <ul class="list-group">
					     @foreach($group_member as $groupmember)
					    @foreach($group as $group)
					    
					    @if($groupmember->group_id==$group->id )
					    @else

					    <li class="list-group-item listgroups" style="background-color:#01A2A6; color: #fff; text-decoration: none;">
					    	<form action="joingroup" method="post">
					    		{{ csrf_field() }}
					    		<input type="hidden" name="name" value="{{ Auth::user()->name }}">	
					    		<input type="hidden" name="sname" value="{{ Auth::user()->sname }}">
					    		<input type="hidden" name="groupid" value="{{$group->id}}">		
					    		<input type="hidden" name="groupname" value="{{$group->group_name}}">	
					    	<input type="hidden" name="phone" value="{{ Auth::user()->phone }}">	
					    	<input type="hidden" name="role" value="1">
					    	<input type="hidden" name="email" value="{{ Auth::user()->email }}">
					    	<input type="hidden" name="description" value="{{$group->objectives}}">	

					    	<input value="{{$group->group_name}}" type="submit" style="color: #fff; border:0px;" >
					    		
					    	
					    	</form>
					     </li>
					     
					    @endif
					 

					    @endforeach
					    @endforeach
					   
					   
					     <a href="newgroup"><li class="list-group-item" style="background-color:#F26239; color: #fff; text-decoration: none;">Create a new group</li></a>
					  </ul>
					</div>
			</div>
	</div>
</div>
@endsection