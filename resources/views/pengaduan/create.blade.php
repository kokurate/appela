@extends('pengaduan.layouts.master')

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
<div class="container my-5">
  <div class="row d-flex justify-content-center">
    <div class="col-lg-7 text-center rounded shadow-lg p-3 mb-5 bg-body">
      <img src="/logo.jpg" alt="logo unima" class="rounded mx-auto d-block my-2" width="100px">
      <h4 style="color:rgb(99, 99, 99)" >Buat Pengaduan</h4>
      <p class="my-2" style="color: #ff0000" >simbol * wajib diisi</p>
      <hr class="mb-6">
      <!-- Open Form -->
      <div class="d-flex justify-content-center">
        <di v class="col-11 text-left">
          <form method="post" action="{{ $token }}" enctype="multipart/form-data">
            @csrf
            <!-- Email -->
              <div class="mb-3">
                <h5 style="color:rgb(99, 99, 99) ">Email : {{ $pengaduan->email }}</h5>
              </div> 
            <!-- Nama -->
              <div class="mb-3">
                <label for="nama" class="form-label"><span style="color: #ff0000">*</span> Nama</label>
                <input type="text" 
                class="form-control  @error('nama') is-invalid @enderror" 
                id="nama" name="nama" 
                value="{{ old('nama') }}"
                autocomplete="off"
                required >
                <!--End Input --> 
                @error('nama')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div> 
            <!-- Judul -->
              <div class="mb-3">
                <label for="judul" class="form-label"><span style="color: #ff0000">*</span> Judul</label>
                <input type="text" 
                class="form-control @error('judul') is-invalid @enderror" 
                id="judul" name="judul" 
                value="{{ old('judul') }}" 
                autocomplete="off"
                required > 
                <!--End Input --> 
                @error('judul')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
            <!-- Isi Pengaduan -->
              <div class="mb-3">
                <label for="isi" class="form-label"><span style="color: #ff0000">*</span> isi</label>
                @error('isi')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
                <input id="isi" 
                type="hidden" 
                name="isi" 
                value="{{ old('isi') }}" >
                <!-- End Input -->
                <trix-editor input="isi"></trix-editor>
              </div>  
            <!-- Tujuan Pengaduan -->
              <div class="mb-3">
                <label for="tujuan" class="form-label"><span style="color: #ff0000">*</span> Tujuan Pengaduan</label>
                <select class="form-select" name="tujuan_id" >
                  <option selected>Pilih Tujuan Pengaduan Anda</option>
                @foreach ($tujuan as $t)
                <!-- Jika old tujuan_id sama dengan request tujuan_id sebelumnya maka option kasih selected -->
                  @if(old('tujuan_id') == $t->id)
                  <option value="{{ $t->id }}" selected>{{ $t->nama }}</option>
                  @else
                  <!-- Jika tidak sama maka cetak tanpa selected -->
                  <option value="{{ $t->id }}" >{{ $t->nama }}</option>
                  @endif
                @endforeach
                </select>
                @error('tujuan_id')
                <p class="text-danger">Pilih Tujuan Pengaduan</p>
                  @enderror
              </div>  
            <!-- Upload Image  1-->
              <div class="mb-3">
                <label for="visitor_image_1" class="form-label" ><span style="color: #ff0000">*</span> Image</label>
                {{-- Deklarasi Javascript untuk preview --}}
                <img class="img-preview-visitor-1 img-fluid mb-3 col-sm-3">
                <input 
                class="form-control @error('visitor_image_1') is-invalid @enderror" 
                type="file" id="visitor_image_1" 
                name="visitor_image_1" 
                onchange="previewVisitor_image_1();">
                <!-- End Input -->
                @error('visitor_image_1')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
            </div>
              {{-- Klik ini baru mo muncul yang upload image input --}}
              <p  class="badge bg-primary" onclick="display_visitor_2()">Tambah gambar 2</p>
              <p  class="badge bg-primary" onclick="display_visitor_3()">Tambah gambar 3</p>
            
              <!-- Upload Image 2 -->
            <div class="mb-3 upload_img_2" id="upload_img_2">
              <label for="visitor_image_2" class="form-label" >Image 2</label>
              {{-- Deklarasi Javascript untuk preview --}}
              <img class="img-preview-visitor-2 img-fluid mb-3 col-sm-3">
              <input class="form-control 
              @error('visitor_image_2') is-invalid @enderror" 
              type="file" id="visitor_image_2" 
              name="visitor_image_2" 
              onchange="previewVisitor_image_2();" >
              @error('visitor_image_2')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror

            <!-- Upload Image 3-->
            <div class="mb-3 upload_img_3" id="upload_img_3">
                <label for="visitor_image_3" class="form-label" >Image 3</label>
                {{-- Deklarasi Javascript untuk preview --}}
                <img class="img-preview-visitor-3 img-fluid mb-3 col-sm-3">
                <input class="form-control 
                @error('visitor_image_3') is-invalid @enderror" 
                type="file" id="visitor_image_3" 
                name="visitor_image_3" 
                onchange="previewVisitor_image_3();" >
                @error('visitor_image_3')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
            </div>
          </div>

          <button type="submit" class="btn btn-primary float-right">Buat Pengaduan</button>
          </form>
        </di> <!-- End Col 6 -->
      </div> <!-- End-flex justify-content-center-->
    </div> <!-- End col = text-center rounded shadow-lg p-3 mb-5 bg-body  -->
  </div> <!-- End Row = d-flex justify-content-center-->
</div> <!-- End Container -->
@endsection

@section('javascript')
        {{-- Menghilangkan fungsi dari attach file pada trix editor --}}
    <script>
        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault()
        })

        // Preview Image 1
            function previewVisitor_image_1(){
                const image = document.querySelector('#visitor_image_1');
                const imgPreview = document.querySelector('.img-preview-visitor-1');

                imgPreview.style.display = 'block';

                const oFReader = new FileReader();
                oFReader.readAsDataURL(image.files[0]);

                oFReader.onload = function(oFREvent){
                    imgPreview.src = oFREvent.target.result;
                }
            }

        // Preview Image 2
            function previewVisitor_image_2(){
                const image = document.querySelector('#visitor_image_2');
                const imgPreview = document.querySelector('.img-preview-visitor-2');

                imgPreview.style.display = 'block';

                const oFReader = new FileReader();
                oFReader.readAsDataURL(image.files[0]);

                oFReader.onload = function(oFREvent){
                    imgPreview.src = oFREvent.target.result;
                }
            }

        // Preview Image 3
            function previewVisitor_image_3(){
                const image = document.querySelector('#visitor_image_3');
                const imgPreview = document.querySelector('.img-preview-visitor-3');

                imgPreview.style.display = 'block';

                const oFReader = new FileReader();
                oFReader.readAsDataURL(image.files[0]);

                oFReader.onload = function(oFREvent){
                    imgPreview.src = oFREvent.target.result;
                }
            }
          
        //Trigger Function
        img_2_visitor = document.querySelector('.upload_img_2');
        img_3_visitor = document.querySelector('.upload_img_3');

        img_2_visitor.style.display =  "none";
        img_3_visitor.style.display =  "none";


        function display_visitor_2(){
          if (img_2_visitor.style.display === "none") {
            img_2_visitor.style.display = "block";
  		    } else {
            img_2_visitor.style.display = "none";
  		    }
        }
        
        function display_visitor_3(){
            if (img_3_visitor.style.display === "none") {
            img_3_visitor.style.display = "block";
          } else {
            img_3_visitor.style.display = "none";
          }
        }
        </script>
@endsection
