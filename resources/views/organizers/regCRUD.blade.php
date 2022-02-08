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
    <title>Registered</title>
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
    <h1 class="mt-2">Register List</h1>
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
      <div class="col-sm-9">
        @if (session('status'))
          <div class="alert alert-success">
              {{ session('status') }}
          </div>
        @endif
        <table class="table">
          <thead class="table-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Event</th>
              <th scope="col">Username</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($registration as $ev)
            <tr>
              <th scope="row">{{$loop->iteration}}</th>
              <td>{{$ev->events->Ev_nama}}</td>
              <td>{{$ev->username}}</td>
              <td>
                @if($ev->status == 'no')
                <form action="{{route('org.reg.approve',$ev->Regis_id)}}" method="post" class="d-inline">
                  @method('put')
                  @csrf
                  <input type="hidden" value="{{$ev->Regis_id}}" name="Regis_id">
                  <button type="submit" class="btn btn-primary">approve</button>
                </form>
                @else
                <a class="btn btn-success">approved</a>
                @endif
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