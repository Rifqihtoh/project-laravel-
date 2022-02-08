<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <style>
    	.collapse ul li::after{
			content: '';
			width: 0%;
			height: 2px;
			background: #f44336;
			display: block;
			margin: auto;
			transition: 0.5s;
		}
		.collapse ul li:hover::after{
			width: 100%;
		}
		a img{
			width: 125px;
			height: auto;
		}
		.navbar-nav {
            margin-left: auto;
        }
    </style>
    <title>Edit details</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	   <div class="container-fluid">
	     <a class="navbar-brand" href="{{url('/')}}"><img src="{{asset('public/images/logo.png')}}"></a>
	     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
	       <span class="fa fa-bars"></span>
	     </button>
	     <div class="collapse navbar-collapse" id="navbarNav">
	       <ul class="navbar-nav">
	         <li class="nav-item">
	           <a class="nav-link active" aria-current="page" href="{{url('/orgHome')}}">HOME</a>
	         </li>
	         <li class="nav-item">
	           <a class="nav-link active" href="{{url('/organizer/events')}}">EVENTS</a>
	         </li>
	         <li class="nav-item">
	           <a class="nav-link active" href="{{route('orgLogin')}}">PROFILE</a>
	         </li>
	       </ul>
	     </div>
	   </div>
	 </nav>
	 <div class="container">
	 	<h1 class="mt-2">Edit Details</h1>
	 	<div class="row">
		  <div class="col-sm-3">
		    <div class="card" style="width: 18rem;">
				  <div class="card-header">
				    Menu
				  </div>
				  <ul class="list-group list-group-flush">
				    <a href="{{route('org.details')}}" class="list-group-item">Profile</a>
				    <a href="{{url('/organizer/events')}}" class="list-group-item">Events</a>
				    <a href="{{url('/organizer/registered')}}" class="list-group-item">Registered</a>
				    <a href="{{route('org.logout')}}" class="list-group-item">Logout</a>
				  </ul>
				</div>
		  </div>
		  <div class="col-sm-6">
		    <form method="post" action="{{route('org.update')}}" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="mb-3">
            <label for="Nama" class="form-label">Nama:</label>
            <input type="text" class="form-control @error('Org_nama') is-invalid @enderror" id="Nama" placeholder="masukkan nama" name="Org_nama" value="{{$organizer->Org_nama}}">
            @error('Org_nama')
              <div class="invalid-feedback">
                Tolong masukkan nama anda!
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="Email" class="form-label">Email:</label>
            <input type="email" class="form-control @error('Org_email') is-invalid @enderror" id="Email" placeholder="masukkan email" name="Org_email" value="{{$organizer->Org_email}}">
            @error('Org_email')
              <div class="invalid-feedback">
                Tolong masukkan email anda!
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="Alamat" class="form-label">Alamat:</label>
            <input type="text" class="form-control @error('Org_alamat') is-invalid @enderror" id="Alamat" placeholder="masukkan alamat" name="Org_alamat" value="{{$organizer->Org_alamat}}">
            @error('Org_alamat')
              <div class="invalid-feedback">
                Tolong masukkan alamat anda!
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="Telepon" class="form-label">Telepon:</label>
            <input type="tel" class="form-control @error('Org_telepon') is-invalid @enderror" id="Telepon" placeholder="masukkan nomor telepon" name="Org_telepon" value="{{$organizer->Org_telepon}}">
            @error('Org_telepon')
              <div class="invalid-feedback">
                Tolong masukkan nomor telepon anda!
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="Org_photo" class="form-label">Photo:</label>
            <input type="file" class="form-control @error('Org_photo') is-invalid @enderror" id="Org_photo"  name="image">
            @error('Org_photo')
              <div class="invalid-feedback">
                Tolong masukkan photo anda!
              </div>
            @enderror
          </div>
          <a href="{{route('org.details')}}" class="btn btn-dark">back</a>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
		    </div>
		  </div>
		</div>
	 </div>
  </body>
</html>