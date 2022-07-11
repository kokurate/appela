@extends('_layouts.master')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        
        <!--  Jaringan -->
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">

        <div class="card">
            <div class="card-body p-3">
            <div class="row">
                <div class="col-8">
                <div class="numbers">
                    <!-- <p class="text-sm mb-0 text-uppercase font-weight-bold">Diproses</p> -->
                    @if($jaringan === null)
                        <h5 class="font-weight-bolder"><i class="fa fa-star text-warning"></i> 0</h5>
                    @else 
                        <h5 class="font-weight-bolder"><i class="fa fa-star text-warning"></i> {{ $jaringan }}</h5>
                    @endif
                        <p>dari {{ $count_jaringan }} user</p>
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
  
        </div>
        <!-- Server -->
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
       
        <div class="card">
            <div class="card-body p-3">
            <div class="row">
                <div class="col-8">
                <div class="numbers">
                    <!-- <p class="text-sm mb-0 text-uppercase font-weight-bold">Diproses</p> -->
                @if($server === null)
                    <h5 class="font-weight-bolder"><i class="fa fa-star text-warning"></i> 0</h5>
                @else 
                    <h5 class="font-weight-bolder"><i class="fa fa-star text-warning"></i> {{ $server }}</h5>
                @endif
                    <p>dari {{ $count_server }} user</p>
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
   
        </div>
        <!-- Sistem Informasi -->
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
       
        <div class="card">
            <div class="card-body p-3">
            <div class="row">
                    <div class="col-8">
                        <div class="numbers">
                            <!-- <p class="text-sm mb-0 text-uppercase font-weight-bold">Diproses</p> -->
                        @if($sistem_informasi === null)
                            <h5 class="font-weight-bolder"><i class="fa fa-star text-warning"></i> 0</h5>
                        @else 
                            <h5 class="font-weight-bolder"><i class="fa fa-star text-warning"></i> {{ $sistem_informasi }}</h5>
                        @endif
                            <p>dari {{ $count_sistem_informasi }} user</p>
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
     
        </div>
        <!-- Website UNIMA -->
        <div class="col-xl-3 col-sm-6">
          
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <!-- <p class="text-sm mb-0 text-uppercase font-weight-bold">Diproses</p> -->
                            @if($website_unima === null)
                                <h5 class="font-weight-bolder"><i class="fa fa-star text-warning"></i> 0</h5>
                            @else 
                                <h5 class="font-weight-bolder"><i class="fa fa-star text-warning"></i> {{ $website_unima }}</h5>
                            @endif
                                <p>dari {{ $count_website_unima }} user</p>
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
          
        </div>
        <!-- Learning Management System -->
        <div class="col-xl-4 col-sm-6 mt-3">
     
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <!-- <p class="text-sm mb-0 text-uppercase font-weight-bold">Diproses</p> -->
                                @if($lms === null)
                                    <h5 class="font-weight-bolder"><i class="fa fa-star text-warning"></i> 0</h5>
                                @else 
                                    <h5 class="font-weight-bolder"><i class="fa fa-star text-warning"></i> {{ $lms }}</h5>
                                @endif
                                    <p>dari {{ $count_lms }} user</p>
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
         
        </div>
        <!-- Ijazah -->
        <div class="col-xl-4 col-sm-6 mt-3">
          
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <!-- <p class="text-sm mb-0 text-uppercase font-weight-bold">Diproses</p> -->
                                @if($ijazah === null)
                                    <h5 class="font-weight-bolder"><i class="fa fa-star text-warning"></i> 0</h5>
                                @else 
                                    <h5 class="font-weight-bolder"><i class="fa fa-star text-warning"></i> {{ $ijazah }}</h5>
                                @endif
                                    <p>dari {{ $count_ijazah }} user</p>
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
          
        </div>
        <!-- Slip -->
        <div class="col-xl-4 col-sm-6 mt-3">
     
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <!-- <p class="text-sm mb-0 text-uppercase font-weight-bold">Diproses</p> -->
                            @if($slip === null)
                                <h5 class="font-weight-bolder"><i class="fa fa-star text-warning"></i> 0</h5>
                            @else 
                                <h5 class="font-weight-bolder"><i class="fa fa-star text-warning"></i> {{ $slip }}</h5>
                            @endif
                                <p>dari {{ $count_slip }} user</p>
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
        </div>
     
    </div>     
    <!-- End Row  Card Section-->
</div> <!-- End Container-->
@endsection