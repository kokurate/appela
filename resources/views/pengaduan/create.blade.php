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
            </ul>
          </div>
        </div>
      </nav>

    <div class="container my-5">
        <h3>Ini halaman {{ $title }}</h3>

      <div class="col-lg-8">
        <form method="post" action="{{ $token }}" enctype="multipart/form-data">
           {{-- Using enctype so this form can handle file --}}
          @csrf
          {{-- <input type="hidden" name="kode" value="{{ Str::random(10) }}">
          <input type="hidden" name="status" value="Pengaduan Sedang Diverifikasi"> --}}
          {{-- email --}}
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="Email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required autofocus value="{{ $pengaduan->email }}" disabled>
              @error('email')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div> 
          {{-- nama --}}
                <div class="mb-3">
                  <label for="nama" class="form-label">Nama</label>
                  <input type="text" class="form-control  @error('nama') is-invalid @enderror" id="nama" name="nama" required  value="{{ old('nama') }}">
                  @error('nama')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div> 
          {{-- Judul --}}
            <div class="mb-3">
              <label for="judul" class="form-label">Judul</label>
              <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" required  value="{{ old('judul') }}" >
              @error('judul')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div> 
                 {{-- Tujuan --}}
            <div class="mb-3">
              <label for="tujuan" class="form-label">Tujuan Pengaduan</label>
              <select class="form-select" name="tujuan_id" >
                <option selected>Pilih Tujuan Pengaduan Anda</option>
              @foreach ($tujuan as $t)
              {{-- Jika old tujuan_id sama dengan request tujuan_id sebelumnya maka option kasih selected --}}
                @if(old('tujuan_id') == $t->id)
                <option value="{{ $t->id }}" selected>{{ $t->nama }}</option>
                @else
                {{-- Jika tidak sama maka cetak tanpa selected --}}
                <option value="{{ $t->id }}" >{{ $t->nama }}</option>
                @endif
              @endforeach
              </select>
              @error('tujuan_id')
              <p class="text-danger">Pilih Tujuan Pengaduan</p>
                @enderror
            </div>  

            {{-- Upload Image  1--}}
            <div class="mb-3">
                <label for="visitor_image_1" class="form-label" >Pengaduan Image</label>
                {{-- Deklarasi Javascript untuk preview --}}
                <img class="img-preview-visitor-1 img-fluid mb-3 col-sm-3">
                <input class="form-control @error('visitor_image_1') is-invalid @enderror" type="file" id="visitor_image_1" name="visitor_image_1" onchange="previewVisitor_image_1();">
                @error('visitor_image_1')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
            </div>

            {{-- Upload Image 2 --}}
            <div class="mb-3">
                <label for="visitor_image_2" class="form-label" >Image 2</label>
                {{-- Deklarasi Javascript untuk preview --}}
                <img class="img-preview-visitor-2 img-fluid mb-3 col-sm-3">
                <input class="form-control @error('visitor_image_2') is-invalid @enderror" type="file" id="visitor_image_2" name="visitor_image_2" onchange="previewVisitor_image_2();">
                @error('visitor_image_2')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
            </div>

            {{-- Upload Image 3 --}}
            <div class="mb-3">
                <label for="visitor_image_3" class="form-label" >Image 3</label>
                {{-- Deklarasi Javascript untuk preview --}}
                <img class="img-preview-visitor-3 img-fluid mb-3 col-sm-3">
                <input class="form-control @error('visitor_image_3') is-invalid @enderror" type="file" id="visitor_image_3" name="visitor_image_3" onchange="previewVisitor_image_3();">
                @error('visitor_image_3')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
            </div>

               {{-- Isi --}}
               <div class="mb-3">
                <label for="isi" class="form-label">isi</label>
                @error('isi')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
                <input id="isi" type="hidden" name="isi" value="{{ old('isi') }}">
                <trix-editor input="isi"></trix-editor>
              </div>  
              
      
       
          <button type="submit" class="btn btn-primary">Buat Pengaduan</button>
        </form>
      </div>



      <br><br><br>

    </div> 
    {{-- End Container --}}
    {{-- Footer --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        {{-- Menghilangkan fungsi dari attach file pada trix editor --}}
    <script>
        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault()
        })

        // Preview Image 1
            function previewVisitor_image_1(){
                const image = document.querySelector('#visitor_image_1');
                const imgPreview = document.querySelector('.img-preview-visitor-1');

                imgPreview.style.display = 'block';

                const oFReader = new FileReader();
                oFReader.readAsDataURL(image.files[0]);

                oFReader.onload = function(oFREvent){
                    imgPreview.src = oFREvent.target.result;
                }
            }

        // Preview Image 2
            function previewVisitor_image_2(){
                const image = document.querySelector('#visitor_image_2');
                const imgPreview = document.querySelector('.img-preview-visitor-2');

                imgPreview.style.display = 'block';

                const oFReader = new FileReader();
                oFReader.readAsDataURL(image.files[0]);

                oFReader.onload = function(oFREvent){
                    imgPreview.src = oFREvent.target.result;
                }
            }

        // Preview Image 3
            function previewVisitor_image_3(){
                const image = document.querySelector('#visitor_image_3');
                const imgPreview = document.querySelector('.img-preview-visitor-3');

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
