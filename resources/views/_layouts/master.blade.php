<!--
=========================================================
* Argon Dashboard 2 - v2.0.4
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  {{-- <link rel="apple-touch-icon" sizes="76x76" href="/templates/auth/assets/img/apple-icon.png"> --}}
  <link rel="icon" type="image/png" href="/favicon.ico">
  <title>
   {{ $title }}
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="/templates/auth/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="/templates/auth/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  {{-- <script src="https://kit.fontawesome.com/aa3eec1cb8.js" crossorigin="anonymous"></script> --}}
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="/templates/auth/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="/templates/auth/assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />


  @yield('header')

</head> 

<!-- ===== Side Bar ====  -->
<body class="g-sidenav-show   bg-gray-100">
    <!-- Background Top -->
    <div class="min-height-300 bg-gradient-primary  position-absolute w-100"></div>
    <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
      <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="/" target="_blank">
          <img src="/logo.jpg" class="navbar-brand-img h-100" alt="main_logo">
          <span class="ms-1 font-weight-bold">APPELA Puskom</span>
        </a>
      </div>
      <hr class="horizontal dark mt-0">
      <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
          <!-- Dashboard -->
          <li class="nav-item">
            <a class="nav-link active" href="{{ route('admin.index') }}">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-key-25 text-primary text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Dashboard Admin</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Dashboard</span>
            </a>
          </li>
          <!-- Jaringan -->
          <li class="nav-item">
            <a class="nav-link " href="{{ route('jaringan.index') }}">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                  {{-- <i class="material-icons text-warning text-sm opacity-10">wifi</i> --}}
                <i class="fa fa-solid fa-wifi text-warning text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Jaringan</span>
            </a>
          </li>
          <!-- Server -->
          <li class="nav-item">
            <a class="nav-link " href="#">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="fa fa-server text-success text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Server</span>
            </a>
          </li>
          <!-- Sistem Informasi -->
          <li class="nav-item">
            <a class="nav-link " href="#">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="fa fa-book-open text-info text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Sistem Informasi</span>
            </a>
          </li>
          <!-- Website Unima -->
          <li class="nav-item">
            <a class="nav-link " href="#">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-world-2 text-danger text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Website UNIMA</span>
            </a>
          </li>
          <!-- Learning Management System -->
          <li class="nav-item">
            <a class="nav-link " href="#">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="fa fa-school text-danger text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">LMS</span>
            </a>
          </li>
          <!-- Ijazah -->
          <li class="nav-item">
            <a class="nav-link " href="#">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="fa fa-graduation-cap text-danger text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Ijazah</span>
            </a>
          </li>
          <!-- Slip -->
          <li class="nav-item">
            <a class="nav-link " href="#">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="fas fa-envelope-open-text text-danger text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Slip</span>
            </a>
          </li>
  
          <li class="nav-item mt-3">
            <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Admin pages</h6>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="/templates/auth/pages/profile.html">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Admin</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="/templates/auth/pages/sign-in.html">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="fa fa-file-export text-warning text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Export</span>
            </a>
          </li>
        </ul>
      </div>
      <div class="sidenav-footer mx-3 ">
        <div class="card card-plain shadow-none" id="sidenavCard">
          <div class="card-body text-center p-3 w-100 pt-0">
            <div class="docs-info">
              <h6 class="mt-2">Welcome</h6>
              <p class="text-xs font-weight-bold mb-0">{{ auth()->user()->name }}</p>
            </div>
          </div>
        </div>
        <!-- <a href="https://www.creative-tim.com/learning-lab/bootstrap/license/argon-dashboard" target="_blank" class="btn btn-dark btn-sm w-100 mb-3">Documentation</a> -->
        <form action="{{ route('logout') }}" method="post">
          @csrf
          <button type="submit" class="btn btn-primary btn-sm mb-0 w-100">Log Out</button>
        </form>        
      </div>
    </aside>
    <!-- End Side Bar -->

    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
          <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
                <li class="breadcrumb-item text-sm text-white active" aria-current="page">{{ $url }}</li>
              </ol>
              <h4 class="font-weight-bolder text-dark active mb-0">{{ $title }}</h4>
            </nav>
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
              <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <!-- Seolah-olah ada isi -->
              </div>
              <ul class="navbar-nav  justify-content-end">
                <!-- Navbar in mobile view -->
                <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                      <div class="sidenav-toggler-inner">
                        <i class="sidenav-toggler-line bg-white"></i>
                        <i class="sidenav-toggler-line bg-white"></i>
                        <i class="sidenav-toggler-line bg-white"></i>
                      </div>
                    </a>
                </li>
                <!--  Argon Configurator -->
                <li class="nav-item px-3 d-flex align-items-center">
                  <a href="javascript:;" class="nav-link text-white p-0">
                    <i class="fa fa-hammer fixed-plugin-button-nav cursor-pointer"></i>
                  </a>
                </li>
                <!-- Setting ubah pass icon -->
                <li class="nav-item dropdown pe-2 d-flex align-items-center">
                  <a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                     <i class="fa fa-cog cursor-pointer"></i> 
                  </a>
                  <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                    <li class="mb-2">
                      <a class="dropdown-item border-radius-md" href="javascript:;">
                        <div class="d-flex py-1">
                          <div class="my-auto">
                            {{-- <img src="/templates/auth/assets/img/team-2.jpg" class="avatar avatar-sm  me-3 "> --}}
                            {{-- <i class="fa fa-solid fa-lock avatar avatar-sm  me-3 text-secondary "></i> --}}
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="text-sm font-weight-normal mb-1">
                                <span class="font-weight-bold text-dark">Ubah Password</span>
                            </h6>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li class="mb-2">
                      <a class="dropdown-item border-radius-md" href="javascript:;">
                        <div class="d-flex py-1">
                          <!-- <div class="my-auto">
                            <i class="fa fa-solid fa-arrow-right avatar-sm  me-3 text-secondary "></i>
                          </div> -->
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="text-sm font-weight-normal mb-1">
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                  <button type="submit" class="border-0 font-weight-bold text-dark" style="border: none">Log Out</button>
                                  </form> 
                            </h6>
                          </div>
                        </div>
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <!-- End Navbar -->

        <!-- ==================================== Section- =========================== -->
        @yield('content')
        @include('sweetalert::alert')



    <!-- Footer -->
      <footer class="footer pt-3  mt-10 mb-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between ">
            <div class="col-lg-6">
                <div class="text-center text-sm text-muted text-lg-start">
                    © <script>
                        document.write(new Date().getFullYear())
                      </script>,
                    Maintened by 
                    <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">
                        Pusat Komputer
                    </a>
                    Universitas Negeri Manado
                </div>
            </div>
            <div class="col-lg-6 mb-lg-0 mb-4">
                <div class="copyright text-center text-sm text-muted text-lg-end">
                  Template by
                  <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
                </div>
              </div>
          </div>
        </div>
      </footer>
  </main>

  <!-- Configurator -->
  <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="fa fa-cog py-2"> </i>
    </a>
    <div class="card shadow-lg">
      <div class="card-header pb-0 pt-3 ">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Configurator</h5>
          <p>Atur desain sesuai keinginan kalian</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="fa fa-close"></i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0 overflow-auto">
        <!-- Sidebar Backgrounds -->
        <div>
          <h6 class="mb-0">Sidebar Colors</h6>
        </div>
        <a href="javascript:void(0)" class="switch-trigger background-color">
          <div class="badge-colors my-2 text-start">
            <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
          </div>
        </a>
        <!-- Sidenav Type -->
        <div class="mt-3">
          <h6 class="mb-0">Sidenav Type</h6>
          <p class="text-sm">Pilih di antara 2 jenis sidenav yang berbeda.</p>
        </div>
        <div class="d-flex">
          <button class="btn bg-gradient-primary w-100 px-3 mb-2 active me-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
          <button class="btn bg-gradient-primary w-100 px-3 mb-2" data-class="bg-default" onclick="sidebarType(this)">Dark</button>
        </div>
        <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
        <!-- Navbar Fixed -->
        <div class="d-flex my-3">
          <h6 class="mb-0">Navbar Fixed</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
          </div>
        </div>
        <hr class="horizontal dark my-sm-4">
        <div class="mt-2 mb-5 d-flex">
          <h6 class="mb-0">Light / Dark</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
          </div>
        </div>
        
        <div class="w-100 text-center">
          <h6 class="mt-3 btn btn-dark">APPELA Puskom</h6>
        </div>
      </div>
    </div>
  </div>
  <!-- End Configurator -->
  <!--   Core JS Files   -->
  <script src="/templates/auth/assets/js/core/popper.min.js"></script>
  <script src="/templates/auth/assets/js/core/bootstrap.min.js"></script>
  <script src="/templates/auth/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="/templates/auth/assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="/templates/auth/assets/js/plugins/chartjs.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="/templates/auth/assets/js/argon-dashboard.min.js?v=2.0.4"></script>

  <!-- ========================================= Section ===========================-->
  @yield('javascript')


    
</body>

</html>
