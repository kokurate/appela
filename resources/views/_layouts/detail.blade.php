@extends('_layouts.master')

@section('header')
   {{-- Trix Editor --}}
   <link rel="stylesheet" type="text/css" href="/css/trix.css">
   <script type="text/javascript" src="/js/trix.js"></script> 
   {{-- Menghilangkan CSS Attach File Pada Trix Editor --}}
   <style>
     trix-toolbar [data-trix-button-group="file-tools"]{
       display: none;
     }
   </style>
@endsection

@section('content')
 <div class="container my-2">
    <!-- Back -->
    <a href="{{ route('jaringan.index') }}">
        <div class="btn btn-light">
            <i class="ni ni-bold-left"></i>
        </div>
    </a>
    <div class="row">
        <div class="text-center">
                <h5 class="btn bg-gradient-light text-dark">Tujuan Pengaduan : {{ $pengaduan->tujuan->nama }}</h5>
            @if($pengaduan->status == 'Pengaduan Selesai')
                <h5 class="btn bg-success text-dark font-weight-bolder">Pengaduan Selesai</h5>
            @elseif ($pengaduan->status == 'Pengaduan Ditolak')
                <h5 class="btn bg-danger text-light font-weight-bolder">Pengaduan Ditolak</h5>
            @endif
        </div>
    </div>
    
    <!-- Rating -->
    @if($pengaduan->rating != NULL ) 
        <div class="row my-2">
            <div class="d-flex justify-content-center">
                <!-- <div class="col-xl-6"> -->
                        <div class="col-xl-2 mt-md-0 mt-4 mx-2">
                            <div class="card">
                                <div class="card-header mx-4 p-3 text-center">
                                    <div class="icon icon-shape icon-lg bg-warning shadow text-center border-radius-lg">
                                        <i class="fa fa-star opacity-10"></i>
                                    </div>
                                </div>
                                <div class="card-body pt-0 p-3 text-center">
                                    <h6 class="text-center mb-0">Rating</h6>
                                    <hr class="horizontal dark my-3">
                                    <h5 class="mb-0 text-warning"> <i class="fa fa-star opacity-10"></i> {{ $pengaduan->rating }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 mt-md-0 mt-4 mx-2">
                            <div class="card">
                                <div class="card-header mx-1 p-1 ">
                                    <h5 class="text-dark text-center font-weight-bold text-uppercase ">Komentar</h5>
                                    <hr class="bg-primary border-2 border-top border-primary" >
                                </div>
                                <div class="card-body pt-0 p-3 text-center">
                                    <p>{{ $pengaduan->komentar }}</p>
                                </div>
                            </div>
                        </div> 
                <!-- </div>  End Col-->
            </div> <!-- End d-flex center -->
        </div> <!-- End Row-->
    @endif


    <!-- ============= Require ================ -->
    <div class="row">
        @include('_layouts.detail_action')

        <!-- Data Pengaduan Section-->
        <div class="col-md-6 my-3">
            <div class="card">
                <div class="card-header pb-0 p-3 bg-gradient-light">
                    <h4 class="text-dark text-center font-weight-bold text-uppercase ">Data Pengaduan</h4>
                </div>
                <nav>
                    <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-1-tab" data-bs-toggle="tab" data-bs-target="#nav-1" type="button" role="tab" aria-controls="nav-1" aria-selected="true"><i class="ni ni-single-02"></i> Profile</button>
                    <button class="nav-link" id="nav-2-tab" data-bs-toggle="tab" data-bs-target="#nav-2" type="button" role="tab" aria-controls="nav-2" aria-selected="false"><i class="ni ni-folder-17"></i> Pengaduan</button>
                    <button class="nav-link" id="nav-3-tab" data-bs-toggle="tab" data-bs-target="#nav-3" type="button" role="tab" aria-controls="nav-3" aria-selected="false"><i class="ni ni-tag"></i> Gambar</button>
                    </div>
                </nav>
                <div class="card-body">
                    <div class="tab-content" id="nav-tabContent">
                        <!-- Isi Tab 1-->
                        <div class="tab-pane fade show active" id="nav-1" role="tabpanel" aria-labelledby="nav-1-tab">
                            <p class="font-weight-bolder">Status : {{ $pengaduan->status }}</p>
                            <hr class="bg-primary border-2 border-top border-primary" >
                            <p class="font-weight-bold">Email : {{ $pengaduan->used_email }}</p>
                            <p class="font-weight-bold">Nama : {{ $pengaduan->nama }}</p>
                        </div>
                        
                        <!-- Isi tab 2 -->
                        <div class="tab-pane fade" id="nav-2" role="tabpanel" aria-labelledby="nav-2-tab">
                            <h5>{{ $pengaduan->judul }}</h5>
                            <p>{!! $pengaduan->isi !!}</p>
                        </div>
                        
                        <!-- Isi tab 3-->
                        <div class="tab-pane fade" id="nav-3" role="tabpanel" aria-labelledby="nav-3-tab">
                            <div style="max-height:350px overflow:hidden;" class="d-block text-center">
                                <img src="{{ asset('storage/'. $pengaduan->visitor_image_1) }}" class="img-thumbnail my-1" width="250px">
                                <img src="{{ asset('storage/'. $pengaduan->visitor_image_2) }}" class="img-thumbnail my-1" width="250px" onerror="this.style.display='none'">
                                <img src="{{ asset('storage/'. $pengaduan->visitor_image_3) }}" class="img-thumbnail my-1" width="250px" onerror="this.style.display='none'">
                            </div>
                        </div>
                    </div>
                </div> <!-- Card Body -->
            </div> <!-- End Card -->
        </div> <!-- End Col -->

        <!-- Petugas Section -->
        <div class="col-md-6 my-3">
            <div class="card">
                <div class="card-header pb-0 p-3 bg-gradient-light">
                    <h4 class="text-dark text-center font-weight-bold text-uppercase ">Petugas</h4>
                </div>
                <nav>
                    <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-update-tab" data-bs-toggle="tab" data-bs-target="#nav-update" type="button" role="tab" aria-controls="nav-update" aria-selected="true"><i class="ni ni-fat-add"></i> Tanggapan</button>
                        <button class="nav-link" id="nav-tujuan-tab" data-bs-toggle="tab" data-bs-target="#nav-tujuan" type="button" role="tab" aria-controls="nav-tujuan" aria-selected="false"><i class="ni ni-ungroup"></i> Gambar</button>
                        <button class="nav-link" id="nav-activity-tab" data-bs-toggle="tab" data-bs-target="#nav-activity" type="button" role="tab" aria-controls="nav-activity" aria-selected="false"><i class="ni ni-notification-70"></i> Activity Log</button>
                    </div>
                </nav>
                <div class="card-body">
                    <div class="tab-content" id="nav-tabContent">
                        <!-- Isi Tab 1-->
                        <div class="tab-pane fade show active" id="nav-update" role="tabpanel" aria-labelledby="nav-update-tab">
                            @if($pengaduan->keterangan == null)
                                <p class="font-weight-bolder text-center"> Petugas belum memberikan tanggapan</p>
                            @endif
                            <p>{!! $pengaduan->keterangan !!}</p>
                        </div>
                        
                        <!-- Isi tab 2 -->
                        <div class="tab-pane fade" id="nav-tujuan" role="tabpanel" aria-labelledby="nav-tujuan-tab">
                            @if($pengaduan->petugas_image_1 == null)
                                <p class="font-weight-bolder text-center"> Petugas Tidak mengupload gambar</p>
                            @endif
                            <div style="max-height:350px overflow:hidden;" class="d-block text-center">
                                <img src="{{ asset('storage/'. $pengaduan->petugas_image_1) }}" class="img-thumbnail my-1" width="250px" onerror="this.style.display='none'">
                                <img src="{{ asset('storage/'. $pengaduan->petugas_image_2) }}" class="img-thumbnail my-1" width="250px" onerror="this.style.display='none'">
                                <img src="{{ asset('storage/'. $pengaduan->petugas_image_3) }}" class="img-thumbnail my-1" width="250px" onerror="this.style.display='none'">
                            </div>
                        </div>

                        <!-- Isi tab 3 -->
                        <div class="tab-pane fade" id="nav-activity" role="tabpanel" aria-labelledby="nav-activity-tab">
                            <ul class="list-group">
                                @foreach($log as $activitylog)
                                    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                        <div class="d-flex align-items-center">
                                            <button class="btn btn-icon-only btn-rounded btn-outline-dark mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-exclamation"></i></button>
                                                <div class="d-flex flex-column">
                                                    <h6 class="mb-1 text-dark text-sm">{{ $activitylog->user }}</h6>
                                                    <span class="text-xs">{{ $activitylog->do }}</span>
                                                </div>
                                        </div>
                                        <div class="d-flex align-items-center text-dark text-sm font-weight-bold">
                                        {{ $activitylog->opener }}
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div> <!-- Card -->
        </div> <!-- Col -->
    </div> <!-- End Row-->  
 </div> <!-- Container -->
@endsection

@section('javascript')
 {{-- Javascript buat show tanggapan kalo pilih Tolak --}}
 <script>
    function show(x){
        if (x==0)
        document.getElementById('show_tanggapan').style.display='block';
        else
        document.getElementById('show_tanggapan').style.display="none";
        return;
    }
</script>

{{-- Menghilangkan fungsi dari attach file pada trix editor --}}
<script>
    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault()
    })
       //Trigger Function
        img_1_petugas = document.querySelector('.upload_img_1');
        img_2_petugas = document.querySelector('.upload_img_2');
        img_3_petugas = document.querySelector('.upload_img_3');

        img_1_petugas.style.display =  "none";
        img_2_petugas.style.display =  "none";
        img_3_petugas.style.display =  "none";

        function display_petugas_img_1(){
            if (img_1_petugas.style.display === "none") {
    		    img_1_petugas.style.display = "block";
  		    } else {
    		    img_1_petugas.style.display = "none";
  		    }
        }
        function display_petugas_img_2(){
            if (img_2_petugas.style.display === "none") {
    		    img_2_petugas.style.display = "block";
  		    } else {
    		    img_2_petugas.style.display = "none";
  		    }
        }
        function display_petugas_img_3(){
            if (img_3_petugas.style.display === "none") {
    		    img_3_petugas.style.display = "block";
  		    } else {
    		    img_3_petugas.style.display = "none";
  		    }
        }


        // Preview Image 1
            function previewPetugas_image_1(){
                const image = document.querySelector('#petugas_image_1');
                const imgPreview = document.querySelector('.img-preview-petugas-1');

                imgPreview.style.display = 'block';

                const oFReader = new FileReader();
                oFReader.readAsDataURL(image.files[0]);

                oFReader.onload = function(oFREvent){
                    imgPreview.src = oFREvent.target.result;
                }
            }

        // Preview Image 2
            function previewPetugas_image_2(){
                const image = document.querySelector('#petugas_image_2');
                const imgPreview = document.querySelector('.img-preview-petugas-2');

                imgPreview.style.display = 'block';

                const oFReader = new FileReader();
                oFReader.readAsDataURL(image.files[0]);

                oFReader.onload = function(oFREvent){
                    imgPreview.src = oFREvent.target.result;
                }
            }

        // Preview Image 3
            function previewPetugas_image_3(){
                const image = document.querySelector('#petugas_image_3');
                const imgPreview = document.querySelector('.img-preview-petugas-3');

                imgPreview.style.display = 'block';

                const oFReader = new FileReader();
                oFReader.readAsDataURL(image.files[0]);

                oFReader.onload = function(oFREvent){
                    imgPreview.src = oFREvent.target.result;
                }
            }
          


    </script>
@endsection