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
	 </nav>
	 <div class="container">
	        <div class="col-md-4 offset-md-4 mt-5">
	            <div class="card">
	                <div class="card-header">
	                    <h3 class="text-center">Admin Sign-in</h3>
	                </div>
	                <form action="{{ route('adminLogin')}}" method="post">
	                @csrf
	                <div class="card-body">
	                    @if(session('errors'))
	                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
	                            Something it's wrong:
	                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                                <span aria-hidden="true">×</span>
	                            </button>
	                            <ul>
	                            @foreach ($errors->all() as $error)
	                            <li>{{ $error }}</li>
	                            @endforeach
	                            </ul>
	                        </div>
	                    @endif
	                    @if (session('status'))
						    <div class="alert alert-danger">
						        {{ session('status') }}
						    </div>
						@endif
	                    <div class="form-group">
	                        <label for=""><strong>Email</strong></label>
	                        <input type="text" name="email" class="form-control" placeholder="Email">
	                    </div>
	                    <div class="form-group">
	                        <label for=""><strong>Password</strong></label>
	                        <input type="password" name="password" class="form-control" placeholder="Password">
	                    </div>
	                </div>
	                <div class="card-footer">
	                    <button type="submit" class="btn btn-primary btn-block">Login</button>
	                </div>
	                </form>
	            </div>
	        </div>
	    </div>
  </body>
</html>