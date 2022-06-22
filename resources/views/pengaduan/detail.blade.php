<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    {{-- Rating CSS and js --}}
    <script src="https://kit.fontawesome.com/aa3eec1cb8.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/rating.css">

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
              <li class="nav-item">
                <a class="nav-link" href="#">Pricing</a>
              </li>
             
            </ul>
          </div>
        </div>
      </nav>

       {{-- Flash Message --}}
       @if(session()->has('success'))
       <div class="alert alert-success" role="alert">
     {{ session('success') }}
       </div>
     @endif

        <div class="container my-5">
          <h3 class="my-5">Ini halaman  {{ $title }}</h3>
          <div style="max-height:350px overflow:hidden;">
              <img src="{{ asset('storage/'. $pengaduan->visitor_image_1) }}" class="img-thumbnail" alt="..." width="250px">
              <img src="{{ asset('storage/'. $pengaduan->visitor_image_2) }}" class="img-thumbnail" alt="..." width="250px" onerror="this.style.display='none'">
              <img src="{{ asset('storage/'. $pengaduan->visitor_image_3) }}" class="img-thumbnail" alt="..." width="250px" onerror="this.style.display='none'">
            </div>
       

          <p class="btn btn-primary">{{ $pengaduan->status }}</p>
         <h6>{{ $pengaduan->tujuan->nama }}</h6>
         <h6>{{ $pengaduan->kode }}</h6>
         <h5>{{ $pengaduan->judul }}</h5>
 
         {{-- Nyanda pake escaping HTML Specialchars --}}
         {!! $pengaduan->isi !!}
         <br>

         @foreach ($log as $activity)
            {{ $activity->do }} <br>
         @endforeach

    {{-- rating --}}

    <form action="{{ route('pengaduan.detail.store', $pengaduan->kode) }}"  id="addStar" method="post" class="form-horizontal poststars">
      @csrf
  
      <h5>Tambah rating</h5>
        <div class="form-group required ">
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
<br>
<br>
<br>
@error('rating')
<p class="btn btn-danger"> {{ $message }}</p>
@enderror
        <div class=" d-block" style="width: 30%">
          <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="komentar"></textarea>
        </div>

        <br>
        <br>
        <br>
          <div class="col-sm-12">
              <button type="submit" class="btn btn-primary">Buat Rating</button>
              <button type="submit" class="btn btn-primary">Buat Rating</button>
          </div>
      </form>
            
<br>
<br>
<br>
         <a href="{{ route('pengaduan.search') }}">back to cari</a>
        </div>





        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></s>
      //  <script src="/js/rating.js"></script> 

    


{{-- rating --}}
    <script>
      $('#addStar').change('.star', function(e) {
      $(this).submit();
      });
    </script>

    </body>
    </html>