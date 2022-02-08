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
    <title>Events Detail</title>
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
               <a class="nav-link" href="{{url('/organizers')}}">Organization</a>
             </li>
             <li class="nav-item">
               <a class="nav-link active" href="{{url('/events')}}">Events</a>
             </li>
           </ul>
         </div>
       </div>
     </nav>

   <div class="container">
     <div class="row">
       <div class="col-6">
         <h1 class="mt-3">Event Details</h1>
         <div class="card" style="width: 18rem;">
          <img src="{{$event->Ev_photo}}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">{{$event->Ev_nama}}</h5>
            <p class="card-text">{{$event->Ev_description}}</p>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Event code: {{$event->Ev_code}}</li>
            <li class="list-group-item">Kuota event: {{$event->Ev_kuota}}</li>
            <li class="list-group-item">Game: {{$event->Ev_game}}</li>
            <li class="list-group-item">Genre: {{$event->Ev_genre}}</li>
            <li class="list-group-item">Organizer name: {{$event->organizer->Org_nama}}</li>
            <li class="list-group-item">Tanggal mulai: {{$event->Ev_startDate}}</li>
            <li class="list-group-item">Tanggal berakhir: {{$event->Ev_endDate}}</li>
          </ul>
          <div class="card-body">
            <a href="{{url('/events')}}" class="btn btn-dark">back</a>
              <a href="{{route('admin.events.edit',$event->Ev_id)}}" class="btn btn-primary">edit</a>
              <form action="{{route('admin.events.destroy',$event->Ev_id)}}" method="post" class="d-inline">
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