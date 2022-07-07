@extends('_layouts.master')
@section('content')
    <div class="container my-3">
         <!-- Back -->
         <a href="{{ url()->previous() }}">
            <div class="btn btn-light">
                <i class="ni ni-bold-left"></i>
            </div>
        </a>

        
        <!-- Card Section --> 
        <div class="row">
            <!--  Semua -->
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <!-- ================== Section Gate =============  -->
            @can('jaringan') <a href="{{ route('jaringan.section.semua') }}">
            @elsecan('server') <a href="{{ route('server.section.semua') }}">
            @endcan
            <div class="card">
                <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                    <div class="numbers">
                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Semua</p>
                        <h5 class="font-weight-bolder">{{ $semua }}</h5>
                        <p class="mb-0">
                        <!-- <strong>Jaringan</strong> -->
                        </p>
                    </div>
                    </div>
                    <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                        <i class="fa fa-solid fa-globe text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </a>
            </div>
            <!-- Ditolak -->
            {{-- <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <a href="#">
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
                </a>
            </div>  --}}

            <!-- Dengan Rating -->
            {{-- <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <a href="#">
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
                </a>
            </div>
             --}}
        </div> <!-- End Row  Card Section-->  
     


        <div class="row my-4">
            <div class="col-md-6">
                <div class="card my-3">
                    <div class="card-header pb-0 p-3 bg-gradient-light ">
                        <h4 class="text-dark text-center font-weight-bold text-uppercase">Verifikasi Pengaduan Masuk</h4>
                        <h4 class="text-dark text-center font-weight-bold text-uppercase">({{ $pengaduan_masuk_count }})</h4>
                        <!-- <hr class="bg-primary border-2 border-top border-primary" > -->
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0">
                              <thead>
                                <tr>
                                  <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ">#</th>
                                  <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                                  <th class="text-uppercase text-dark text-xxs font-weight-bolder  ps-2">Tujuan</th>
                                  <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
                                </tr>
                              </thead>
                                  <tbody>
                                    <!-- Logic cuurent itu isi halaman -->
                                        <!-- 
                                        hal 1 = 1-1=0, 10*0=0, 1+0=1
                                        hal 2 = 2-1=1, 10*1=10, 1+10=11
                                        dst
                                    -->
                                    <?php $left = 1 + (10 * ($current_left - 1)); ?>
                                  @forelse($pengaduan_masuk as $p)
                                      <tr>
                                          <td>
                                              <p class="mb-0 text-xs ps-3">{{ $left++ }}</p>
                                          </td>
                                          <td>
                                            <p class="text-xs  mb-0"><strong>{{ $p->email }}</strong></p>
                                          </td>
                                          <td>
                                            <p class="text-xs  mb-0">{{ $p->tujuan->nama }}</p>
                                          </td>
                                          <td>
                                            <!-- =============================== Section Gate ===================-->
                                            @can('jaringan')
                                                <a href="{{ route('jaringan.detail', $p->kode) }}" class="text-secondary  text-xs">
                                                    <i class="fa fa-solid fa-info ps-3"></i>
                                                </a>
                                            @elsecan('server')
                                                <a href="{{ route('server.detail', $p->kode) }}" class="text-secondary  text-xs">
                                                    <i class="fa fa-solid fa-info ps-3"></i>
                                                </a>
                                            @endcan
                                          </td>
                                      </tr>
                                  @empty
                                      <tr>
                                          <td colspan="4" class="text-center"><p class="font-weight-bold my-2">Tidak ada pengaduan masuk </p></td>
                                      </tr>
                                  @endforelse
                                  </tbody>
                            </table>
                          </div> <!-- End Table -->
                    </div> <!-- Card Body-->
                    <!-- Paginate -->
                    <div class="d-flex justify-content-center my-2">{{ $pengaduan_masuk->onEachSide(2)->links() }}</div>
                </div> <!-- End Card-->
            </div> <!-- End Col-->

            <div class="col-md-6">
                <div class="card my-3">
                    <div class="card-header pb-0 p-3 bg-gradient-light">
                        <h4 class="text-dark text-center font-weight-bold text-uppercase">Proses Pengaduan</h4>
                        <h4 class="text-dark text-center font-weight-bold text-uppercase">({{ $pengaduan_proses_count }})</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0">
                              <thead>
                                <tr>
                                  <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ">#</th>
                                  <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                                  <th class="text-uppercase text-dark text-xxs font-weight-bolder  ps-2">Tujuan</th>
                                  <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
                                </tr>
                              </thead>
                                  <tbody>
                                      <!-- Logic cuurent itu isi halaman -->
                                        <!-- 
                                        hal 1 = 1-1=0, 10*0=0, 1+0=1
                                        hal 2 = 2-1=1, 10*1=10, 1+10=11
                                        dst
                                    -->
                                    <?php $right = 1 + (10 * ($current_right - 1)); ?>
                                  @forelse($pengaduan_proses as $p)
                                      <tr>
                                          <td>
                                              <p class="mb-0 text-xs ps-3">{{ $right++}}</p>
                                          </td>
                                          <td>
                                            <p class="text-xs  mb-0"><strong>{{ $p->email }}</strong></p>
                                          </td>
                                          <td>
                                            <p class="text-xs  mb-0">{{ $p->tujuan->nama }}</p>
                                          </td>
                                          <td>
                                            <!-- ======================== Section Gate ===================== -->
                                            @can('jaringan')
                                                <a href="{{ route('jaringan.detail', $p->kode) }}" class="text-secondary  text-xs">
                                                    <i class="fa fa-solid fa-info ps-3"></i>
                                                </a>
                                            @elsecan('server')
                                                <a href="{{ route('server.detail', $p->kode) }}" class="text-secondary  text-xs">
                                                    <i class="fa fa-solid fa-info ps-3"></i>
                                                </a>
                                            @endcan
                                          </td>
                                      </tr>
                                  @empty
                                      <tr>
                                          <td colspan="4" class="text-center"><p class="font-weight-bold my-2">Tidak ada pengaduan masuk </p></td>
                                      </tr>
                                  @endforelse
                                  </tbody>
                            </table>
                          </div> <!-- End Table -->
                    </div> <!-- Card Body --> 
                    <!-- Paginate -->
                    <div class="d-flex justify-content-center my-2">{{ $pengaduan_proses->onEachSide(2)->links() }}</div>
                </div> <!-- Card -->
            </div> <!-- Col-->
        </div> <!-- End Row --> 
    </div>  <!-- End Container-->

@endsection