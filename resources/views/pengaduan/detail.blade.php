<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="/logo.jpg">
    <link rel="icon" type="image/png" href="/logo.jpg">
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- Nucleo Icons -->
    <link href="/templates/visitor/detail/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="/templates/visitor/detail/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <link href="/templates/visitor/detail/assets/css/font-awesome.css" rel="stylesheet" />
    <link href="/templates/visitor/detail/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="/templates/visitor/detail/assets/css/argon-design-system.css?v=1.2.2" rel="stylesheet" />


    <!-- Bootstrap CSS -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
    <!-- Rating CSS and js -->
    <script src="https://kit.fontawesome.com/aa3eec1cb8.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/rating.css">

    <title>{{ $title }}</title>
  </head>
  <body>
    <!-- Include Sweetalert -->
    @include('sweetalert::alert')

        <!-- Navbar -->
        <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg bg-white navbar-light position-sticky top-0 shadow py-2">
          <div class="container">
              <a class="navbar-brand mr-lg-5" href="/">
                  <img src="/logo.jpg">
                  APPELA Puskom
              </a>

              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
              </button>
              <div class="navbar-collapse collapse" id="navbar_global">
                  <div class="navbar-collapse-header">
                      <div class="row">
                          <div class="col-6 collapse-brand">
                              <a href="/">
                                  <img src="logo.jpg">
                                  APPELA Puskom
                              </a>
                          </div>
                          <div class="col-6 collapse-close">
                              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                                  <span></span>
                                  <span></span>
                              </button>
                          </div>
                      </div>
                  </div>

                  <ul class="navbar-nav align-items-lg-center ml-lg-auto">
                      <li class="nav-item">
                          <a class="btn btn-outline-primary" href="/">
                              <span class="nav-link-inner--text">Home</span>
                          </a>
                      </li>
                      <br>

                      <li class="nav-item">
                          <a href="{{ route('pengaduan.index') }}" class="btn btn-primary btn-icon">
                              <span class="btn-inner--icon">
                                  <i class="fa fa-add"></i>
                              </span>
                              <span class="nav-link-inner--text">Pengaduan</span>
                          </a>
                      </li>
                  </ul>
              </div>
          </div>
      </nav>
      <!-- End Navbar -->

       {{-- Flash Message --}}
       @if(session()->has('success'))
       <div class="alert alert-success" role="alert">
     {{ session('success') }}
       </div>
     @endif

  <div class="container mt-3">
    <h2>{{ $title }}</h2>
    <div class="d-inline">
        <p class="card-text btn btn-outline-default">Status : <strong>{{ $pengaduan->status }}</strong></p>
        <p class="card-text btn btn-warning">Tujuan : <strong>{{ $pengaduan->tujuan->nama }}</strong></p>
        <br>
        <a href="{{ route('pengaduan.search') }}" class="btn btn-outline-primary mb-2" style="width: 75px;"><i class="fa fa-arrow-left"></i></a>
    </div>
  </div>

  <!-- Tabs Section -->
  <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6">

          <!-- Data Pengaduan  Section-->
          <div class="my-3">
            <h5 class="text-uppercase text-default font-weight-bold">Data Pengaduan</h5>
          </div>
          <div class="nav-wrapper">
            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
              <li class="nav-item">
                <a class="nav-link mb-sm-3 mb-md-0 active" 
                id="tabs-icons-text-1-tab" 
                data-toggle="tab" 
                href="#tabs-icons-text-1" 
                role="tab" 
                aria-controls="tabs-icons-text-1" 
                aria-selected="true"><i class="fa fa-book mr-2"></i>Isi Pengaduan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link mb-sm-3 mb-md-0" 
                id="tabs-icons-text-2-tab"
                data-toggle="tab" 
                href="#tabs-icons-text-2" 
                role="tab" 
                aria-controls="tabs-icons-text-2" 
                aria-selected="false"><i class="fa fa-picture-o mr-2"></i>Foto</a>
              </li>
              <li class="nav-item">
                <a class="nav-link mb-sm-3 mb-md-0" 
                id="tabs-icons-text-3-tab" 
                data-toggle="tab" 
                href="#tabs-icons-text-3" 
                role="tab" 
                aria-controls="tabs-icons-text-3" 
                aria-selected="false"><i class="fa fa-info mr-2"></i>Keterangan</a>
              </li>
            </ul>
          </div> <!-- Nav-wrapper -->

          <div class="card shadow">
            <div class="card-body">
              <div class="tab-content" id="myTabContent">
                <!-- Isi Tab 1-->
                <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                  Pengaduan dibuat : <b style="color: rgb(255, 0, 0);">{{ $pengaduan->published_at }}</b>
                  <hr class="my-2">
                  <div class="description">
                    {!! $pengaduan->isi !!}
                  </div>
                </div>
                <!-- Isi Tab 2 -->
                <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                  <div style="max-height:350px  overflow:hidden;" class="text-center col mb-2" style="margin: auto;">
                    <img src="{{ asset('storage/'. $pengaduan->visitor_image_1) }}" class="rounded my-1" alt="visitor image 1" width="250px">
                    <img src="{{ asset('storage/'. $pengaduan->visitor_image_2) }}" class="rounded my-1" alt="visitor image 2" width="250px" onerror="this.style.display='none'">
                    <img src="{{ asset('storage/'. $pengaduan->visitor_image_3) }}" class="rounded my-1" alt="visitor image 3" width="250px" onerror="this.style.display='none'">
                  </div>
                </div>
                <!-- Isi tab 3 -->
                <div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel" aria-labelledby="tabs-icons-text-3-tab">
                  <form action="{{ route('pengaduan.detail.store', $pengaduan->kode) }}"  id="addStar" method="post" class="form-horizontal poststars">
                    @csrf
                    @if($pengaduan->rating == NULL)
                      <h5>Tambah rating</h5>
                        <div class="form-group required card">
                          <div class="col-sm-12 d-block">
                            <input class="star star-5" value="5" id="star-5" type="radio" name="rating"/>
                            <label class="star star-5" for="star-5"></label>
                            <input class="star star-4" value="4" id="star-4" type="radio" name="rating"/>
                            <label class="star star-4" for="star-4"></label>
                            <input class="star star-3" value="3" id="star-3" type="radio" name="rating"/>
                            <label class="star star-3" for="star-3"></label>
                            <input class="star star-2" value="2" id="star-2" type="radio" name="rating"/>
                            <label class="star star-2" for="star-2"></label>
                            <input class="star star-1" value="1" id="star-1" type="radio" name="rating"/>
                            <label class="star star-1" for="star-1"></label>
                          </div>
                        </div>
                        @error('rating')
                        <br><br><br>
                        <div class="col-sm-12 d-flex text-left">
                          <p class="description" style="color: rgb(255, 0, 0)"> {{ $message }}</p>
                        </div>
                        @enderror
                        <div class=" d-block mt-2" style="width: 75%">
                          <label for="exampleFormControlTextarea1" class="form-label">Tanggapan kepada petugas</label>
                          <textarea class="form-control @error('komentar') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3" name="komentar"  value="{{ old('komentar') }}"></textarea>
                        </div>
                        <div class="d-block float-left mt-3">
                              <button type="submit" class="btn btn-primary">Tambah Rating</button>
                        </div>
                      </form>
                      @else
                        <i class="fa fa-star text-warning"></i> {{ $pengaduan->rating }}
                        <p class="text-default" style="margin-bottom: -2px">Komentar</p>
                        <hr style="margin: 0">
                        <p class="description">{{ $pengaduan->komentar }}</p>
                      @endif
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-6 mt-5 mt-lg-0">
          <!-- Petugas Section -->
          <div class="my-3">
            <h5 class="text-uppercase text-default font-weight-bold">Petugas</h5>
          </div>
          <div class="nav-wrapper">
            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-text" role="tablist">
              <li class="nav-item">
                <a class="nav-link mb-sm-3 mb-md-0 active" 
                id="tabs-text-1-tab" 
                data-toggle="tab" 
                href="#tabs-text-1" 
                role="tab" 
                aria-controls="tabs-text-1" 
                aria-selected="true"><i class="fa fa-pencil mr-2"></i>Tanggapan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link mb-sm-3 mb-md-0" 
                id="tabs-text-2-tab" 
                data-toggle="tab" 
                href="#tabs-text-2" 
                role="tab" 
                aria-controls="tabs-text-2" 
                aria-selected="false"><i class="fa fa-file-image-o mr-2"></i>Foto</a>
              </li>
              <li class="nav-item">
                <a class="nav-link mb-sm-3 mb-md-0" 
                id="tabs-text-3-tab" 
                data-toggle="tab" 
                href="#tabs-text-3" 
                role="tab" 
                aria-controls="tabs-text-3" 
                aria-selected="false">Activity Log</a>
              </li>
            </ul>
          </div>
          <div class="card shadow">
            <div class="card-body">
              <div class="tab-content" id="myTabContent">
                <!-- Isi Tab 1 -->
                <div class="tab-pane fade show active" id="tabs-text-1" role="tabpanel" aria-labelledby="tabs-text-1-tab">
                  Pengaduan diupdate : <b style="color: rgb(255, 0, 0);">{{ $pengaduan->updated_at }}</b>
                  <hr class="my-2">
                   <p class="description">{{ $pengaduan->keterangan }}</p>
                </div>
                <!-- Isi Tab 2 -->
                <div class="tab-pane fade" id="tabs-text-2" role="tabpanel" aria-labelledby="tabs-text-2-tab">
                  <div style="max-height:350px  overflow:hidden;" class="text-center col mb-2" style="margin: auto;">
                    @if($pengaduan->petugas_image_1 == NULL)
                      <p> Petugas Tidak Mengupload Image</p>
                    @endif
                    <img src="{{ asset('storage/'. $pengaduan->petugas_image_1) }}" class="rounded my-1" alt="petugas image 1" width="250px" onerror="this.style.display='none'">
                    <img src="{{ asset('storage/'. $pengaduan->petugas_image_2) }}" class="rounded my-1" alt="petugas image 2" width="250px" onerror="this.style.display='none'">
                    <img src="{{ asset('storage/'. $pengaduan->petugas_image_3) }}" class="rounded my-1" alt="petugas image 3" width="250px" onerror="this.style.display='none'">
                  </div>
                </div>
                <!-- Isi Tab 3 -->
                <div class="tab-pane fade" id="tabs-text-3" role="tabpanel" aria-labelledby="tabs-text-3-tab">
                  <p class="description">
                    @foreach ($log as $activity)
                    <span style="color: rgb(23, 114, 23)">{{ $activity->opener }}</span>
                    {{ $activity->user }}
                    {{ $activity->do }} <br>
                    @endforeach
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> <!-- Justify Content Center -->
  </div> <!-- Container -->
  <br> <br> <br> <br> <br>
  
  

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></s>
      //  <script src="/js/rating.js">
      </script> 

