<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <!-- <link rel="icon" type="image/png" href="/templates/login/images/icons/favicon.ico" /> -->
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/templates/login/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/templates/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/templates/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/templates/login/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/templates/login/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/templates/login/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/templates/login/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/templates/login/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/templates/login/css/util.css">
    <link rel="stylesheet" type="text/css" href="/templates/login/css/main.css">
    <!--===============================================================================================-->

    <!-- bootstrap 4 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

</head>

<body>

    <div class="limiter">
        <div class="container-login100" style="background-image: url('/templates/login/images/1.jpg');">
            <!-- <img src="/templates/login/images/bg-01.jpg" style="background-image: ;"> -->
            <div class="wrap-login100 p-t-30 p-b-50">
                <span class="login100-form-title p-b-41">
                   APPELA Login
                </span>


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


                <form action="{{ route('authenticate') }}" method="post" class="login100-form validate-form p-b-33 p-t-5" enctype="multipart/form-data">
                    @csrf

                    <!-- email -->
                    <div class="wrap-input100 validate-input" data-validate="Masukkan email">
                        <input type="email" class="input100" name="email" placeholder="Masukkan Email" value="{{ old('email') }}">
                        <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <input type="password" name="password" class="input100  " placeholder="Masukkan Password" autocomplete="off">

                        <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                    </div>
                    <br>
                    <div class="container-login100-form-btn m-t-32">
                        <button type="submit" class="login100-form-btn">
                            Login
                        </button>
                    </div>
                    <div class="text-center">
                        <a href="/" class="badge badge-outline-dark  m-t-32" style="color: black;">Kembali Ke Home</a>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="/templates/login/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="/templates/login/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="/templates/login/vendor/bootstrap/js/popper.js"></script>
    <script src="/templates/login/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="/templates/login/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="/templates/login/vendor/daterangepicker/moment.min.js"></script>
    <script src="/templates/login/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="/templates/login/vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="/templates/login/js/main.js"></script>

    <!-- Script fade down pesan gagal -->
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 3000);
    </script>

</body>

</html>