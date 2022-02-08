<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="with=device-width, initial-scale=1.0">
	<title>User register page</title>
	<link rel="stylesheet" href="{{asset('public/css/style.css')}}">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
		.alert{
			background: #f5cbcb;
			border-radius: 4px;
			display: block;
			font-size: 14px;
			padding: 10px 0;
			width: 100%;
		}
	</style>
</head>
<body>
	<div class="user-register">
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
					<h2>Register</h2>
				</div>
				<form class="form" id="form" action="{{route('userRegister.store')}}" method="POST">
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
						<input type="text" placeholder="Name" id="name" name="Nama" value="{{old('Nama')}}">
						<i class="fa fa-check-circle"></i>
						<i class="fa fa-exclamation-circle"></i>
						<small>Error Message</small>
					</div>
					<div class="form-control">
						<label>Email</label>
						<input type="email" placeholder="Sol123@ggrev.com" id="email" name="email" value="{{old('email')}}">
						<i class="fa fa-check-circle"></i>
						<i class="fa fa-exclamation-circle"></i>
						<small>Error Message</small>
					</div>
					<div class="form-control">
						<label>Password</label>
						<input type="password" placeholder="solDragonInstall" id="password" name="password" value="{{old('password')}}">
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
						<input type="text" placeholder="Alamat" id="alamat" name="Alamat" value="{{old('Alamat')}}">
						<i class="fa fa-check-circle"></i>
						<i class="fa fa-exclamation-circle"></i>
						<small>Error Message</small>
					</div>
					<div class="form-control">
						<label>Tanggal lahir</label>
						<input type="date" id="tglLahir" name="Tanggal_lahir" value="{{old('Tanggal_lahir')}}">
						<i class="fa fa-check-circle"></i>
						<small>Error Message</small>
					</div>
					<div class="form-control">
						<div>Jenis Kelamin</div>
						<div class="gender">
							<label>Male</label>
                        	<input type="radio" name="Jenis_kelamin" id="male" value="m" required>
                        	<label>Female</label>
                        	<input type="radio" name="Jenis_kelamin" id="female" value="f" required>
						</div>
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