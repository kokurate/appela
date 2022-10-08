@extends('_layouts.master')

@section('content')

<div class="container-fluid py-4">
      <!-- Back -->
    <!-- ============================== Section Gate =============================== -->
    <a href="
    @if(Request::is('jaringan*'))
        @can('jaringan') {{ route('jaringan.index') }} @endcan
    @elseif(Request::is('server*'))
        @can('server') {{ route('server.index') }} @endcan
    @elseif(Request::is('sistem-informasi*'))
        @can('sistem_informasi') {{ route('sistem_informasi.index') }} @endcan
    @elseif(Request::is('website-unima*'))
        @can('website_unima') {{ route('website_unima.index') }} @endcan
    @elseif(Request::is('learning-management-system*'))
        @can('lms') {{ route('lms.index') }} @endcan
    @elseif(Request::is('ijazah*'))
        @can('ijazah') {{ route('ijazah.index') }} @endcan
    @elseif(Request::is('slip*'))
        @can('slip') {{ route('slip.index') }} @endcan
    @endif
    ">
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
                        <!-- ====================== Section Gate ============================ -->
                        <form action="
                        @if(Request::is('jaringan*'))
                            @can('jaringan') {{ route('jaringan.section.semua') }} @endcan
                        @elseif(Request::is('server*'))
                            @can('server') {{ route('server.section.semua') }} @endcan
                        @elseif(Request::is('sistem-informasi*'))
                            @can('sistem_informasi') {{ route('sistem_informasi.section.semua') }} @endcan
                        @elseif(Request::is('website-unima*'))
                            @can('website_unima') {{ route('website_unima.section.semua') }} @endcan
                        @elseif(Request::is('learning-management-system*'))
                            @can('lms') {{ route('lms.section.semua') }} @endcan
                        @elseif(Request::is('ijazah*'))
                            @can('ijazah') {{ route('ijazah.section.semua') }} @endcan
                        @elseif(Request::is('slip*'))
                            @can('slip') {{ route('slip.section.semua') }} @endcan
                        @endif
                        ">                                
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
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Kode</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">status</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">rating</th>
                                <th class="text-secondary opacity-7"></th>
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

                                        <!-- Email-->
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $p->used_email }}</p>
                                            </td>

                                        <!-- Kode-->
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $p->kode }}</p>
                                            </td>

                                        <!-- Nama -->
                                            <td class="align-middle text-center text-sm">
                                                <p class="text-xs font-weight-bold mb-0">{{ $p->nama }}</p>
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

                                        <!-- Action-->
                                            <td class="align-middle">
                                                
                                                <!-- =============================== Section Gate ===================-->
                                                <a href="
                                                @if(Request::is('jaringan*'))
                                                    @can('jaringan') {{ route('jaringan.detail', $p->kode) }} @endcan
                                                @elseif(Request::is('server*'))    
                                                    @can('server') {{ route('server.detail', $p->kode) }} @endcan
                                                @elseif(Request::is('sistem-informasi*'))    
                                                    @can('sistem_informasi') {{ route('sistem_informasi.detail', $p->kode) }} @endcan
                                                @elseif(Request::is('website-unima*'))    
                                                    @can('website_unima') {{ route('website_unima.detail', $p->kode) }} @endcan
                                                @elseif(Request::is('learning-management-system*'))    
                                                    @can('lms') {{ route('lms.detail', $p->kode) }} @endcan
                                                @elseif(Request::is('ijazah*'))    
                                                    @can('ijazah') {{ route('ijazah.detail', $p->kode) }} @endcan
                                                @elseif(Request::is('slip*'))    
                                                    @can('slip') {{ route('slip.detail', $p->kode) }} @endcan
                                                @endif
                                                " 
                                                class="text-secondary  text-xs">
                                                    <i class="fa fa-solid fa-info ps-3"></i>
                                                </a>
                                            </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center"><p class="font-weight-bold my-2">Tidak ada pengaduan </p></td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <!-- Pagination Section -->
                        <div class="d-flex justify-content-center my-2">{{ $pengaduan->onEachSide(2)->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- Row -->
</div> <!-- Container -->

@endsection