{{-- rating --}}
    <script>
      $('#addStar').change('.star', function(e) {
      $(this).submit();
      });
    </script>

    <!-- JS Argon-->
      <!--   Core JS Files   -->
    <script src="/templates/visitor/detail/assets/js/core/jquery.min.js" type="text/javascript"></script>
    <script src="/templates/visitor/detail/assets/js/core/popper.min.js" type="text/javascript"></script>
    <script src="/templates/visitor/detail/assets/js/core/bootstrap.min.js" type="text/javascript"></script>
    <script src="/templates/visitor/detail/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
    <script src="/templates/visitor/detail/assets/js/plugins/bootstrap-switch.js"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="/templates/visitor/detail/assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
    <script src="/templates/visitor/detail/assets/js/plugins/moment.min.js"></script>
    <script src="/templates/visitor/detail/assets/js/plugins/datetimepicker.js" type="text/javascript"></script>
    <script src="/templates/visitor/detail/assets/js/plugins/bootstrap-datepicker.min.js"></script>
    <!-- Control Center for Argon UI Kit: parallax effects, scripts for the example pages etc -->
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <script src="/templates/visitor/detail/assets/js/argon-design-system.min.js?v=1.2.2" type="text/javascript"></script>
    <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
    <script>
      window.TrackJS &&
        TrackJS.install({
          token: "ee6fab19c5a04ac1a32a645abde4613a",
          application: "argon-design-system-pro"
        });
    </script>
  </body>
</html>