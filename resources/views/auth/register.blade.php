<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Signin Template · Bootstrap v5.0</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Bootstrap core CSS -->
<link href="/example/sign-up/assets/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="/example/sign-up/bootstrap.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="/example/sign-up/signin.css" rel="stylesheet">
  </head>
     {{-- Flash data --}}
        @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

  <body class="text-center">
    
<main class="form-signin">
  <form action="{{ route('register') }}" method="post">
    @csrf
    <img class="mb-4" src="/example/sign-up/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">{{ $title }}</h1>

          {{-- Tujuan Admin --}}
          <div class="mb-3">
            <label for="tujuan" class="form-label"></label>
            <select class="form-select" name="level" >
              <option>Pilih Role</option>
              <option value="petugas" >Petugas</option>
              <option value="jaringan" >Jaringan</option>
              <option value="server" >Server</option>
              <option value="sistem_informasi" >Sistem Informasi</option>
              <option value="website_unima" >Website UNIMA</option>
              <option value="lms" >Learning Management System</option>
              <option value="ijazah" >Ijazah</option>
              <option value="slip" >Slip</option>
            </select>
            @error('level')
            <p class="text-danger">Pilih Role</p>
              @enderror
          </div>  

    {{-- Name --}}
    <div class="form-floating">
      <input type="text" name="name" class="form-control @error('name')is-invalid @enderror " id="name" placeholder="Name" required value="{{ old('name') }}">
      <label for="name">Name</label>
      @error('name')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>

    {{-- Email --}}
    <div class="form-floating">
        <input type="email"   name="email" class="form-control  @error('email')is-invalid @enderror" id="email" placeholder="email" required value="{{ old('email') }}">
        <label for="email">Email</label>
        @error('email')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
      </div>

    {{-- Phone --}}
    <div class="form-floating">
      <input type="tel"    name="phone" class="form-control @error('phone')is-invalid @enderror" id="phone" placeholder="phone" required value="{{ old('phone') }}">
      <label for="phone">Phone</label>
      @error('phone')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
    @enderror
    </div>

   {{-- Password --}}
    <div class="form-floating">
      <input type="password" name="password" class="form-control  @error('password')is-invalid @enderror" id="password" placeholder="Password">
      <label for="password">Password</label>
      @error('password')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
    @enderror
    </div>

    <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
</form>
<br>
<small class="mt-2"><a href="{{ route('login') }}">Login </a></small>
<p class="mt-5 mb-3 text-muted">&copy; puskom</p>
</main>

  </body>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>
