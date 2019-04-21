<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>e Chamaa</title>

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->

     <link href="css/theme-1.css" rel="stylesheet" type="text/css" media="all"/>
        <link href="css/custom.css" rel="stylesheet" type="text/css" media="all"/>
        
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all"/>


</head>
<body>
<style type="text/css">
body{
  background-color: #F1F3FA;
}
  .shadow:hover{
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.10);
  }
</style>


<br><br><br><br><br>
<div class="container">

  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">

      @if(Session::has('status'))
 
      <div class="col-md-12">
        <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <center>{{Session::get('status')}}</center>


        </div>
      </div>
    
@endif



      <center><img class="logo logo-dark" style="width:25%;" alt="Logo" src="{{asset('img/logo.png')}}"></center>
      <!-- panel begin -->

      <div class="panel panel-default shadow">
  <!-- Default panel contents -->
  <div class="panel-heading"><center><b><h3>Your groups</h3></b></center></div>
  <div class="panel-body">
   
  </div>

  <!-- List group -->
  <ul class="list-group">
    @foreach($group_member as $groupmember)
    @foreach($groups as $group)
    
      @if($groupmember->group_id==$group->id)
     <a href="gs/{{$group->id}}" > <li class="list-group-item listgroups" style="background-color:#01A2A6; color: #fff; text-decoration: none;">
      {{$group->group_name}}
     </li> </a>
      @endif
    
    @endforeach
    @endforeach
   
     <a href="newgroup"><li class="list-group-item" style="background-color:#F26239; color: #fff; text-decoration: none;">Create a new group</li></a>
  </ul>
</div>

      <!-- panel ends here -->
      All rights reserved &copy 2019      &nbsp      <a href="/">home</a>       &nbsp &nbsp  
      <a href="allgroups">Join a group</a> &nbsp&nbsp<a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a> &nbsp &nbsp<a href="profile"> Profile</a><br>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>

                                        Account name: {{ Auth::user()->name }} &nbsp{{ Auth::user()->sname }}


    </div>
  </div>
</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function () {
  var navListItems = $('div.setup-panel div a'),
          allWells = $('.setup-content'),
          allNextBtn = $('.nextBtn');

  allWells.hide();

  navListItems.click(function (e) {
      e.preventDefault();
      var $target = $($(this).attr('href')),
              $item = $(this);

      if (!$item.hasClass('disabled')) {
          navListItems.removeClass('btn-primary').addClass('btn-default');
          $item.addClass('btn-primary');
          allWells.hide();
          $target.show();
          $target.find('input:eq(0)').focus();
      }
  });

  allNextBtn.click(function(){
      var curStep = $(this).closest(".setup-content"),
          curStepBtn = curStep.attr("id"),
          nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
          curInputs = curStep.find("input[type='text'],input[type='url']"),
          isValid = true;

      $(".form-group").removeClass("has-error");
      for(var i=0; i<curInputs.length; i++){
          if (!curInputs[i].validity.valid){
              isValid = false;
              $(curInputs[i]).closest(".form-group").addClass("has-error");
          }
      }

      if (isValid)
          nextStepWizard.removeAttr('disabled').trigger('click');
  });

  $('div.setup-panel div a.btn-primary').trigger('click');
});
</script>
</body>
</html>
