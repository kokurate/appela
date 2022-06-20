<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>

  
            <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
                <div class="container">
                <a class="navbar-brand" href="#">APPELA USER</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">detail pengaduan</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Welcome, {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Ubah Password</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item">Log Out</button>
                        </form>                
                        </ul>
                    </li>
                    
                    </ul>
                </div>
                </div>
            </nav>
     


    <div class="row justify-content-between">
            <div class="col-5 text-center">

            {{-- Flash Message --}}
            @if(session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <div class="container my-5">
            <h3 class="my-5">Ini halaman  {{ $title }}</h3>
            <div style="max-height:350px overflow:hidden;">
                <img src="{{ asset('storage/'. $pengaduan->visitor_image_1) }}" class="img-thumbnail" width="250px">
                <img src="{{ asset('storage/'. $pengaduan->visitor_image_2) }}" class="img-thumbnail" width="250px" onerror="this.style.display='none'">
                <img src="{{ asset('storage/'. $pengaduan->visitor_image_3) }}" class="img-thumbnail" width="250px" onerror="this.style.display='none'">
            </div>
        <span>Tujuan Pengaduan <strong>{{ $pengaduan->tujuan->nama }}</strong></span>
            <p class="btn btn-primary">{{ $pengaduan->status }}</p>
            <h6>{{ $pengaduan->kode }}</h6>
            <h5>{{ $pengaduan->judul }}</h5>
    
            {{-- Nyanda pake escaping HTML Specialchars --}}
            {!! $pengaduan->isi !!}
            <br>



            <a href="{{ route('admin.jaringan.detail', $pengaduan->kode) }}">back to post</a>
            </div>
    </div>

    {{-- Proses Pengaduan --}}
        <div class="col-md-6 ">
        <form class="mt-5" method="post" action="{{ route('admin.jaringan.update.store', $pengaduan->kode) }}">
            @csrf
            <div class="col-5">
                @error('status')
                <div class="alert alert-danger" role="alert">
                {{ $message }}
                </div>
                @enderror
            </div>

           
  
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="flexRadioDefault1" value="Pengaduan Sedang Diproses" onclick="show(1)"  > 
                <label class="form-check-label" for="flexRadioDefault1">
                  Proses Pengaduan
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="flexRadioDefault2" value="Pengaduan Ditolak" onclick="show(0)" {{ old('status') == 'Pengaduan Ditolak' ? 'checked' : ''}}>
                <label class="form-check-label" for="flexRadioDefault2">Tolak Pengaduan</label>
              
                {{-- Alasan --}}
                <div class="mb-3" id="show_tanggapan">
                  <label for="exampleFormControlTextarea1" class="form-label">Tanggapan</label>
                  <textarea class="form-control @error('keterangan') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3" name="keterangan"></textarea>
                  <div class="col-5">
                      @error('keterangan')
                      <div class="alert alert-danger" role="alert">
                      {{ $message }}
                      </div>
                      @enderror
                  </div>
                </div>
              </div>



            <button type="submit" class="btn btn-primary">Submit</button>
          </form>

          <hr>

        </div>

    </div> 
    {{-- End Row  --}}

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        {{-- Javascript buat show tanggapan kalo pilih Tolak --}}
        <script>
            function show(x){
                if (x==0)
                document.getElementById('show_tanggapan').style.display='block';
                else
                document.getElementById('show_tanggapan').style.display="none";
                return;
            }
        </script>

    </body>
    </html>