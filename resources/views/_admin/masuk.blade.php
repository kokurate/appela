@extends('_layouts.master')
@section('content')

<div class="container-fluid py-4">
    <!-- Back -->
        <a href="{{ url()->previous() }}">
            <div class="btn btn-light">
                <i class="ni ni-bold-left"></i>
            </div>
        </a>
    <div class="row">
        <div class="text-center">
            <h5 class="btn bg-gradient-light text-dark">Tujuan Pengaduan : {{ $pengaduan->tujuan->nama }}</h5>
        </div>
    </div>
    <div class="row">
        <!-- =========== Section Left ============ -->
        <div class="col-md-6 my-2">
            <div class="card">
                <div class="card-header pb-0 p-3">
                    <h4 class="text-dark text-center font-weight-bold text-uppercase">Data Pengaduan</h4>
                </div>
                    <nav>
                        <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true"><i class="ni ni-single-02"></i> Profile</button>
                        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="ni ni-folder-17"></i> Pengaduan</button>
                        <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false"><i class="ni ni-tag"></i> Gambar</button>
                        </div>
                    </nav>
                    <div class="card-body">
                        <div class="tab-content" id="nav-tabContent">
                            <!-- Isi Tab 1-->
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <p class="font-weight-bolder">Status : {{ $pengaduan->status }}</p>
                                <hr class="bg-primary border-2 border-top border-primary" >
                                <p class="font-weight-bold">Email : {{ $pengaduan->email }}</p>
                                <p class="font-weight-bold">Nama : {{ $pengaduan->nama }}</p>
                            </div>
                            
                            <!-- Isi tab 2 -->
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <h5>{{ $pengaduan->judul }}</h5>
                                <p>{!! $pengaduan->isi !!}</p>
                            </div>
                            
                            <!-- Isi tab 3-->
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                <div style="max-height:350px overflow:hidden;" class="d-block text-center">
                                    <img src="{{ asset('storage/'. $pengaduan->visitor_image_1) }}" class="img-thumbnail my-1" width="250px">
                                    <img src="{{ asset('storage/'. $pengaduan->visitor_image_2) }}" class="img-thumbnail my-1" width="250px" onerror="this.style.display='none'">
                                    <img src="{{ asset('storage/'. $pengaduan->visitor_image_3) }}" class="img-thumbnail my-1" width="250px" onerror="this.style.display='none'">
                                </div>
                            </div>
                        </div>
                    </div>
            </div> <!-- End Card -->
        </div>   <!-- End Col -->

        <!-- ============ Section Right =========== -->
        <div class="col-md-6 my-2">
            <div class="card">
                <div class="card-header pb-0 p-3">
                    <h4 class="text-dark text-center font-weight-bold text-uppercase">Update Pengaduan</h4>
                </div>
                    <nav>
                        <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-update-tab" data-bs-toggle="tab" data-bs-target="#nav-update" type="button" role="tab" aria-controls="nav-update" aria-selected="true"><i class="ni ni-fat-add"></i> Update</button>
                            <button class="nav-link" id="nav-tujuan-tab" data-bs-toggle="tab" data-bs-target="#nav-tujuan" type="button" role="tab" aria-controls="nav-tujuan" aria-selected="false"><i class="ni ni-ungroup"></i> Ubah Tujuan Pengaduan</button>
                            <button class="nav-link" id="nav-email-tab" data-bs-toggle="tab" data-bs-target="#nav-email" type="button" role="tab" aria-controls="nav-email" aria-selected="false"><i class="ni ni-email-83"></i> Email</button>
                        </div>
                    </nav>
                    <div class="card-body">
                        <div class="tab-content" id="nav-tabContent">
                            <!-- Isi Tab 1-->
                            <div class="tab-pane fade show active" id="nav-update" role="tabpanel" aria-labelledby="nav-update-tab">
                                <form class="mt-1" method="post" action="{{ route('admin.masuk.store',$pengaduan->kode)}}">
                                    @csrf
                                    <div class="col-md-12">
                                        @error('status')
                                        <div class="text-danger" role="alert">
                                        {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                          
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="flexRadioDefault1" value="Pengaduan Sedang Diverifikasi" onclick="show(1)">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                          Update Pengaduan
                                        </label>
                                      </div>
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="flexRadioDefault2" value="Pengaduan Ditolak" onclick="show(0)" {{ old('status') == 'Pengaduan Ditolak' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="flexRadioDefault2">Tolak Pengaduan</label>
                        
                                             {{-- Alasan --}}
                                        <div class="mb-3" id="show_tanggapan">
                                            <label for="exampleFormControlTextarea1" class="form-label">Tanggapan</label>
                                            <textarea class="form-control @error('keterangan') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3" name="keterangan"></textarea>
                                            <div class="col-12">
                                                @error('keterangan')
                                                <div class="text-danger" role="alert">
                                                {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                      </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                  </form>
                            </div>
                            
                            <!-- Isi tab 2 -->
                            <div class="tab-pane fade" id="nav-tujuan" role="tabpanel" aria-labelledby="nav-tujuan-tab">
                                <form class="mt-1" method="post" action="{{ route('admin.tujuan.store', $pengaduan->kode) }}">
                                        @csrf
                            
                                      
                                            @error('tujuan_id')
                                            <div class="text-danger my-2 text-center" role="alert">
                                            {{ $message }}
                                            </div>
                                            @enderror
                                            
                                            @foreach ($tujuan as $tujuan)
                                                {{-- tujuan(all) tidak sama dengan tujuan->nama skrng, tampilkan selain yang bukan--}}
                                                @if ($tujuan->nama != $pengaduan->tujuan->nama )
                                                    <div class="form-check">
                                                        <!-- <div class="row"> -->
                                                        <!--    <div class="col-4"></div> -->

                                                            <div class="d-block text-center">
                                                                <input class="btn-check" type="radio" name="tujuan_id" id="{{ $tujuan->nama }}" value="{{ $tujuan->id }}">
                                                                <label class="btn btn-outline-primary" for="{{ $tujuan->nama }}">
                                                                {{ $tujuan->nama }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    <!-- </div> -->
                                                @endif
                                            @endforeach
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary">Ubah Tujuan Pengaduan</button>
                                            </div>
                                </form>
                            </div>

                            <!-- Isi Tab 3-->
                            <div class="tab-pane fade" id="nav-email" role="tabpanel" aria-labelledby="nav-email-tab">
                                <p class="font-weight-bolder">Kirim Email ke petugas  {{ $pengaduan->tujuan->nama }}</p>
                                <hr class="bg-primary border-2 border-top border-primary" >

                                <form class="mt-1" method="post" action="{{ route('email.petugas',$pengaduan->kode) }}">
                                    @csrf
                                    <input type="hidden" value="{{ $pengaduan->tujuan_id }}" name="tujuan_id">
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Kirim Email Ke petugas</button>
                                        </div>
                            </form>

                            </div>
                        </div>
                    </div>
            </div> <!-- End Card -->

        </div>
    </div> <!-- End Row-->
</div> <!-- End Container  -->
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
@endsection