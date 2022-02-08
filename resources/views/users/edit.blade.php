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
    <title>Dashboard</title>
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
             <a class="nav-link active" aria-current="page" href="{{url('/userHome')}}">HOME</a>
           </li>
           <li class="nav-item">
             <a class="nav-link active" href="{{url('/userEvents')}}">EVENTS</a>
           </li>
           <li class="nav-item">
             <a class="nav-link active" href="{{url('/user/register')}}">REGISTRATION</a>
           </li>
           <li class="nav-item">
             <a class="nav-link active" href="{{route('userLogin')}}">PROFILE</a>
           </li>
         </ul>
       </div>
     </div>
   </nav>
   <div class="container">
    <h1 class="mt-2">User details</h1>
    <div class="row">
      <div class="col-sm-3">
        <div class="card" style="width: 18rem;">
          <div class="card-header">
            Menu
          </div>
          <ul class="list-group list-group-flush">
            <a href="{{route('user.details')}}" class="list-group-item">Profile</a>
            <a href="{{route('user.lists')}}" class="list-group-item">Registrations</a>
            <a href="{{route('userLogout')}}" class="list-group-item">Logout</a>
          </ul>
        </div>
      </div>
      <div class="col-sm-6">
        <h1 class="mt-3">Form update user</h1>
         <form method="post" action="{{route('user.update')}}" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="mb-3">
            <label for="Nama" class="form-label">Nama:</label>
            <input type="text" class="form-control @error('Nama') is-invalid @enderror" id="Nama" placeholder="masukkan nama" name="Nama" value="{{$user->Nama}}">
            @error('Nama')
              <div class="invalid-feedback">
                Tolong masukkan nama anda!
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="masukkan email" name="email" value="{{$user->email}}">
            @error('email')
              <div class="invalid-feedback">
                Tolong masukkan email anda!
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="Alamat" class="form-label">Alamat:</label>
            <input type="text" class="form-control @error('Alamat') is-invalid @enderror" id="Alamat" placeholder="masukkan alamat" name="Alamat" value="{{$user->Alamat}}">
            @error('Alamat')
              <div class="invalid-feedback">
                Tolong masukkan alamat anda!
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="Telepon" class="form-label">Telepon:</label>
            <input type="tel" class="form-control @error('No_telepon') is-invalid @enderror" id="Telepon" placeholder="masukkan nomor telepon" name="Telepon" value="{{$user->No_telepon}}">
            @error('No_telepon')
              <div class="invalid-feedback">
                Tolong masukkan nomor telepon anda!
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="TanggalLahir" class="form-label">Tanggal lahir:</label>
            <input type="date" class="form-control @error('Tanggal_lahir') is-invalid @enderror" id="TanggalLahir" name="TanggalLahir" value="{{$user->Tanggal_lahir}}">
            @error('Tanggal_lahir')
              <div class="invalid-feedback">
                Tolong masukkan tanggal lahir anda!
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="User_photo" class="form-label">Photo:</label>
            <input type="file" class="form-control @error('User_photo') is-invalid @enderror" id="User_photo"  name="image">
            @error('User_photo')
              <div class="invalid-feedback">
                Tolong masukkan photo anda!
              </div>
            @enderror
          </div>
          <a href="{{url('/user/details')}}" class="btn btn-dark">back</a>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
   </div>
  </body>
</html>