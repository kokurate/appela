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
              <li class="nav-item">
                <a class="nav-link" href="#">Pricing</a>
              </li>
             
            </ul>
          </div>
        </div>
      </nav>

    <div class="container my-5 ">
        <h3 class="text-center mb-3">Ini halaman {{ $title }}</h3>

        <div class="row justify-content-center">

          {{-- Flash Message --}}
          @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
          {{ session('success') }}
            </div>
          @endif

            <div class="col-md-6">
                <form action="/pengaduan/search" method="GET ">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Masukkan Kode Pengaduan" name="kode" value="{{ request('kode') }}" autofocus autocomplete="off">
                        <button class="btn btn-danger" type="submit" >Search</button>
                    </div>
                </form>
            </div>
        </div>

       
          {{-- Kalau search[kode] === kode tampilkan datanya --}}
          @if ($kode->count())
                        <table class="table table-hover">
                        <tr>
                            <th>#</th>
                            <th>judul</th>
                            <th>kode</th>
                            <th>Detail</th>
                        </tr>
                    @foreach ($kode as $k )
                        <tr>
                            <th scope="row">{{ ++$i }}</th>
                            <td>{{ $k->judul }}</td>
                            <td>{{ $k->kode }}</td>
                            <td><a href="/pengaduan/detail/{{ $k->kode }}">detail</a></td>
                        </tr>
                    @endforeach
                        </table>
                    
             {{-- Kalau tidak sama tampilkan ini --}}
             @else 
             <p class="text-center fs-4">Tidak ada pengaduan</p>
             
            @endif
     
            {{-- misalnya 2 = 34-5-67 --}}
           <div class="d-flex justify-content-center">
               {{ $kode->onEachSide(2)->links() }}
           </div>
  
    </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </body>
    </html>
