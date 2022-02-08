<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="with=device-width, initial-scale=1.0">
	<title>Portal page</title>
	<link rel="stylesheet" href="{{asset('public/css/style.css')}}">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class="portal">
		<div class="text-box">
			<h1>ESNid portal</h1>
			<a href="{{url('/userHome')}}" class="box-btn">User</a>
			<a href="{{route('adminLogin')}}" class="box-btn">Admin</a>
			<a href="{{url('/orgHome')}}" class="box-btn">Organizer</a>
		</div>
	</div>
</body>
</html>