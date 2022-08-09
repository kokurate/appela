@extends('_layouts.master')

@section('content')

<div class="container-fluid py-4">
      <!-- Back -->
    <a href="{{ route('admin.index') }}">
        <div class="btn btn-light">
            <i class="ni ni-bold-left"></i>
        </div>
    </a>

     <!-- Card Section --> 
     <div class="row my-2">
        <!--  Selesai -->
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Selesai</p>
                                <h5 class="font-weight-bolder">{{ $selesai }}</h5>
                                <p class="mb-0">
                                <!-- <strong>Jaringan</strong> -->
                                </p>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                <i class="fa fa-solid fa-check text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ditolak -->
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Ditolak</p>
                                <h5 class="font-weight-bolder">{{ $ditolak }}</h5>
                                <p class="mb-0">
                                <!-- <strong>Server</strong> -->
                                </p>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                <i class="fa fa-remove text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Dengan Rating -->
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Dengan Rating</p>
                                <h5 class="font-weight-bolder">{{ $rating }}</h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                <i class="fa fa-star text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="row">
                            <div class="numbers">
                                <p class="mb-0">
                                <!-- <strong>Sistem Informasi</strong> -->
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Row  Card Section-->  

    <div class="row my-2">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Semua Pengaduan : {{ $semua }}</h6>
                    <div class="col-md-6">
                        <form action="{{ route('admin.section.semua') }}">                                
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="search" value="{{ request('search') }}" placeholder="Cari" aria-describedby="button-addon2">
                                <button class="btn btn-outline-primary mb-0" type="submit" id="button-addon2">Cari Pengaduan</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                                @can('admin')<th class="text-secondary opacity-7"></th>@endcan
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kode</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tujuan</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">status</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">rating</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pengaduan as $p) 
                                    <tr>
                                        <td>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-xs ps-3">{{ ++$i }}</h6>
                                            </div>
                                        </td>

                                        @can('admin')
                                            <!-- Action-->
                                            <td class="align-middle">
                                                <form action="{{ route('admin.destroy', $p->id) }}" method="post" >
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="border-0 " onclick="return confirm('Yakin mau hapus data ?')">
                                                        <div class="d-flex justify-content-center badge bg-danger">
                                                            <i class="fa fa-solid fa-trash"></i>
                                                        </div>
                                                    </button>
                                                </form>
                                            </td>
                                        @endcan

                                        <!-- Kode-->
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $p->kode }}</p>
                                            </td>

                                        <!-- Nama-->
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $p->nama }}</p>
                                            </td>

                                        <!-- Email-->
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $p->used_email }}</p>
                                            </td>

                                        <!-- Tujuan -->
                                            <td class="align-middle text-center text-sm">
                                                <p class="text-xs font-weight-bold mb-0">{{ $p->tujuan->nama }}</p>
                                            </td>

                                        <!-- Status -->
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">{{ $p->status }}</span>
                                            </td>
                                        <!-- Rating-->
                                            @if($p->rating == null )
                                                <td class="align-middle text-center text-sm">
                                                    <span class="badge badge-sm bg-danger">No</span>
                                                </td>
                                            @else
                                                <td class="align-middle text-center text-sm">
                                                    <span class="badge badge-sm bg-success">Yes</span>
                                                </td>
                                            @endif

                                         <!-- Detail-->
                                         <td class="align-middle">
                                            <a href="{{ route('admin.detail', $p->kode) }}" class="text-secondary  text-xs">
                                                <i class="fa fa-solid fa-info ps-4"></i>
                                            </a>
                                        </td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center"><p class="font-weight-bold my-2">Tidak ada pengaduan </p></td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <!-- Pagination Section -->
                        <div class="d-flex justify-content-center my-3">{{ $pengaduan->onEachSide(2)->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- Row -->
</div> <!-- Container -->
@endsection