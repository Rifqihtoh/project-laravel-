<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="with=device-width, initial-scale=1.0">
	<title>Event registration page</title>
	<link rel="stylesheet" href="{{asset('public/css/style.css')}}">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
		.alert{
			background: #3bf5ba;
			border-radius: 4px;
			display: block;
			font-size: 14px;
			padding: 10px 0;
			width: 100%;
		}
	</style>
</head>
<body>
	<div class="user-login">
		<nav>
			<a href="{{url('/')}}"><img src="{{asset('public/images/logo.png')}}"></a>
			<div class="nav-links" id="navLinks">
				<i class="fa fa-times-circle" onclick="hideMenu()"></i>
				<ul>
					<li><a href="{{url('/userHome')}}">HOME</a></li>
					<li><a href="{{url('/userEvents')}}">EVENTS</a></li>
					<li><a href="{{url('/user/register')}}">REGISTRATION</a></li>
					<li><a href="{{route('userLogin')}}">PROFILE</a></li>
				</ul>
			</div>
			<i class="fa fa-bars" onclick="ShowMenu()"></i>
		</nav>
		<div class="login-container">
			<div class="form-container">
				<div class="hdr">
					<h2>Event Registration</h2>
				</div>
				<form class="form" id="form" action="{{route('register')}}" method="POST">
					@csrf
					@if (session('status'))
						<div class="alert alert-success">
							{{ session('status') }}
						</div>
					@endif
					<div class="form-control">
						<label>Username</label>
						<input type="text" placeholder="username" id="username" name="username" value="{{old('username')}}">
						<i class="fa fa-check-circle"></i>
						<i class="fa fa-exclamation-circle"></i>
						<small>Error Message</small>
					</div>
					<div class="form-control">
						<label>Nama Event</label>
						<select name="Ev_id" id="Ev_id">
							<option>Pilih event</option>
							@foreach($event as $ev)
							<option value="{{$ev->Ev_id}}">{{$ev->Ev_nama}}</option>
							@endforeach
						</select>
						<i class="fa fa-check-circle"></i>
						<i class="fa fa-exclamation-circle"></i>
						<small>Error Message</small>
					</div>
					<button type="submit">Submit</button>
				</form>
		</div>
	</div>
</body>
<script>
		var navLinks = document.getElementById('navLinks');
		function ShowMenu() {
			navLinks.style.right = "0";
		}
		function hideMenu() {
			navLinks.style.right = "-200px";
		}
	</script>
</html>