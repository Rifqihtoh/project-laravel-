<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="with=device-width, initial-scale=1.0">
	<title>User events page</title>
	<link rel="stylesheet" href="{{asset('public/css/style.css')}}">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
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
	<div class="container">
    <h1 class="mt-2">Event Lists</h1>
    <div class="row">
    	@foreach($event as $ev)
	      <div class="col-sm-3">
	        <div class="card" style="width: 25rem;">
	          <img src="{{$ev->Ev_photo}}" class="card-img-top" alt="...">
	          <div class="card-body">
	            <h5 class="card-title">{{$ev->Ev_nama}}</h5>
	            <p class="card-text">Sisa kuota: {{$ev-> Ev_kuota}}</p>
	          </div>
	          <ul class="list-group list-group-flush">
	            <li class="list-group-item">Tanggal Mulai: {{$ev->Ev_startDate}}</li>
	            <li class="list-group-item">Tanggal berakhir: {{$ev->Ev_endDate}}</li>
	          </ul>
	          <div class="card-body">
	            <a href="{{route('user.event.show',$ev->Ev_id)}}" class="btn btn-primary">read more</a>
	          </div>
	        </div>
	      </div>
	    @endforeach
  	</div>
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