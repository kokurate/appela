<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>{{ $title }}</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="/logo.jpg" />
    <!-- Place favicon.ico in the root directory -->

    <!-- Web Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- ========================= CSS here ========================= -->
    <link rel="stylesheet" href="/templates/visitor/index/template/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/templates/visitor/index/template/assets/css/LineIcons.2.0.css" />
    <link rel="stylesheet" href="/templates/visitor/index/template/assets/css/animate.css" />
    <link rel="stylesheet" href="/templates/visitor/index/template/assets/css/tiny-slider.css" />
    <link rel="stylesheet" href="/templates/visitor/index/template/assets/css/glightbox.min.css" />
    <link rel="stylesheet" href="/templates/visitor/index/template/assets/css/main.css" />

    <!-- My CSS for ator depe nomor 4-6 -->
    <link rel="stylesheet" href="/css/visitor.css">

    <!-- Sweetalert 2-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    @yield('header')

</head>

<body>
    <div id="loading-area"></div>

    <!-- Start Header Area -->
    <header class="header other-page">
        <div class="navbar-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand logo" href="/">
                                <img class="logo1" src="/logoappela.png"  width="" alt="Appela Puskom" />
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ml-auto">
                                  <!-- Class active put inside <a class="active"> -->
                                    <li class="nav-item"><a href="/">Home</a></li>
                                    <li class="nav-item"><a href="{{ route('pengaduan.index', '#aktivasi-email') }}">Registrasi Email</a></li>
                                    <li class="nav-item"><a href="{{ route('pengaduan.index', '#kirim-ulang-link') }}">Kirim Ulang Link</a></li>
                                </ul>
                            </div>
                            <!-- navbar collapse -->
                            <div class="button">
                                <a href="{{ route('pengaduan.search') }}" class="btn"> <i class="lni lni-search-alt"></i> Cari </a>
                            </div>
                        </nav>
                        <!-- navbar -->
                    </div>
                </div>
                <!-- row -->
            </div>
            <!-- container -->
        </div>
        <!-- navbar area -->
    </header>
    <!-- End Header Area -->

    <!-- Start Breadcrumbs -->
    <div class="breadcrumbs overlay">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">{{ $title }}</h1>
                        <br>
                        <h6 class="" style="color:white" >{{ $page_title_1 }}<br> 
                          {{ $page_title_2 }}</h6>
                            <hr style="width: 35%" color="white">
                    </div>
                    <ul class="breadcrumb-nav">
                        <li><a href="/">Home</a></li>
                        <li><a href="{{ route('pengaduan.search') }}">Cari Pengaduan</a></li>
                    </ul>
                </div> <!-- End Col 12 -->
            </div> <!-- End Row -->
        </div> <!-- End Container -->
    </div> 
    <!-- End Breadcrumbs -->

    <!-- ================= Content in every page here ============= -->
    @yield('content')
    @include('sweetalert::alert')

    <!-- Start Footer Bottom -->
    <footer class="footer mt-0">
        <div class="footer-bottom">
            <div class="container">
                <div class="inner">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="left">
                                <p>Maintened by<a href="https://puskom.unima.ac.id/" rel="nofollow"
                                        target="_blank">Pusat Komputer</a>, Universitas Negeri Manado</p>
                          
                              
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="right">
                                <ul>
                                    <li>Designed by <a href="https://graygrids.com/" rel="nofollow"
                                        target="_blank">GrayGrids</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Middle -->
    </footer>
    <!--/ End Footer Area -->

    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top btn-hover">
        <i class="lni lni-chevron-up"></i>
    </a>

    <!-- ========================= JS here ========================= -->
    <script src="/templates/visitor/index/template/assets/js/bootstrap.min.js"></script>
    <script src="/templates/visitor/index/template/assets/js/wow.min.js"></script>
    <script src="/templates/visitor/index/template/assets/js/tiny-slider.js"></script>
    <script src="/templates/visitor/index/template/assets/js/glightbox.min.js"></script>
    <script src="/templates/visitor/index/template/assets/js/main.js"></script>

    <!-- =========================== Sweet alert 2 error ========================= -->
    @yield('javascript')

    <!-- Javascript for active-->


</body>

</html>