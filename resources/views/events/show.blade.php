<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="with=device-width, initial-scale=1.0">
	<title>User events page</title>
	<link rel="stylesheet" href="{{asset('public/css/style.css')}}">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<section class="user-events-header">
		<nav>
			<a href="{{url('/')}}"><img src="{{asset('public/images/logo.png')}}"></a>
			<div class="nav-links" id="navLinks">
				<i class="fa fa-times-circle" onclick="hideMenu()"></i>
				<ul>
					<li><a href="{{url('/userHome')}}">HOME</a></li>
					<li><a href="{{url('/userEvents')}}">EVENTS</a></li>
					<li><a href="{{url('/user/register')}}">REGISTRATION</a></li>
					<li><a href="{{url('/userLogin')}}">PROFILE</a></li>
				</ul>
			</div>
			<i class="fa fa-bars" onclick="ShowMenu()"></i>
		</nav>
		<div class="text-box">
			<h1>See the Events!</h1>
			<p>Hope you find the right events for you!
			</p>
			<a href="{{url('/userEvents')}}" class="box-btn">Events</a>
		</div>
	</section>
	<section class="user-events-content">
		<h1>{{$event->Ev_nama}}</h1>
		<img src="{{$event->Ev_photo}}">
		<div>Tanggal mulai: {{$event->Ev_startDate}}</div>
		<div>Tanggal berakhir: {{$event->Ev_endDate}}</div>
		<div>Sisa kuota: {{$event->Ev_kuota}}</div>
		<P>Deskripsi: {{$event->Ev_description}}</P>
		<a href="{{url('/user/register')}}" class="box-btn dark">Register</a>
	</section>
	<script>
		var navLinks = document.getElementById('navLinks');
		function ShowMenu() {
			navLinks.style.right = "0";
		}
		function hideMenu() {
			navLinks.style.right = "-200px";
		}
	</script>
</body>
</html>