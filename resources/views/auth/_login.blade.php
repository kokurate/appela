
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/templates/login/style.css">
    <title>Login</title>

  </head>
  <body>
    

      {{-- Flash data --}}
  @if(session()->has('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

 {{-- Flash data --}}
 @if(session()->has('error'))
 <div class="alert alert-danger alert-dismissible fade show" role="alert">
     {{ session('error') }}
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
 </div>
@endif

@include('sweetalert::alert')

    <!-- Main Content -->
    <div class="container-fluid">
      <div class="row main-content bg-success text-center">
        <div class="col-md-4 text-center company__info">
          <span class="company__logo"><h2><span class="fa fa-android"></span></h2></span>
          <h4 class="company_title">Your Company Logo</h4>
        </div>
        <div class="col-md-8 col-xs-12 col-sm-12 login_form ">
          <div class="container-fluid">
            <div class="row">
              <h2>Log In</h2>
            </div>
            <div class="row">
              <form control="" class="form-group">
                <div class="row">
                  <input type="text" name="username" id="username" class="form__input" placeholder="Username">
                </div>
                <div class="row">
                  <!-- <span class="fa fa-lock"></span> -->
                  <input type="password" name="password" id="password" class="form__input" placeholder="Password">
                </div>
                <div class="row">
                  <input type="checkbox" name="remember_me" id="remember_me" class="">
                  <label for="remember_me">Remember Me!</label>
                </div>
                <div class="row">
                  <input type="submit" value="Submit" class="btn">
                </div>
              </form>
            </div>
            <div class="row">
              <p>Don't have an account? <a href="#">Register Here</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Footer -->
    <div class="container-fluid text-center footer">
      Coded with &hearts; by <a href="https://bit.ly/yinkaenoch">Yinka.</a></p>
    </div>






  {{-- <form action="{{ route('authenticate') }}" method="post">
    @csrf
    
    <img class="mb-4" src="/example/sign-in/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <div class="form-floating">
        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" required autofocus value="{{ old('email') }}">
        <label for="email">Email address</label>
          @error('email')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
          @enderror
      </div>
  
      <div class="form-floating">
        <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
        <label for="password">Password</label>
      </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
  </form> --}}



    
  </body>

</html>