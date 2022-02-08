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
    <title>Admin</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	   <div class="container-fluid">
	     <a class="navbar-brand" href="{{url('/')}}">ESN.id</a>
	     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
	       <span class="fa fa-bars"></span>
	     </button>
	     <div class="collapse navbar-collapse" id="navbarNav">
	       <ul class="navbar-nav">
	         <li class="nav-item">
	           <a class="nav-link active" aria-current="page" href="{{url('/adminHome')}}">Home</a>
	         </li>
	         <li class="nav-item">
	           <a class="nav-link" href="{{url('/users')}}">User</a>
	         </li>
	         <li class="nav-item">
	           <a class="nav-link" href="{{url('/organizers')}}">Organization</a>
	         </li>
	         <li class="nav-item">
	           <a class="nav-link" href="{{url('/events')}}">Events</a>
	         </li>
	       </ul>
	     </div>
	   </div>
	 </nav>
	 <div class="container">
	  <div>
	   <div class="col-10">
	    <h1 class="mt-2">Welcome Admin</h1>
	    <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
	   </div>
	  </div>
	 </div>
  </body>
</html>