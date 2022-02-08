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
    <title>Organizer CRUD</title>
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
               <a class="nav-link" aria-current="page" href="{{url('/adminHome')}}">Home</a>
             </li>
             <li class="nav-item">
               <a class="nav-link" href="{{url('/users')}}">User</a>
             </li>
             <li class="nav-item">
               <a class="nav-link active" href="{{url('/organizers')}}">Organization</a>
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
	    <h1 class="mt-3">Organizer List</h1>
	    <a href="{{route('organizers.create')}}" class="btn btn-primary my-3">Add new organizer</a>
	    @if (session('status'))
		    <div class="alert alert-success">
		        {{ session('status') }}
		    </div>
		@endif
	    <table class="table">
		  <thead class="table-dark">
		  	<tr>
		  		<th scope="col">#</th>
			    <th scope="col">Nama</th>
			    <th scope="col">Email</th>
			    <th scope="col">Telepon</th>
			    <th scope="col">Level</th>
			    <th scope="col">Aksi</th>
		  	</tr>
		  </thead>
		  <tbody>
		  	@foreach($organizer as $org)
		  	<tr>
		  		<th scope="row">{{$loop->iteration}}</th>
		  		<td>{{$org->Org_nama}}</td>
		  		<td>{{$org->Org_email}}</td>
		  		<td>{{$org->Org_telepon}}</td>
		  		<td>{{$org->Org_rank}}</td>
		  		<td>
		  			<a href="{{route('organizers.show',$org->Org_id)}}" class="btn btn-dark">detail</a>
		  			<a href="{{route('organizers.edit',$org->Org_id)}}" class="btn btn-primary">edit</a>
		  			<form action="{{route('organizers.destroy',$org->Org_id)}}" method="post" class="d-inline">
		  				@method('delete')
		  				@csrf
		  				<button type="submit" class="btn btn-danger">delete</button>
		  			</form>
		  		</td>
		  	</tr>
		  	@endforeach
		  </tbody>
		</table>

	   </div>
	  </div>
	 </div>
  </body>
</html>