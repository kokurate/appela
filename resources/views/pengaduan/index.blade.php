@extends('pengaduan.layouts.master')
@section('content')

<!-- Start Pricing Table Area -->
  <br>
      <div class="container mt-15">
          <div class="row">
              <div class="col-12">
                  <div class="section-title">
                      <h2 class="wow fadeInUp" data-wow-delay=".4s">Cara Membuat Pengaduan melalui APL</h2>
                      <!-- <p class="wow fadeInUp" data-wow-delay=".6s">There are many variations of passages of Lorem
                          Ipsum available, but the majority have suffered alteration in some form.</p>
                      -->
                  </div>
              </div>
          </div>
      </div>


    <!-- Start Apply Process Area -->
    <section class="apply-process section">
      <div class="container my-0">
          <div class="row">
              <div class="col-lg-4 col-md-4 col-12">
                  <div class="process-item">
                      <i class="lni lni-delivery"></i>
                      <h4>1. Verifikasi Email</h4>
                      <p>Langkah pertama yang harus dilakukan adalah registrasikan email.
                          Email yang bisa digunakan hanyalah email UNIMA dengan domain "@unima.ac.id" diluar domain ini tidak akan bisa membuat pengaduan.
                      </p>
                  </div>
              </div>
              <div class="col-lg-4 col-md-4 col-12">
                  <div class="process-item">
                      <i class="lni lni-pencil-alt"></i>
                      <h4>2. Buat Pengaduan</h4>
                      <p>Selanjutnya anda bisa membuat pengaduan dengan memasukkan data-data yang diperlukan di dalam form yang ada melalui link yang sudah dikirimkan ke email yang anda registrasikan sebelumnya</p>
                  </div>
              </div>
              <div class="col-lg-4 col-md-4 col-12">
                  <div class="process-item">
                      <i class="lni lni-lock"></i>
                      <h4>3. Cek Email</h4>
                      <p>Setelah anda berhasil membuat pengaduan. Anda akan mendapatkan kode pengaduan yang dikirimkan ke email anda. Demi alasan keamanan data pengaduan, jangan diberikan kepada siapapun kode pengaduan ini</p>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!--/ End Apply Process Area -->

    <section class="apply-process-2 section">
      <div class="container my-10">
          <div class="row my-10">
              <div class="col-lg-4 col-md-4 col-12">
                  <div class="process-item-2">
                  <i class="lni lni-search"></i>
                  <h4>4. Cari Pengaduan</h4>
                  <p>Masukkan kode pengaduan yang dikirimkan ke email kalian sebelumnya untuk melihat detail pengaduan kalian</p>
                  </div>
                  <br>
              </div>
              {{--  --}}
              <div class="col-lg-4 col-md-4 col-12">
                  <div class="process-item-2">
                  <i class="lni lni-revenue"></i>
                  <h4>5. Berikan Tanggapan</h4>
                  <p>Setelah pengaduan kalian diselesaikan, jangan lupa untuk memberikan tanggapan dan juga rating</p>
                    </div>
                    <br>
                </div>
              <div class="col-lg-4 col-md-4 col-12">
                  <div class="process-item-2">
                  <i class="lni lni-arrow-down-circle"></i>
                  <h4>Silahkan registrasi terlebih dahulu email anda di bawah ini</h4>
                  <p></p>
                    </div>
                </div>

          </div>
      </div>
<!-- Id aktivasi email disini karena dia ta makan header-->
    <div id="aktivasi-email"></div>
  </section>

  <hr>

      <!-- Start Footer Area -->
      <footer class="footer mt-0">
          <div class="footer-top">
              <div class="container">
                  <div class="row align-items-center justify-content-center">
                      <div class="col-lg-4 col-12">
                          <div class="download-button">
                              <div class="single-footer newsletter">
                                  <h3>Registrasi Email Anda
                                      <hr width="75%">
                                  </h3>
                                  <p>Registrasi email anda jika ingin membuat pengaduan</p>
                                    <div class="row my-0">
                                        <form action="{{ route('pengaduan.verify-email') }}" method="post" class=" form-inline">
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
                                                <p style="color: red" class="d-flex text-left">{{ $message }}</p>
                                            </div>
                                            @enderror
                                              
                                        <br>
<!-- Id kirim ulang email disini karena dia t makan header di atas so itu nd dapa lia -->
                                  <div id="kirim-ulang-link"></div>
                                        <div class="button ">
                                            <button class="btn" ><i class="lni lni-key"></i> Registrasi Email! </button>
                                        </div>
                                    </form>
                                  </div>
                        
                              
                                <br>

                        
                                <hr width="75%" >
                              <h3 class="buat-pengaduan" style="margin-bottom: 10px">Kirim Ulang Link</h3>
                              <p>Jika tidak ada pesan yang masuk di email anda. Silahkan kirim ulang dengan klik button di bawah ini</p>
                              <br>
                              <div class="button mb-25">
                                  <a class="btn" href="{{ route('pengaduan.check') }}"><i class="lni lni-circle-plus"></i>Resend Link</a>
                              
                              </div>
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


<!-- For Sweet Alert 2-->
@section('javascript')
  @error('email')
    <script>
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Email ini sedang melakukan Pengaduan. Tunggu pengaduan selesai untuk membuat pengaduan kembali',
        footer: '<a href="#aktivasi-email">Cek Kesalahan</a>'
      })
    </script>
  @enderror
@endsection