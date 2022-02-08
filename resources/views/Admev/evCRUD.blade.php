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
    <title>Events CRUD</title>
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
    <div>
     <div class="col-10">
      <h1 class="mt-3">Events List</h1>
      <a href="{{route('admin.events.create')}}" class="btn btn-primary my-3">Add new event</a>
      @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
      @endif
      <table class="table">
        <thead class="table-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Event_Code</th>
            <th scope="col">Nama</th>
            <th scope="col">Game</th>
            <th scope="col">Tanggal Mulai</th>
            <th scope="col">Tanggal Akhir</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($event as $ev)
          <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$ev->Ev_code}}</td>
            <td>{{$ev->Ev_nama}}</td>
            <td>{{$ev->Ev_game}}</td>
            <td>{{$ev->Ev_startDate}}</td>
            <td>{{$ev->Ev_endDate}}</td>
            <td>
              <a href="{{route('admin.events.show',$ev->Ev_id)}}" class="btn btn-dark">detail</a>
              <a href="{{route('admin.events.edit',$ev->Ev_id)}}" class="btn btn-primary">edit</a>
              <form action="{{route('admin.events.destroy',$ev->Ev_id)}}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button type="submit" class="btn btn-danger">delete</button>
              </form>
              @if($ev->Ev_status == 'no')
              <form action="{{route('admin.events.approve',$ev->Ev_id)}}" method="post" class="d-inline">
                @method('put')
                @csrf
                <button type="submit" class="btn btn-success">approve</button>
              </form>
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