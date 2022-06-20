<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

   {{-- Trix Editor --}}
   <link rel="stylesheet" type="text/css" href="/css/trix.css">
   <script type="text/javascript" src="/js/trix.js"></script> 
   {{-- Menghilangkan CSS Attach File Pada Trix Editor --}}
   <style>
     trix-toolbar [data-trix-button-group="file-tools"]{
       display: none;
     }
   </style>

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
            <form method="post" action="{{ route('admin.jaringan.proses.store', $pengaduan->kode) }}" enctype="multipart/form-data">
                {{-- Using enctype so this form can handle file --}}
               @csrf
               
                     {{-- keterangan --}}
                     <div class="mb-3 mt-3">
                        <label for="keterangan" class="form-label">keterangan</label>
                        @error('keterangan')
                          <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <input id="keterangan" type="hidden" name="keterangan" value="{{ old('keterangan') }}">
                        <trix-editor input="keterangan"></trix-editor>
                      </div>  
     
                      {{-- Klik ini baru mo muncul yang upload image input --}}
                      <button> Add Image 1</button>
                      <button> Add Image 2 </button>
                      <button> Add Image 2 </button>

                        {{-- Upload Image  1--}}
                        <div class="mb-3">
                            <label for="petugas_image_1" class="form-label" >Upload Image</label>
                            {{-- Deklarasi Javascript untuk preview --}}
                            <img class="img-preview-petugas-1 img-fluid mb-3 col-sm-3">
                            <input class="form-control @error('petugas_image_1') is-invalid @enderror" type="file" id="petugas_image_1" name="petugas_image_1" onchange="previewPetugas_image_1();">
                            @error('petugas_image_1')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                            @enderror
                        </div>
     
                 {{-- Upload Image 2 --}}
                 <div class="mb-3">
                     <label for="petugas_image_2" class="form-label" >Image 2</label>
                     {{-- Deklarasi Javascript untuk preview --}}
                     <img class="img-preview-petugas-2 img-fluid mb-3 col-sm-3">
                     <input class="form-control @error('petugas_image_2') is-invalid @enderror" type="file" id="petugas_image_2" name="petugas_image_2" onchange="previewPetugas_image_2();">
                     @error('petugas_image_2')
                     <div class="invalid-feedback">
                       {{ $message }}
                     </div>
                     @enderror
                 </div>
     
                 {{-- Upload Image 3 --}}
                 <div class="mb-3">
                     <label for="petugas_image_3" class="form-label" >Image 3</label>
                     {{-- Deklarasi Javascript untuk preview --}}
                     <img class="img-preview-petugas-3 img-fluid mb-3 col-sm-3">
                     <input class="form-control @error('petugas_image_3') is-invalid @enderror" type="file" id="petugas_image_3" name="petugas_image_3" onchange="previewPetugas_image_3();">
                     @error('petugas_image_3')
                     <div class="invalid-feedback">
                       {{ $message }}
                     </div>
                     @enderror
                 </div>
     
              
                   
           
            
               <button type="submit" class="btn btn-primary">Buat Pengaduan</button>
             </form>

          <hr>

        </div>

    </div> 
    {{-- End Row  --}}

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

       {{-- Menghilangkan fungsi dari attach file pada trix editor --}}
    <script>
        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault()
        })

        // Preview Image 1
            function previewPetugas_image_1(){
                const image = document.querySelector('#petugas_image_1');
                const imgPreview = document.querySelector('.img-preview-petugas-1');

                imgPreview.style.display = 'block';

                const oFReader = new FileReader();
                oFReader.readAsDataURL(image.files[0]);

                oFReader.onload = function(oFREvent){
                    imgPreview.src = oFREvent.target.result;
                }
            }

        // Preview Image 2
            function previewPetugas_image_2(){
                const image = document.querySelector('#petugas_image_2');
                const imgPreview = document.querySelector('.img-preview-petugas-2');

                imgPreview.style.display = 'block';

                const oFReader = new FileReader();
                oFReader.readAsDataURL(image.files[0]);

                oFReader.onload = function(oFREvent){
                    imgPreview.src = oFREvent.target.result;
                }
            }

        // Preview Image 3
            function previewPetugas_image_3(){
                const image = document.querySelector('#petugas_image_3');
                const imgPreview = document.querySelector('.img-preview-petugas-3');

                imgPreview.style.display = 'block';

                const oFReader = new FileReader();
                oFReader.readAsDataURL(image.files[0]);

                oFReader.onload = function(oFREvent){
                    imgPreview.src = oFREvent.target.result;
                }
            }
          


    </script>

    </body>
    </html>