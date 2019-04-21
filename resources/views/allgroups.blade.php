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
					    
					     
					     <a href="" > <li class="list-group-item listgroups" style="background-color:#01A2A6; color: #fff; text-decoration: none;">
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