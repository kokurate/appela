@extends('pengaduan.layouts.master')
@section('content')

      {{-- Flash data --}}
  @if(session()->has('berhasil'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('berhasil') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif


  {{-- Flash data --}}
  @if(session()->has('gagal'))
  <div class="alert alert-danger d-flex align-items-center" role="alert">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
    <div>
      {{ session('gagal') }}
    </div>
  </div>
  @endif

<!-- Start Footer Area -->
<footer class="footer mt-0">
  <div class="footer-top">
      <div class="container">
          <div class="row align-items-center justify-content-center">
              <div class="col-lg-4 col-12">
                  <div class="download-button">
                      <div id="aktivasi-email" class="single-footer newsletter">
                          <h3>Kirim Ulang Email
                              <hr width="75%">
                          </h3>
                          <p class="d-flex text-left">Jika kalian sudah mendaftarkan email kalian tetapi tidak ada pesan yang masuuk di email. Silahkan meminta untuk mengirimkan ulang dengan memasukkan email yang kalian sudah registrasikan </p>
                            <div class="row my-0">
                                <form action="{{ route('pengaduan.resend_email') }}" method="post" class=" form-inline">
                                  @csrf
                                    <div class="input-group-text">
                                        <div class="col-8">
                                        
                                            <input type="text" 
                                            name="email" 
                                            value="{{ old('email') }}"
                                            placeholder="Email unima anda" 
                                            class="common-input"
                                            onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'Email Anda'" 
                                            oninput="this.value = this.value.replace(/[^a-zA-Z0-9#-+_.]/g, '').replace(/(\..*)\./g, '$1');" required >
                                        </div>
                                        <div class="col-4 my-0">
                                                <span  id="basic-addon2" style="color: black;">@unima.ac.id</span>
                                        </div>
                                    </div>
                                    @error('email')
                                    <div class="is-invalid">
                                        <p style="color: red">{{ $message }}</p>
                                    </div>
                                    @enderror
                                      
                                <br>
                                <div class="button ">
                                    <button class="btn" ><i class="lni lni-key"></i> Resend Email </button>
                                </div>
                            </form>
                          </div>
                
                        <br>
                      </div>
                  </div>
              </div>

              <!-- Supaya ada space kasih seolah-olah ditengah ada isi -->
              <div class="col-lg-2 col-12">
              </div>


              <div class="col-lg-4 col-12">
                  <div class="download-text">
                      {{-- <h3 class="">You Are Ready To Go >></h3> --}}
                      <img src="/logoappela.png" class="img-fluid  " alt="Responsive image" width="1000px" >
                    
                  </div>
                  <h3>Tentang APL</h3>
                  <div class="contact-address mt-2">
                      <p>Aplikasi Pengaduan Layanan <strong>(APL)</strong> merupakan aplikasi yang menangani pengaduan-pengaduan terhadap layanan yang disediakan oleh Pusat Komputer, Universitas Negeri Manado  </p>
                      <ul class="contact-address text-left mt-2">
                          <li><strong>Alamat:</strong> Jl. Kampus Unima, Kelurahan Tonsaru, Kecamatan Tondano Selatan</li>
                          <li><strong>Email:</strong> puskom@unima.ac.id</li>
                          <li><strong>Jam Kerja:</strong> Senin - Jumat 8:30 AM - 6:30 PM</li>
                      </ul>
                  </div>



              
              </div>

                
          </div>
      </div>
  </div>
</footer>  
<!--/ End Footer Middle -->
  @endsection