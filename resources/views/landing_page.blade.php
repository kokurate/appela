<!-- New Chart from https://canvasjs.com/php-charts/responsive-chart/ 
The tutorial = https://www.youtube.com/watch?v=62tpwIfHb-Q
-->

<?php
 
$dataPoints_status = array(
	array("label"=> "masuk", "y"=> $masuk ),
	array("label"=> "diverifikasi", "y"=>  $diverifikasi ),
	array("label"=> "diproses", "y"=>  $diproses ),
	array("label"=> "ditolak", "y"=>  $ditolak ),
	array("label"=> "selesai", "y"=>  $selesai ),
);
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>APPELA Puskom </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="/logo.jpg" rel="icon">
  <link href="/logo.jpg" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/templates/visitor/homepage/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="/templates/visitor/homepage/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/templates/visitor/homepage/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/templates/visitor/homepage/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/templates/visitor/homepage/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/templates/visitor/homepage/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="/templates/visitor/homepage/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Font Awesome-->
   <script src="https://kit.fontawesome.com/aa3eec1cb8.js" crossorigin="anonymous"></script>

  <!-- Template Main CSS File -->
  <link href="/templates/visitor/homepage/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Bootslander - v4.7.2
  * Template URL: https://bootstrapmade.com/bootslander-free-bootstrap-landing-page-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1><a href="/"><span>APPELA PUSKOM</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">Tentang</a></li>
          <li><a class="nav-link scrollto" href="#counts">Daftar Pengaduan</a></li>
          <li><a class="nav-link scrollto" href="#latest">Pengaduan Terakhir</a></li>
          <li><a class="nav-link scrollto" href="#faq">F.A.Q</a></li>
          <!--<li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li>
          -->
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">

    <div class="container">
      <div class="row justify-content-between">
        <div class="col-lg-7 pt-5 pt-lg-0 order-2 order-lg-1 d-flex align-items-center">
          <div data-aos="zoom-out">
            <h1>Aplikasi Pengaduan Layanan Pusat Komputer</h1>
            <h2 class="mb-5">Universitas Negeri Manado</h2>
            <div class="text-center text-lg-start">
              <!-- <a href="#about" class="btn-get-started scrollto btn btn-info px-2 py-2">Tentang Appela</a> -->
              <a href="#about" class="btn btn-success px-2 py-2">Tentang Appela</a>
              <a href="{{ route('pengaduan.index') }}" class="btn btn-danger px-2 py-2">Buat Pengaduan</a>
              <a href="{{ route('pengaduan.search') }}" class="btn btn-info px-2 py-2">Cari Pengaduan</a>
              <h2 class="my-3"><span>APPELA Puskom</span></h2>
            </div>
          </div>
        </div>
        <div class="col-lg-4 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="300">
          <img src="/templates/visitor/homepage/assets/img/hero-img.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

    <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
      <defs>
        <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
      </defs>
      <g class="wave1">
        <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
      </g>
      <g class="wave2">
        <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
      </g>
      <g class="wave3">
        <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
      </g>
    </svg>

  </section><!-- End Hero -->

  <!-- ====================== Chart ========================== -->
  <section id="counts" class="counts pt-5" >   
    <div class="container">
        <!-- Title-->
        <div class="section-title" data-aos="fade-up">
          <h2>Pengaduan</h2>
          <p>Daftar Pengaduan</p>
        </div>

        <div class="chart-container ">
            <!-- Total Pengaduan-->
            <div class="chart has-fixed-height" id="chart_all"></div>
        </div>
        
          <div class="row">
              <!-- Status Saat Ini -->
              <div class="mt-2 col-sm-6">
                  <div class="status" id="status" style="height: 370px; width: 100%;">
                  </div>
              </div>
              <!-- Pengaduan Saat ini -->
              <div class="mt-2 col-sm-6">
                  <div class="pengaduan" id="pengaduan" style="height: 370px; width: 100%;">
                      <p>test</p>
                  </div>
              </div>
          </div> <!-- End Row-->

    </div> <!-- End Container-->
  </section>

  <!-- End Chart-->
  





  <main id="main">
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container-fluid">

        <div class="row">

          <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch" data-aos="fade-right">
            <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
            <!-- <h4>Cara Membuat Pengaduan</h4> -->
          </div>

          <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5" data-aos="fade-left">
            <h3>Tentang APPELA</h3>
            <p><strong>APPELA</strong> merupakan singkatan dari Aplikasi Pengaduan Layanan. APPELA adalah sarana kepada civitas akademik Universitas Negeri Manado untuk menampung pengaduan terhadap layanan yang disediakan oleh Pusat Komputer.</p>
            <p>Tujuan dibuatnya APPELA supaya meningkatkan partisipasi Civitas Akademik dalam peningkatan layanan Pusat Komputer dan juga sebagai sarana untuk melaporkan pengaduan pribadi yang bisa diakses kapan saja dan di mana saja, selama kita terkoneksi dengan internet  </p>
            <p><strong>Saat ini ada 7 layanan yang tersedia</strong></p>

            <!-- Grid with icon
            <div class="icon-box" data-aos="zoom-in" data-aos-delay="100">
              <div class="icon"><i class="bx bx-fingerprint"></i></div>
              <h4 class="title"><a href="">Lorem Ipsum</a></h4>
              <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
            </div>

            <div class="icon-box" data-aos="zoom-in" data-aos-delay="200">
              <div class="icon"><i class="bx bx-gift"></i></div>
              <h4 class="title"><a href="">Nemo Enim</a></h4>
              <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
            </div>

            <div class="icon-box" data-aos="zoom-in" data-aos-delay="300">
              <div class="icon"><i class="bx bx-atom"></i></div>
              <h4 class="title"><a href="">Dine Pad</a></h4>
              <p class="description">Explicabo est voluptatum asperiores consequatur magnam. Et veritatis odit. Sunt aut deserunt minus aut eligendi omnis</p>
            </div>
            -->

          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Features Section ======= -->
    <section id="features" class="features">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Layanan</h2>
          <p>Tujuan Pengaduan Saat ini</p>
        </div>

        <div class="row" data-aos="fade-left">
          <div class="col-lg-3 col-md-4">
            <div class="icon-box" data-aos="zoom-in" data-aos-delay="50">
              <i class="bi bi-wifi" style="color: #ffae00;"></i>
              <h3><a href="https://puskom.unima.ac.id/internet" target="_blank">Jaringan</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
            <div class="icon-box" data-aos="zoom-in" data-aos-delay="100">
              <i class="bi bi-server" style="color: #5578ff;"></i>
              <h3><a href="https://puskom.unima.ac.id/server" target="_blank">Server</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
            <div class="icon-box" data-aos="zoom-in" data-aos-delay="150">
              <i class="fa fa-graduation-cap" style="color: #e80368;"></i>
              <h3>Ijazah</h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4 mt-lg-0">
            <div class="icon-box" data-aos="zoom-in" data-aos-delay="200">
              <i class="fas fa-envelope-open" style="color: #e361ff;"></i>
              <h3>Slip</h3>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 mt-4">
            <div class="icon-box" data-aos="zoom-in" data-aos-delay="250">
              <i class="fa fa-school" style="color: #47aeff;"></i>
              <h3><a href="https://lms.unima.ac.id/" target="_blank">Learning Management System</a></h3>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 mt-4">
            <div class="icon-box" data-aos="zoom-in" data-aos-delay="300">
              <i class="fa fa-book-open" style="color: #ffa76e;"></i>
              <h3><a href="http://si.unima.ac.id/" target="_blank">Sistem Informasi Akademik</a></h3>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 mt-4">
            <div class="icon-box" data-aos="zoom-in" data-aos-delay="350">
              <i class="bi bi-globe" style="color: #11dbcf;"></i>
              <h3><a href="https://unima.ac.id/" target="_blank">Website UNIMA</a></h3>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Features Section -->



      <div class="container" id="latest">
        <!-- Title-->
        <div class="section-title" data-aos="fade-up">
          <h2>Pengaduan</h2>
          <p>Pengaduan Terakhir</p>
        </div>
      </div>
   
    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container">

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">



          @forelse($pengaduan as $p)
            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="/logo.jpg" class="testimonial-img bg-light" alt="">
                <h3>{{ $p->updated_at->diffForHumans() }}</h3>
                <h4>{{ $p->tujuan->nama }}</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  {{ $p->judul }}
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->
          @empty
            <h3 class="text-center">Belum ada pengaduan</h3>
          @endforelse
            



          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->



    <!-- ======= F.A.Q Section ======= -->
    <section id="faq" class="faq section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>F.A.Q</h2>
          <p>Frequently Asked Questions</p>
        </div>

        <div class="faq-list">
          <ul>
            <li data-aos="fade-up">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-1">Apa itu APPELA ?<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                <p>
                  APPELA merupakan singkatan dari Aplikasi Pengaduan Layanan. APPELA adalah sarana kepada civitas akademik Universitas Negeri Manado untuk menampung pengaduan terhadap layanan yang disediakan oleh Pusat Komputer.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="100">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-2" class="collapsed">Kenapa tersedia tujuan pengaduan Ijazah dan Slip ? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Karena untuk validasi suatu berkas seperti ijazah dan slip, mahasiswa harus datang langsung ke Pusat Komputer. APPELA sudah memfasilitasi hal tersebut, sekarang mahasiswa bisa melaporkan kapan saja jika mempunyai pengaduan yang bersifat pribadi seperti ijazah dan sliip tanpa harus ke lokasi 
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="200">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-3" class="collapsed">Bagaimana cara membuat pengaduan? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Anda bisa mengikuti petunjuk yang sudah dijelaskan sebelum membuat pengaduan <a href="{{ route('pengaduan.index') }}" class="d-inline-block px-0">disini</a>
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="300">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-4" class="collapsed">Apakah saya bisa mengubah pengaduan yang saya kirimkan ? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-4" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Tidak. Pengaduan yang sudah dikirimkan tidak bisa diubah.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="400">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-5" class="collapsed">Apakah ada format email ? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-5" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Ya. Email digunakan untuk membuat pengaduan di APPELA harus email unima. Contoh '18210152@unima.ac.id' 
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="500">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-6" class="collapsed">Berapa lama respon terhadap pengaduan ? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-6" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Kecepatan respon tergantung dari banyaknya pengaduan yang masuk. Jika pengaduan sudah direspon oleh petugas, maka akan ada di notifikasi email yang kalian tambahkan pada saat membuat pengaduan.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="600">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-7" class="collapsed">Apakah proses pengaduan itu transparan  ? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-7" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Ya. Dengan memasukkan kode pengaduan anda bisa langsung mengecek proses pengaduan anda sekarang statusnya apa dan diproses oleh petugas siapa  
                </p>
              </div>
            </li>

          </ul>
        </div>

      </div>
    </section><!-- End F.A.Q Section -->


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="footer-info">
              <h3>APPELA Puskom</h3>
              <p class="pb-3"><em>Jln. Kampus Unima, Kelurahan Tonsaru, Kecamatan Tondano Selatan</em></p>
              <p>
                Jam Kerja <br>
                Senin-Jumat <br>
                8.30 - 18.30 WITA<br><br>
                
                <strong>Email:</strong> puskom@unima.ac.id<br>
              </p>
         
            </div>
          </div>

          <div class="col-lg-4 col-md-6 footer-links">
            <h4>Link Berguna</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#hero">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#about">Tentang</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#counts">Daftar Pengaduan</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#latest">Pengaduan Terakhir</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#faq">F.A.Q</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-links">
            <h4>Layanan Pusat Komputer</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="https://puskom.unima.ac.id/" target="_blank">Pusat Komputer</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="https://unima.ac.id/" target="_blank">Website UNIMA</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="http://si.unima.ac.id/" target="_blank">Sistem Informasi Akademik</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="http://bapksi.unima.ac.id/bank_data/" target="_blank">Bank Data UNIMA</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="https://akademik.unima.ac.id/simortu/login" target="_blank">SIMORTU</a></li>
            </ul>
          </div>

          <!--<div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          -->

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Bootslander</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bootslander-free-bootstrap-landing-page-template/ -->
        Maintened by <a href="https://puskom.unima.ac.id/">Pusat Komputer,</a> Universitas Negeri Manado
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="/templates/visitor/homepage/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="/templates/visitor/homepage/assets/vendor/aos/aos.js"></script>
  <script src="/templates/visitor/homepage/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/templates/visitor/homepage/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="/templates/visitor/homepage/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="/templates/visitor/homepage/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="/templates/visitor/homepage/assets/js/main.js"></script>


  <!-- ====================== Chart Section ===================== -->
        <!-- High Chart JS -->
      <script src="https://code.highcharts.com/highcharts.js"></script>

      <!-- Highchart all pengaduan -->
      <script>
              // Radialize the colors
          Highcharts.setOptions({
              colors: Highcharts.map(Highcharts.getOptions().colors, function (color) {
                  return {
                      radialGradient: {
                          cx: 0.5,
                          cy: 0.3,
                          r: 0.7
                      },
                      stops: [
                          [0, color],
                          [1, Highcharts.color(color).brighten(-0.3).get('rgb')] // darken
                      ]
                  };
              })
          });

          // Build the chart
          Highcharts.chart('chart_all', {
              chart: {
                  plotBackgroundColor: null,
                  plotBorderWidth: null,
                  plotShadow: false,
                  type: 'pie'
              },
              title: {
                  text: 'Total Pengaduan di Appela Puskom'
              },
              tooltip: {
                  pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
              },
              accessibility: {
                  point: {
                      valueSuffix: '%'
                      
                  }
              },
              plotOptions: {
                  pie: {
                      allowPointSelect: true,
                      cursor: 'pointer',
                      dataLabels: {
                          enabled: true,
                          format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                          connectorColor: 'silver'
                      }
                  }
              },
              series: [{
                  name: 'Total Pengaduan',
                  data: [
                      { name: 'Jaringan', y: {{ $jaringan }} },
                      { name: 'Server', y: {{ $server }} },
                      { name: 'Sistem Informasi', y: {{ $si }} },
                      { name: 'Website Unima', y: {{ $web_unima }} },
                      { name: 'Learning Management System', y: {{ $lms }} },
                      { name: 'Ijazah', y: {{ $ijazah }} },
                      { name: 'Slip', y: {{ $slip }} },
                  ]
              }]
          });
      </script>


          <!--  Script status dan pengaduan bulan --> 
          <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
      

      <!-- Canvas js Chart Container status bulan ini-->
      <script>
          window.onload = function () {
            
          var chart = new CanvasJS.Chart("status", {
              animationEnabled: true,
              theme: "light2", // "light1", "light2", "dark1", "dark2"
              title: {
                  text: "Status Bulan ini"
              },
              axisY: {
                  title: "Total"
              },
              data: [{
                  type: "column",
                  dataPoints: <?php echo json_encode($dataPoints_status, JSON_NUMERIC_CHECK); ?>
              }]
          });
          chart.render();
            
          }
          </script>
    

          <!-- Highchart pengaduan  -->
          <script>
              Highcharts.chart('pengaduan', {
          chart: {
              type: 'column'
          },
          title: {
              text: '<b>Pengaduan bulan ini</b>'
          },
          subtitle: {
              text: 'appela puskom'
          },
          xAxis: {
              categories: [
                  'Jaringan',
                  'Server',
                  'Sistem Informasi',
                  'Website Unima',
                  'Learning Management System',
                  'Ijazah',
                  'Slip',
              ],
              crosshair: true
          },
          yAxis: {
              min: 0,
              title: {
                  text: 'Total'
              }
          },
          tooltip: {
              headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
              pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                  '<td style="padding:0"><b>{point.y:.0f} </b></td></tr>',
              footerFormat: '</table>',
              shared: true,
              useHTML: true
          },
          plotOptions: {
              column: {
                  pointPadding: 0.2,
                  borderWidth: 0
              }
          },
          series: [{
              name: 'Tujuan Pengaduan',
              data: [
                  {{ $current_jaringan }},
                  {{ $current_server }},
                  {{ $current_si }},
                  {{ $current_webunima }},
                  {{ $current_lms }},
                  {{ $current_ijazah }},
                  {{ $current_slip }},
              ]

          },]
      });
          
      </script>
</body>

</html>