
<h1>Ini halaman jaringan setelah login</h1>

<p>{{ auth()->user()->level }}</p>


{{-- <p>{{ auth()->user()->level = 'ADMIN'}}</p> --}}

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

                {{-- Log Out --}}
                <ul class="navbar-nav ms-auto">

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
            </ul>
          </div>
        </div>
      </nav>

        <div class="container my-5">
        <h3 class="my-5">Ini halaman  {{ $title }}</h3>
    

        <h4> Only Pengaduan jaringan</h4>
        <br>
      {{-- Flash Message --}}
          @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
          {{ session('success') }}
            </div>
          @endif


      

            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Status</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
            @foreach ($pengaduan as $pengaduanjaringan)

              <tbody>
                <tr>
                  <th scope="row">{{ ++$i }}</th>
                  <td>{{ $pengaduanjaringan->nama }}</td>
                  <td>{{ $pengaduanjaringan->status }}</td>
                  <td></td>
                </tr>
              </tbody>
            @endforeach
            </table>
                <div class="d-flex justify-content-center">
                  {{ $pengaduan->onEachSide(2)->links() }}
                </div>
        </div>





        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </body>
    </html>