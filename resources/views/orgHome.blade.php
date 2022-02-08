<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="with=device-width, initial-scale=1.0">
	<title>Organizer Homepage</title>
	<link rel="stylesheet" href="{{asset('public/css/style.css')}}">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<section class="org-header">
		<nav>
			<a href="{{url('/')}}"><img src="{{asset('public/images/logo.png')}}"></a>
			<div class="nav-links" id="navLinks">
				<i class="fa fa-times-circle" onclick="hideMenu()"></i>
				<ul>
					<li><a href="{{url('/orgHome')}}">HOME</a></li>
					<li><a href="{{url('/organizer/events')}}">EVENTS</a></li>
					<li><a href="{{route('orgLogin')}}">PROFILE</a></li>
				</ul>
			</div>
			<i class="fa fa-bars" onclick="ShowMenu()"></i>
		</nav>
		<div class="text-box">
			<h1>Welcome Organizer</h1>
			<p>We're happy to have you join us
			</p>
			<a href="{{url('/addEvent')}}" class="box-btn">Events</a>
		</div>
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