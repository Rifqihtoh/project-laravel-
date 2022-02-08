<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="with=device-width, initial-scale=1.0">
	<title>Tambah event page</title>
	<link rel="stylesheet" href="{{asset('css/style.css')}}">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script defer src="{{asset('js/tambahEventScript.js')}}"></script>
</head>
<body>
	<div class="user-register">
		<nav>
			<a href="{{url('/')}}"><img src="{{asset('images/logo.png')}}"></a>
			<div class="nav-links" id="navLinks">
				<i class="fa fa-times-circle" onclick="hideMenu()"></i>
				<ul>
					<li><a href="{{url('/orgHome')}}">HOME</a></li>
					<li><a href="{{url('/addEvent')}}">EVENTS</a></li>
					<li><a href="{{url('/orgLogin')}}">PROFILE</a></li>
				</ul>
			</div>
			<i class="fa fa-bars" onclick="ShowMenu()"></i>
		</nav>
		<div class="login-container">
			<div class="form-container">
				<div class="hdr">
					<h2>Tambah event</h2>
				</div>
				<form class="form" id="form" action="orgHome.html" method="GET">
					<div class="form-control">
						<label>Nama event</label>
						<input type="text" placeholder="Name" id="name">
						<i class="fa fa-check-circle"></i>
						<i class="fa fa-exclamation-circle"></i>
						<small>Error Message</small>
					</div>
					<div class="form-control">
						<label>Nama game</label>
						<input type="text" placeholder="Name" id="nameVG">
						<i class="fa fa-check-circle"></i>
						<i class="fa fa-exclamation-circle"></i>
						<small>Error Message</small>
					</div>
					<div class="form-control">
						<label>Tanggal mulai</label>
						<input type="date" id="tanggal">
						<i class="fa fa-check-circle"></i>
						<small>Error Message</small>
					</div>
					<div class="form-control">
						<label>Tanggal berakhir</label>
						<input type="date" id="tanggalAK">
						<i class="fa fa-check-circle"></i>
						<small>Error Message</small>
					</div>
					<div class="form-control">
						<label>Kuota event</label>
						<input type="number" id="kuota">
						<i class="fa fa-check-circle"></i>
						<i class="fa fa-exclamation-circle"></i>
						<small>Error Message</small>
					</div>
					<div class="form-control">
						<label>Event Description</label>
						<textarea placeholder="event description" id="eventDesc"></textarea>
						<i class="fa fa-check-circle"></i>
						<i class="fa fa-exclamation-circle"></i>
						<small>Error Message</small>
					</div>
					<button type="submit">Submit</button>
				</form>
		</div>
	</div>
</body>
</html>