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

        <div class="container my-5">

          {{-- Flash Message --}}
          @if(session()->has('success'))
          <div class="alert alert-success" role="alert">
        {{ session('success') }}
          </div>
        @endif


          <h3 class="my-5">Ini halaman  {{ $title }}</h3>
          <div style="max-height:350px overflow:hidden;">
              <img src="{{ asset('storage/'. $pengaduan->visitor_image_1) }}" class="img-thumbnail" alt="..." width="250px">
              <img src="{{ asset('storage/'. $pengaduan->visitor_image_2) }}" class="img-thumbnail" alt="..." width="250px" onerror="this.style.display='none'">
              <img src="{{ asset('storage/'. $pengaduan->visitor_image_3) }}" class="img-thumbnail" alt="..." width="250px" onerror="this.style.display='none'">
            </div>
       
            {{-- Modal --}}
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" id="modal">
                Launch demo modal
              </button>


          <p class="btn btn-primary">{{ $pengaduan->status }}</p>
          <p class="btn btn-primary">{{ $pengaduan->keterangan }}</p>

          @if($pengaduan->status == 'Pengaduan Sedang Diverifikasi') 
          <a href="{{ route('admin.jaringan.update', $pengaduan->kode) }}">Update</a>
          @elseif($pengaduan->status == 'Pengaduan Sedang Diproses')
          <a href="{{ route('admin.jaringan.proses', $pengaduan->kode) }}">Proses</a>
          @endif

         <h6>{{ $pengaduan->nama }}</h6>
         <h6>{{ $pengaduan->tujuan->nama }}</h6>
         <h6>{{ $pengaduan->kode }}</h6>
         <h5>{{ $pengaduan->judul }}</h5>
 
         {{-- Nyanda pake escaping HTML Specialchars --}}
         {!! $pengaduan->isi !!}
         <br>



         <a href="{{ route('admin.jaringan.index') }}">back to cari</a>
        </div>


          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form class="mt-5" method="post" action="/admin/tujuan/{{ $pengaduan->kode }}">
                    @csrf

                    <div class="col-5">
                        @error('tujuan_id')
                        <div class="alert alert-danger" role="alert">
                        {{ $message }}
                        </div>
                        @enderror
                        
                        @foreach ($tujuan as $tujuan)
                            {{-- tujuan(all) tidak sama dengan tujuan->nama skrng, tampilkan selain yang bukan--}}
                            @if ($tujuan->nama != $pengaduan->tujuan->nama )
                                {{-- {{ $tujuan->nama }} --}}
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tujuan_id" id="{{ $tujuan->nama }}" value="{{ $tujuan->id }}">
                                    <label class="form-check-label" for="{{ $tujuan->nama }}">
                                      {{ $tujuan->nama }}
                                    </label>
                                  </div>
                            @endif
                        @endforeach
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
          </div>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

      @if (count($errors) > 0)
        <script type="text/javascript">
              $('#modal').modal('#exampleModal');
        </script>
      @endif

    </body>
    </html>