

@extends('_layouts.master')

@section('header')
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
@endsection

@section('content')
<div class="container my-2">
    <div class="card">
        <div class="card-header text-center pb-0 p-3">
            <h4>Admin : {{ auth()->user()->name }}</h4>
        </div>
        <br>
        <nav>
            <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
            <button class="nav-link active bg-gradient-secondary " id="nav-1-tab" data-bs-toggle="tab" data-bs-target="#nav-1" type="button" role="tab" aria-controls="nav-1" aria-selected="true"><i class="ni ni-single-02"></i> Data</button>
            <button class="nav-link " id="nav-2-tab" data-bs-toggle="tab" data-bs-target="#nav-2" type="button" role="tab" aria-controls="nav-2" aria-selected="false"><i class="ni ni-folder-17"></i> Register Admin</button>
            </div>
        </nav>
        <div class="card-body">
            <div class="tab-content" id="nav-tabContent">
                <!-- Isi Tab 1-->
                <div class="tab-pane fade show active" id="nav-1" role="tabpanel" aria-labelledby="nav-1-tab">
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No Handphone</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">level</th>
                                    <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($users as $user) 
                                        <tr>
                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-xs ps-3">{{ ++$i }}</h6>
                                                </div>
                                            </td>
    
                                            <!-- Email-->
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $user->email }}</p>
                                                </td>
    
                                            <!-- Nama -->
                                                <td class="align-middle text-center text-sm">
                                                    <p class="text-xs font-weight-bold mb-0">{{ $user->name }}</p>
                                                </td>

                                            <!-- phone -->
                                                <td class="align-middle text-center text-sm">
                                                    <p class="text-xs font-weight-bold mb-0">{{ $user->phone }}</p>
                                                </td>
    
                                            <!-- level -->
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold">{{ $user->level }}</span>
                                                </td>
    
                                            <!-- Action-->
                                                <td class="align-middle">
                                                    <form action="{{ route('auth.destroy', $user->email) }}" method="post" >
                                                        @method('delete')
                                                        @csrf
                                                        <button type="submit" class="border-0 " onclick="return confirm('Yakin mau hapus data ?')">
                                                            <div class="d-flex justify-content-center badge bg-danger">
                                                                <i class="fa fa-solid fa-trash"></i>
                                                            </div>
                                                        </button>
                                                    </form>
                                                </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center"><p class="font-weight-bold my-2">Tidak ada pengaduan </p></td>
                                        </tr>
                                    @endforelse
                                </tbody>
                                <!-- Pagination Section -->
                                <div class="d-flex justify-content-center my-2">{{ $users->onEachSide(2)->links() }}</div>
    
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Isi tab 2 -->
                <div class="tab-pane fade" id="nav-2" role="tabpanel" aria-labelledby="nav-2-tab">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-6">
                            <h1 class="h3 mb-3 fw-normal text-center">Tambah admin</h1>
                            <form action="{{ route('register.store') }}" method="post">
                                @csrf
                               {{-- Tujuan Admin --}}
                                    <div class="mb-3" id="input_tujuan">
                                        <label for="tujuan" class="form-label"></label>
                                        <select class="form-select" name="level" >
                                        <option>Pilih Role</option>
                                        <option value="petugas">Petugas</option>
                                        <option value="verifikator"  >Verifikator</option>
                                        <option value="jaringan" >Jaringan</option>
                                        <option value="server" >Server</option>
                                        <option value="sistem_informasi" >Sistem Informasi</option>
                                        <option value="website_unima" >Website UNIMA</option>
                                        <option value="lms" >Learning Management System</option>
                                        <option value="ijazah" >Ijazah</option>
                                        <option value="slip" >Slip</option>
                                        <option value="lain_lain" >Lain-lain</option>
                                        </select>
                                        @error('level')
                                        <p class="text-danger">Pilih Role</p>
                                        @enderror
                                    </div>  

                                {{-- Checkbox --}}
                                <div id="show_akses">
                                    <div class="form-check my-3">
                                    <label class="custom-control-label" for="customCheck1">Pilih Akses Petugas</label> <br>
                                        {{-- <input type="hidden" name="can_jaringan" value="0"><br> --}}
                                        <input type="checkbox" name="can_jaringan" value="1"> Jaringan <br>

                                        {{-- <input type="hidden" name="can_server" value="0"><br> --}}
                                        <input type="checkbox" name="can_server" value="1"> Server <br>

                                        {{-- <input type="hidden" name="can_sistem_informasi" value="0"><br> --}}
                                        <input type="checkbox" name="can_sistem_informasi" value="1"> Sistem Informasi <br>

                                        {{-- <input type="hidden" name="can_website_unima" value="0"><br> --}}
                                        <input type="checkbox" name="can_website_unima" value="1"> Website Unima <br>

                                        {{-- <input type="hidden" name="can_lms" value="0"><br> --}}
                                        <input type="checkbox" name="can_lms" value="1"> Learning Management System <br>

                                        {{-- <input type="hidden" name="can_ijazah" value="0"><br> --}}
                                        <input type="checkbox" name="can_ijazah" value="1"> Ijazah <br>
                                        
                                        {{-- <input type="hidden" name="can_slip" value="0"><br> --}}
                                        <input type="checkbox" name="can_slip" value="1"> Slip <br>

                                        {{-- <input type="hidden" name="can_lain_lain" value="0"><br> --}}
                                        <input type="checkbox" name="can_lain_lain" value="1"> Lain-lain <br>

                                        {{-- <input type="checkbox" name="can[]" value="1"> Jaringan <br>
                                        <input type="checkbox" name="can[]" value="1"> Server <br>
                                        <input type="checkbox" name="can[]" value="1"> Sistem Informasi <br>
                                        <input type="checkbox" name="can[]" value="1"> Website Unima <br>
                                        <input type="checkbox" name="can[]" value="1"> Learning Management System <br>
                                        <input type="checkbox" name="can[]" value="1"> Ijazah <br>
                                        <input type="checkbox" name="can[]" value="1"> Slip <br>
                                        <input type="checkbox" name="can[]" value="1"> Lain-lain <br> --}}
                                    </div>
                                </div>
                            
                                {{-- Name --}}
                                <div class="form-floating my-2">
                                <input type="text" name="name" class="form-control @error('name')is-invalid @enderror " id="name" placeholder="Name" required value="{{ old('name') }}">
                                <label for="name">Name</label>
                                @error('name')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                @enderror
                                </div>
                            
                                {{-- Email --}}
                                <div class="form-floating my-2 ">
                                    <input type="email"   name="email" class="form-control  @error('email')is-invalid @enderror" id="email" placeholder="email" required value="{{ old('email') }}">
                                    <label for="email">Email</label>
                                    @error('email')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                @enderror
                                </div>
                            
                                {{-- Phone --}}
                                <div class="form-floating my-2">
                                <input type="tel"    name="phone" class="form-control @error('phone')is-invalid @enderror" id="phone" placeholder="phone" required value="{{ old('phone') }}">
                                <label for="phone">Phone</label>
                                @error('phone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                                </div>
                            
                            {{-- Password --}}
                                <div class="form-floating my-2">
                                <input type="password" name="password" class="form-control  @error('password')is-invalid @enderror" id="password" placeholder="Password">
                                <label for="password">Password</label>
                                @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                                </div>
                            
                                <button class="w-100 btn btn-lg btn-primary" type="submit">Tambah Admin</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!--Container -->
@endsection


{{-- @section('javascript')
@endsection --}}

@push('script')
    <script>
    
    // $('#input_tujuan').filter(':selected').val()
    // $('#show_akses').hide()
    // $('#input_tujuan').on('change', function() {
    //     console.log($(this).find(":selected").val())
    //     if(val == 'petugas'){$('#show_akses').show()} 
    //     else{$('#show_akses').hide()}
    // });

    $('#show_akses').hide()
    $('#input_tujuan').on('change', function() {
        const val = $(this).find(":selected").val()
        if(val == 'petugas'){$('#show_akses').show()} 
        else{$('#show_akses').hide()}
    });

    </script>
@endpush