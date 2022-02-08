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
    <title>Form update event</title>
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
         <h1 class="mt-3">Form edit event</h1>
         <form method="post" action="{{route('admin.events.update',$event->Ev_id)}}" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="mb-3">
            <label for="Ev_code" class="form-label">Kode Event:</label>
            <input type="text" class="form-control @error('Ev_code') is-invalid @enderror" id="Ev_code" placeholder="masukkan kode event" name="Ev_code" value="{{$event->Ev_code}}">
            @error('Ev_code')
              <div class="invalid-feedback">
                Tolong masukkan kode event!
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="Nama" class="form-label">Nama Event:</label>
            <input type="text" class="form-control @error('Ev_nama') is-invalid @enderror" id="Nama" placeholder="masukkan nama event" name="Ev_nama" value="{{$event->Ev_nama}}">
            @error('Ev_nama')
              <div class="invalid-feedback">
                Tolong masukkan nama event!
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="Nama" class="form-label">Nama Game:</label>
            <input type="text" class="form-control @error('Ev_game') is-invalid @enderror" id="game" placeholder="masukkan nama game" name="Ev_game" value="{{$event->Ev_game}}">
            @error('Ev_game')
              <div class="invalid-feedback">
                Tolong masukkan nama game!
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="Ev_genre" class="form-label">Nama Game:</label>
            <div class="input-group mb-3">
              <label class="input-group-text" for="Ev_genre">Options</label>
              <select name="Ev_genre" class="form-select" id="Ev_genre">
                <option value="{{$event->Ev_genre}}" selected>{{$event->Ev_genre}}</option>
                <option value="shooting">shooting</option>
                <option value="fighting">fighting</option>
                <option value="moba">moba</option>
                <option value="strategy">strategy</option>
                <option value="misc">misc</option>
              </select>
            </div>
            @error('Ev_genre')
              <div class="invalid-feedback">
                Tolong masukkan nama game!
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="Ev_kuota" class="form-label">Kuota:</label>
            <input type="number" class="form-control @error('Ev_kuota') is-invalid @enderror" id="Ev_kuota" placeholder="masukkan id organizer" name="Ev_kuota" value="{{$event->Ev_kuota}}">
            @error('Ev_kuota')
              <div class="invalid-feedback">
                Tolong masukkan nama event!
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="Ev_startDate" class="form-label">Tanggal Mulai:</label>
            <input type="date" class="form-control @error('Ev_startDate') is-invalid @enderror" id="Ev_startDate" name="Ev_startDate" value="{{$event->Ev_startDate}}">
            @error('Ev_startDate')
              <div class="invalid-feedback">
                Tolong masukkan tanggal mulai event!
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="Ev_endDate" class="form-label">Tanggal Akhir:</label>
            <input type="date" class="form-control @error('Ev_endDate') is-invalid @enderror" id="Ev_endDate" name="Ev_endDate" value="{{$event->Ev_startDate}}">
            @error('Ev_endDate')
              <div class="invalid-feedback">
                Tolong masukkan tanggal berakhir event!
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <div>Event description:</div>
            <div class="form-floating">
              <textarea class="form-control" placeholder="Masukkan deskripsi user" id="Ev_description" name="Ev_description" value="{{$event->Ev_description}}"></textarea>
              <label for="Ev_description">description</label>
            </div>
          </div>
          <div class="mb-3">
            <label for="Ev_photo" class="form-label">Photo:</label>
            <input type="file" class="form-control @error('Ev_photo') is-invalid @enderror" id="Ev_photo"  name="image">
            @error('Ev_photo')
              <div class="invalid-feedback">
                Tolong masukkan photo anda!
              </div>
            @enderror
          </div>
          <a href="{{url('/events')}}" class="btn btn-dark">back</a>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
       </div>
     </div>
   </div>
  </body>
</html>