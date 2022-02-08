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
    <title>Organizer Detail</title>
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
             <a class="nav-link active" href="{{url('/users')}}">User</a>
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
     <div class="row">
       <div class="col-6">
         <h1 class="mt-3">User Details</h1>
         <div class="card" style="width: 18rem;">
          <img src="{{$organizer->Org_photo}}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">{{$organizer->Org_nama}}</h5>
            <p class="card-text">{{$organizer-> Org_description}}</p>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Organizer level: {{$organizer->Org_rank}}</li>
            <li class="list-group-item">Email: {{$organizer->Org_email}}</li>
            <li class="list-group-item">Alamat: {{$organizer->Org_alamat}}</li>
            <li class="list-group-item">Nomor telepon: {{$organizer->Org_telepon}}</li>
          </ul>
          <div class="card-body">
            <a href="{{url('organizers')}}" class="btn btn-dark">back</a>
            <a href="{{route('organizers.edit',$organizer->Org_id)}}" class="btn btn-primary">edit</a>
            <form action="{{route('organizers.destroy',$organizer->Org_id)}}" method="post" class="d-inline">
              @method('delete')
              @csrf
              <button type="submit" class="btn btn-danger">delete</button>
            </form>
          </div>
        </div>
       </div>
     </div>
   </div>
  </body>
</html>