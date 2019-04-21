
<!DOCTYPE html>
<html>
<head>
	<title>An invite</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all"/>
	
</head>
<body>
<p>Hi,</p>

<p>{{ $invites->invite_by }} invited you to {{$invites->group_name}} group through the M-chama group with the main description as
	<br> {{$invites->group_description}}.<br> If you requested this </p>

<a href="{{ route('accept', $invites->token) }}">Click here</a> to activate the invitation.
<button class="btn btn-primary">invited</button>
</body>
</html>