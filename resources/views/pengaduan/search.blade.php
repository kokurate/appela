@extends('pengaduan.layouts.master')
@section('content')
    <div class="container my-5 ">
        <h3 class="text-center mb-3">Cari Pengaduan</h3>

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
                        <button class="btn btn-primary" type="submit" >Search</button>
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
@endsection

  
