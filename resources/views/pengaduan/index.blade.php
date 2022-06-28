
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

    {{-- Css --}}
    <link rel="stylesheet" href="/example/sign-in/signin.css">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/example/sign-in/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/example/sign-in/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/example/sign-in/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/example/sign-in/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/example/sign-in/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="/example/sign-in/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#7952b3">


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
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
 

<main class="form-signin">

      {{-- Flash data --}}
  @if(session()->has('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

{{-- @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif --}}

 {{-- Flash data --}}
 @if(session()->has('error'))
 <div class="alert alert-danger alert-dismissible fade show" role="alert">
     {{ session('error') }}
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
 </div>
@endif





    <form action="{{ route('pengaduan.verify-email') }}" method="post" >
      @csrf
      
      <img class="mb-4" src="/example/sign-in/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
      <h1 class="h3 mb-3 fw-normal">Verifikasi email</h1>

      <div class="form-floating">
          <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" required autofocus value="{{ old('email') }}"  oninput="this.value = this.value.replace(/[^a-zA-Z0-9#-+_.]/g, '').replace(/(\..*)\./g, '$1');" />
          <label for="email">Email address</label>
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    
      
      <button class="w-100 btn btn-lg btn-primary" type="submit" >Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
    </form>
  </main>

  @include('sweetalert::alert')

    
  </body>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>