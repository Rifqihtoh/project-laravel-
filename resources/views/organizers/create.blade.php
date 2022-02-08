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
    <title>Form tambah organizer</title>
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
         <h1 class="mt-3">Form tambah organizer</h1>
         <form method="post" action="{{route('organizers.store')}}">
          @csrf
          <div class="mb-3">
            <label for="Nama" class="form-label">Nama:</label>
            <input type="text" class="form-control @error('Org_nama') is-invalid @enderror" id="Nama" placeholder="masukkan nama" name="Org_nama" value="{{old('Org_nama')}}">
            @error('Org_nama')
              <div class="invalid-feedback">
                Tolong masukkan nama anda!
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="Email" class="form-label">Email:</label>
            <input type="email" class="form-control @error('Org_email') is-invalid @enderror" id="Email" placeholder="masukkan email" name="Org_email" value="{{old('Org_email')}}">
            @error('Org_email')
              <div class="invalid-feedback">
                Tolong masukkan email anda!
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="Password" class="form-label">Password:</label>
            <input type="password" class="form-control @error('Org_password') is-invalid @enderror" id="Password" placeholder="masukkan password" name="Org_password" value="{{old('Org_password')}}">
            @error('Org_password')
              <div class="invalid-feedback">
                Tolong masukkan password anda!
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="Alamat" class="form-label">Alamat:</label>
            <input type="text" class="form-control @error('Org_alamat') is-invalid @enderror" id="Alamat" placeholder="masukkan alamat" name="Org_alamat" value="{{old('Org_alamat')}}">
            @error('Org_alamat')
              <div class="invalid-feedback">
                Tolong masukkan alamat anda!
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="Telepon" class="form-label">Telepon:</label>
            <input type="tel" class="form-control @error('Org_telepon') is-invalid @enderror" id="Telepon" placeholder="masukkan nomor telepon" name="Org_telepon" value="{{old('Org_telepon')}}">
            @error('Org_telepon')
              <div class="invalid-feedback">
                Tolong masukkan nomor telepon anda!
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <div>User description:</div>
            <div class="form-floating">
              <textarea class="form-control" placeholder="Masukkan deskripsi user" id="userdesc" name="Org_description" value="{{old('Org_description')}}"></textarea>
              <label for="userdesc">description</label>
            </div>
          </div>
          <a href="{{url('/organizers')}}" class="btn btn-dark">back</a>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
       </div>
     </div>
   </div>
  </body>
</html>