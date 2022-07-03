
<!-- Pengaduan Sedang Diverifikasi-->
@if($pengaduan->status == 'Pengaduan Sedang Diverifikasi')
    <!-- Row-->
    <!-- <div class="row"> -->
            <div class="col-md-6 my-3">
                <div class="card">
                    <div class="card-header pb-0 p-3 bg-gradient-light">
                        <h4 class="text-dark text-center font-weight-bold text-uppercase">Update Pengaduan</h4>
                    </div>
                    <nav>
                        <div class="nav nav-tabs justify-content-center my-1" id="nav-tab" role="tablist">
                        {{-- @if($pengaduan->status == 'Pengaduan Sedang Diverifikasi')  --}}
                            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true"><i class="ni ni-folder-17"></i> Masuk</button>
                            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false"><i class="ni ni-settings"></i> Tujuan</button>
                            {{-- <button class="nav-link" id="nav-add-tab" data-bs-toggle="tab" data-bs-target="#nav-add" type="button" role="tab" aria-controls="nav-add" aria-selected="false"><i class="ni ni-settings"></i> Tujuan</button> --}}
                        {{-- @elseif($pengaduan->status == 'Pengaduan Sedang Diproses') --}}
                            {{-- <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="ni ni-send"></i> Proses</button> --}}
                        {{-- @endif --}}
                        </div>
                    </nav>
                    <div class="card-body">
                        <div class="tab-content" id="nav-tabContent">
                            <!-- Isi Tab 1-->
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <form class="mt-2" method="post" action="{{ route('jaringan.update.store', $pengaduan->kode) }}">
                                    @csrf
                                        @error('status')
                                        <div class="text-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="flexRadioDefault1" value="Pengaduan Sedang Diproses" onclick="show(1)"  > 
                                        <label class="form-check-label" for="flexRadioDefault1">
                                        Proses Pengaduan
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="flexRadioDefault2" value="Pengaduan Ditolak" onclick="show(0)" {{ old('status') == 'Pengaduan Ditolak' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="flexRadioDefault2">Tolak Pengaduan</label>
                                    
                                        {{-- Alasan --}}
                                        <div class="mb-3" id="show_tanggapan">
                                        <label for="exampleFormControlTextarea1" class="form-label">Tanggapan</label>
                                        <textarea class="form-control @error('keterangan') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3" name="keterangan"></textarea>
                                            @error('keterangan')
                                            <div class="text-danger" role="alert">
                                            {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                    
                            <!-- Isi tab 2-->
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
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

                            <!-- Isi tab 3-->
                            <!-- <div class="tab-pane fade" id="nav-add" role="tabpanel" aria-labelledby="nav-add-tab">
                                <div style="max-height:350px overflow:hidden;" class="d-block text-center">
                                <p>tes</p> 
                                </div>
                            </div> -->

                            <!-- Isi tab 4 -->
                            <!-- <div class="tab-pane fade d-block" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <form method="post" action="{{ route('jaringan.proses.store', $pengaduan->kode) }}" enctype="multipart/form-data">
                                    {{-- Using enctype so this form can handle file --}}
                                @csrf
                                
                                        {{-- keterangan --}}
                                        <div class="mb-3 mt-3">
                                            <label for="keterangan" class="form-label">keterangan</label>
                                            @error('keterangan')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            <input id="keterangan" type="hidden" name="keterangan" value="{{ old('keterangan') }}">
                                            <trix-editor input="keterangan"></trix-editor>
                                        </div>  
                        
                                        {{-- Klik ini baru mo muncul yang upload image input --}}
                                        <p   class="badge bg-primary" onclick="display_petugas_img_1()">Add Image 1</p>
                                        <a href="#"  class="badge bg-primary" onclick="display_petugas_img_2()">Add Image 2</a>
                                        <a href="#"  class="badge bg-primary" onclick="display_petugas_img_3()">Add Image 3</a>
                    
                                            {{-- Upload Image  1--}}
                                            <div class="mb-3 upload_img_1">
                                                <label for="petugas_image_1" class="form-label" >Image 1</label>
                                                {{-- Deklarasi Javascript untuk preview --}}
                                                <img class="img-preview-petugas-1 img-fluid mb-3 col-sm-3">
                                                <input class="form-control @error('petugas_image_1') is-invalid @enderror" type="file" id="petugas_image_1" name="petugas_image_1" onchange="previewPetugas_image_1();">
                                                @error('petugas_image_1')
                                                <div class="invalid-feedback">
                                                {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                        
                                        {{-- Upload Image 2 --}}
                                        <div class="mb-3 upload_img_2">
                                            <label for="petugas_image_2" class="form-label" >Image 2</label>
                                            {{-- Deklarasi Javascript untuk preview --}}
                                            <img class="img-preview-petugas-2 img-fluid mb-3 col-sm-3">
                                            <input class="form-control @error('petugas_image_2') is-invalid @enderror" type="file" id="petugas_image_2" name="petugas_image_2" onchange="previewPetugas_image_2();">
                                            @error('petugas_image_2')
                                            <div class="invalid-feedback">
                                            {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                        
                                        {{-- Upload Image 3 --}}
                                        <div class="mb-3 upload_img_3">
                                            <label for="petugas_image_3" class="form-label" >Image 3</label>
                                            {{-- Deklarasi Javascript untuk preview --}}
                                            <img class="img-preview-petugas-3 img-fluid mb-3 col-sm-3">
                                            <input class="form-control @error('petugas_image_3') is-invalid @enderror" type="file" id="petugas_image_3" name="petugas_image_3" onchange="previewPetugas_image_3();">
                                            @error('petugas_image_3')
                                            <div class="invalid-feedback">
                                            {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                            <button type="submit" class="btn btn-primary float-left">Proses</button>                
                                </form>
                            </div> -->
                        </div> <!-- End Tab-content-->
                    </div>
                </div> <!-- Card -->
            </div> <!-- Col -->
        <!--</div> --> <!-- So pake Row dari detail -->
@endif    







<!-- Pengaduan Sedang Diproses-->
@if($pengaduan->status == 'Pengaduan Sedang Diproses')
    <!-- Row-->
    <!-- <div class="row"> -->
            <div class="col-md-6 my-3">
                <div class="card">
                    <div class="card-header pb-0 p-3 bg-gradient-light">
                        <h4 class="text-dark text-center font-weight-bold text-uppercase">Proses Pengaduan</h4>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="nav-tabContent">
                                <form method="post" action="{{ route('jaringan.proses.store', $pengaduan->kode) }}" enctype="multipart/form-data">
                                    {{-- Using enctype so this form can handle file --}}
                                @csrf
                                
                                        {{-- keterangan --}}
                                        <div class="mb-3 mt-3">
                                            <label for="keterangan" class="form-label">keterangan</label>
                                            @error('keterangan')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            <input id="keterangan" type="hidden" name="keterangan" value="{{ old('keterangan') }}">
                                            <trix-editor input="keterangan"></trix-editor>
                                        </div>  
                        
                                        {{-- Klik ini baru mo muncul yang upload image input --}}
                                        <div class="d-flex justify-content-center ">
                                            <a  class="badge bg-primary mx-1" onclick="display_petugas_img_1()">Add Image 1</a>
                                            <a  class="badge bg-primary mx-1" onclick="display_petugas_img_2()">Add Image 2</a>
                                            <a  class="badge bg-primary mx-1" onclick="display_petugas_img_3()">Add Image 3</a>
                                        </div>
                                            {{-- Upload Image  1--}}
                                            <div class="mb-3 upload_img_1">
                                                <label for="petugas_image_1" class="form-label" >Image 1</label>
                                                {{-- Deklarasi Javascript untuk preview --}}
                                                <img class="img-preview-petugas-1 img-fluid mb-3 col-sm-3">
                                                <input class="form-control @error('petugas_image_1') is-invalid @enderror" type="file" id="petugas_image_1" name="petugas_image_1" onchange="previewPetugas_image_1();">
                                                @error('petugas_image_1')
                                                <div class="invalid-feedback">
                                                {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                        
                                    {{-- Upload Image 2 --}}
                                    <div class="mb-3 upload_img_2">
                                        <label for="petugas_image_2" class="form-label" >Image 2</label>
                                        {{-- Deklarasi Javascript untuk preview --}}
                                        <img class="img-preview-petugas-2 img-fluid mb-3 col-sm-3">
                                        <input class="form-control @error('petugas_image_2') is-invalid @enderror" type="file" id="petugas_image_2" name="petugas_image_2" onchange="previewPetugas_image_2();">
                                        @error('petugas_image_2')
                                        <div class="invalid-feedback">
                                        {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                        
                                    {{-- Upload Image 3 --}}
                                    <div class="mb-3 upload_img_3">
                                        <label for="petugas_image_3" class="form-label" >Image 3</label>
                                        {{-- Deklarasi Javascript untuk preview --}}
                                        <img class="img-preview-petugas-3 img-fluid mb-3 col-sm-3">
                                        <input class="form-control @error('petugas_image_3') is-invalid @enderror" type="file" id="petugas_image_3" name="petugas_image_3" onchange="previewPetugas_image_3();">
                                        @error('petugas_image_3')
                                        <div class="invalid-feedback">
                                        {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="d-flex justify-content-center mt-3">
                                        <button type="submit" class="btn btn-primary ">Buat Pengaduan</button>
                                    </div>
                                </form>
                        </div> <!-- End Tab-content-->
                    </div>
                </div> <!-- Card -->
            </div> <!-- Col -->
        <!-- </div> --> <!-- So pake  Row dari template desain -->
@endif    
