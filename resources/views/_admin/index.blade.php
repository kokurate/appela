@extends('_layouts.master')
@section('content')
  
    <div class="container-fluid py-4">
    @can('admin')
      <!-- Card Section --> 
        <div class="row">
            <!--  Jaringan -->
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <a href="{{ route('jaringan.index') }}">
              <div class="card">
                <div class="card-body p-3">
                  <div class="row">
                    <div class="col-8">
                      <div class="numbers">
                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Diproses</p>
                        <h5 class="font-weight-bolder">{{ $jaringan }}</h5>
                        <p class="mb-0">
                          <strong>Jaringan</strong>
                        </p>
                      </div>
                    </div>
                    <div class="col-4 text-end">
                      <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                        <i class="fa fa-solid fa-wifi text-lg opacity-10" aria-hidden="true"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </a>
            </div>
            <!-- Server -->
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <a href="{{ route('server.index') }}">
              <div class="card">
                <div class="card-body p-3">
                  <div class="row">
                    <div class="col-8">
                      <div class="numbers">
                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Diproses</p>
                        <h5 class="font-weight-bolder">{{ $server }}</h5>
                        <p class="mb-0">
                          <strong>Server</strong>
                        </p>
                      </div>
                    </div>
                    <div class="col-4 text-end">
                      <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                        <i class="fa fa-server text-lg opacity-10" aria-hidden="true"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </a>
            </div>
            <!-- Sistem Informasi -->
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <a href="{{ route('sistem_informasi.index') }}">
              <div class="card">
                <div class="card-body p-3">
                  <div class="row">
                    <div class="col-8">
                      <div class="numbers">
                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Diproses</p>
                        <h5 class="font-weight-bolder">{{ $sistem_informasi }}</h5>
                      </div>
                    </div>
                    <div class="col-4 text-end">
                      <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                        <i class="fa fa-book-open text-lg opacity-10" aria-hidden="true"></i>
                      </div>
                    </div>
                    <div class="row">
                        <div class="numbers">
                            <p class="mb-0">
                              <strong>Sistem Informasi</strong>
                            </p>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </a>
            </div>
            <!-- Website UNIMA -->
            <div class="col-xl-3 col-sm-6">
                <a href="{{ route('website_unima.index') }}">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Diproses</p>
                                    <h5 class="font-weight-bolder">{{ $website_unima }}</h5>
                                    <p class="mb-0">
                                    <strong>Website unima</strong>
                                    </p>
                                </div>
                            </div>
                                <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-secondary shadow-warning text-center rounded-circle">
                                    <i class="ni ni-world-2 text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </a>
            </div>
            <!-- Learning Management System -->
            <div class="col-xl-4 col-sm-6 mt-3">
                <a href="{{ route('lms.index') }}">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Diproses</p>
                                    <h5 class="font-weight-bolder">{{ $lms }}</h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-info shadow-warning text-center rounded-circle">
                                    <i class="fa fa-school text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="row">
                                <div class="numbers">
                                    <p class="mb-0">
                                    <strong>Learning Management System</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </a>
            </div>
            <!-- Ijazah -->
            <div class="col-xl-4 col-sm-6 mt-3">
                <a href="{{ route('ijazah.index') }}">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Diproses</p>
                                    <h5 class="font-weight-bolder">{{ $ijazah }}</h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-dark shadow-warning text-center rounded-circle">
                                    <i class="fa fa-graduation-cap text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="row">
                                <div class="numbers">
                                    <p class="mb-0">
                                    <strong>Ijazah</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </a>    
            </div>
            <!-- Slip -->
            <div class="col-xl-4 col-sm-6 mt-3">
            <a href="{{ route('slip.index') }}">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Diproses</p>
                                    <h5 class="font-weight-bolder">{{ $slip }}</h5>
                                </div>
                            </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                        <i class="fas fa-envelope-open-text text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="numbers">
                                        <p class="mb-0">
                                        <strong>Slip</strong>
                                        </p>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
              </a>
            </div>

                        <!--  Jaringan -->
                        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4 mt-3">
                          <a href="{{ route('lain_lain.index') }}">
                            <div class="card">
                              <div class="card-body p-3">
                                <div class="row">
                                  <div class="col-8">
                                    <div class="numbers">
                                      <p class="text-sm mb-0 text-uppercase font-weight-bold">Diproses</p>
                                      <h5 class="font-weight-bolder">{{ $lain_lain }}</h5>
                                      <p class="mb-0">
                                        <strong>Lain-lain</strong>
                                      </p>
                                    </div>
                                  </div>
                                  <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                      <i class="fa fa-solid fa-plus text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </a>
                        </div>
        </div>     
        <!-- End Row  Card Section-->
    @endcan

      <div class="row mt-4">
        <div class="col-lg-7 mb-lg-0 mb-4">
          <div class="card ">
            <div class="card-header bg-gradient-light pb-0 p-3">
              <div class="d-flex justify-content-between">
                <h6 class="mb-2">Pengaduan Masuk</h6>
              </div>
            </div>
            <div class="card">
                <div class="table-responsive">
                  <table class="table align-items-center mb-0">
                    <thead>
                      <tr>
                        <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ">#</th>
                        <th class="text-uppercase text-dark text-xxs font-weight-bolder  ps-2">Tujuan</th>
                        <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
                      </tr>
                    </thead>
                        <tbody>
                        @forelse($pengaduan as $p)
                            <tr>
                                <td>
                                    <p class="mb-0 text-xs ps-3">{{ ++$i }}</p>
                                </td>
                                <td>
                                <p class="text-xs  mb-0"><strong>{{ $p->tujuan->nama }}</strong></p>
                                </td>
                                <td>
                                <a href="{{ route('admin.masuk', $p->kode) }}" class="text-secondary  text-xs">
                                    <i class="fa fa-solid fa-info ps-3"></i>
                                </a>
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
              </div> <!-- End Card-->
            </div>
            <!-- Paginate -->
            <div class="d-flex justify-content-center my-2">{{ $pengaduan->onEachSide(2)->links() }}</div>
        </div> <!-- End Col -->

        <!-- New Col Category Section-->
        <div class="col-lg-5">
          <div class="card">
            <div class="card-header bg-gradient-light pb-0 p-3">
              <h6 class="mb-2">Semua Pengaduan Selesai</h6>
            </div>
            <div class="card-body p-3">
              <ul class="list-group">

                <!-- Semua -->
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                      <i class="fa fa-regular fa-globe"></i>
                    </div>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Semua</h6>
                      <span class="text-xs font-weight-bold">{{ $semua }}</span>
                    </div>
                  </div>
                  <div class="d-flex">
                    <a href="{{ route('admin.section.semua') }}"  class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></a>
                  </div>
                </li>   

                <!-- Selesai-->
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                      {{-- <i class="ni ni-check-bold text-white opacity-10"></i> --}}
                      <i class="fa fa-solid fa-check"></i>
                    </div>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Selesai</h6>
                      <span class="text-xs font-weight-bold">{{ $selesai }}</span>
                    </div>
                  </div>
                  <!-- <div class="d-flex">
                    <a href="#" class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></a>
                  </div> -->
                </li>

                <!-- Ditolak -->
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                      {{-- <i class="ni ni-fat-remove opacity-10"></i> --}}
                      <i class="fa fa-regular fa-remove"></i>
                    </div>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Ditolak</h6>
                      <span class="text-xs font-weight-bold">{{ $ditolak }}</span>
                    </div>
                  </div>
                  <!-- <div class="d-flex">
                    <a href="#"  class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></a>
                  </div> -->
                </li>                 
              </ul>
            </div>
          </div>
        </div>
      </div>
@endsection
 