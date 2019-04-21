@extends('layouts.app')

@section('content')


<div class="container">
	<div class="row">
		<div class="col-md-4"></div>
			<div class="col-md-4">
				<center><img class="logo logo-dark" style="width:25%;" alt="Logo" src="{{asset('img/logo.png')}}"></center>
      <!-- panel begin -->

					      <div class="panel panel-default shadow">
					  <!-- Default panel contents -->
					  <div class="panel-heading"><center><b><h3>Join A group</h3></b></center></div>
					  <div class="panel-body">
					   
					  </div>

					  <!-- List group -->
					  <ul class="list-group">
					    
					    @foreach($group as $group)
					    	<form action="joingroup" method="post">
					    		{{ csrf_field() }}
					    		<input type="hidden" name="name" value="{{ Auth::user()->name }}">	
					    		<input type="hidden" name="sname" value="{{ Auth::user()->sname }}">	
					    		<input type="hidden" name="groupid" value="{{$group->id}}">	
					    	<input type="hidden" name="phone" value="{{ Auth::user()->phone }}">	<input type="hidden" name="role" value="1">
					    	<input type="hidden" name="email" value="{{ Auth::user()->email }}">
					    	<input type="hidden" name="description" value="{{$group->objectives}}">	
					    	</form>
					     
					     <a href="/" > <li class="list-group-item listgroups" style="background-color:#01A2A6; color: #fff; text-decoration: none;">
					      {{$group->group_name}}
					     </li> </a>
					      
					    
					    @endforeach
					   
					   
					     <a href="newgroup"><li class="list-group-item" style="background-color:#F26239; color: #fff; text-decoration: none;">Create a new group</li></a>
					  </ul>
					</div>
			</div>
	</div>
</div>
@endsection