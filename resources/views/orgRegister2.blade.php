<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="with=device-width, initial-scale=1.0">
	<title>User register page</title>
	<link rel="stylesheet" href="{{asset('public/css/style.css')}}">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class="user-register">
		<nav>
			<a href="{{url('/')}}"><img src="{{asset('public/images/logo.png')}}"></a>
			<div class="nav-links" id="navLinks">
				<i class="fa fa-times-circle" onclick="hideMenu()"></i>
				<ul>
					<li><a href="{{url('/orgHome')}}">HOME</a></li>
					<li><a href="{{url('/organizer/events')}}">EVENTS</a></li>
					<li><a href="{{url('/orgLogin')}}">PROFILE</a></li>
				</ul>
			</div>
			<i class="fa fa-bars" onclick="ShowMenu()"></i>
		</nav>
		<div class="login-container">
			<div class="form-container">
				<div class="hdr">
					<h2>Register</h2>
				</div>
				<form class="form" id="form" action="{{route('orgRegister.store')}}" method="POST">
					@csrf
					@if(session('errors'))
					<div class="alert">
						Something is wrong:
						<ul>
							@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
	               @endif
					<div class="form-control">
						<label>Name</label>
						<input type="text" placeholder="Name" id="Org_nama" name="Org_nama" value="{{old('Org_nama')}}">
						<i class="fa fa-check-circle"></i>
						<i class="fa fa-exclamation-circle"></i>
						<small>Error Message</small>
					</div>
					<div class="form-control">
						<label>Email</label>
						<input type="email" placeholder="Sol123@ggrev.com" id="Org_email" name="Org_email" value="{{old('Org_email')}}">
						<i class="fa fa-check-circle"></i>
						<i class="fa fa-exclamation-circle"></i>
						<small>Error Message</small>
					</div>
					<div class="form-control">
						<label>Password</label>
						<input type="password" placeholder="solDragonInstall" id="Org_password" name="Org_password" value="{{old('Org_password')}}">
						<i class="fa fa-check-circle"></i>
						<i class="fa fa-exclamation-circle"></i>
						<small>Error Message</small>
					</div>
					<div class="form-control">
						<label>No. Telepon</label>
						<input type="tel" placeholder="08123456789" id="noTelp" name="No_telepon" value="{{old('No_telepon')}}">
						<i class="fa fa-check-circle"></i>
						<i class="fa fa-exclamation-circle"></i>
						<small>Error Message</small>
					</div>
					<div class="form-control">
						<label>Alamat</label>
						<input type="text" placeholder="Alamat" id="Org_alamat" name="Org_alamat" value="{{old('Org_alamat')}}">
						<i class="fa fa-check-circle"></i>
						<i class="fa fa-exclamation-circle"></i>
						<small>Error Message</small>
					</div>
					<div class="form-control">
						<label>User Description</label>
						<textarea placeholder="your description" id="userDesc" name="User_desc" value="{{old('User_desc')}}"></textarea>
						<i class="fa fa-check-circle"></i>
						<i class="fa fa-exclamation-circle"></i>
						<small>Error Message</small>
					</div>
					<button type="submit">Submit</button>
					<div>already have an account? <a href="{{route('userLogin')}}">Sign-in</a></div>
				</form>
		</div>
	</div>
</body>
</html>