<?php

use App\Exports\PengaduansExport;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\JaringanController;
use App\Http\Controllers\ServerController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\PengaduansExportController;
use App\Http\Middleware\Cek_Login;
use App\Models\Pengaduan;
use App\Models\Tujuan;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
  
    // ======== Chart Pie Total Pengaduan ======================= 
  $jaringan = Pengaduan::where('tujuan_id','1')->count();
  $server = Pengaduan::where('tujuan_id', '2' )->count();
  $si = Pengaduan::where('tujuan_id', '3' )->count();
  $web_unima = Pengaduan::where('tujuan_id', '4' )->count();
  $lms = Pengaduan::where('tujuan_id', '5' )->count();
  $ijazah = Pengaduan::where('tujuan_id', '6' )->count();
  $slip = Pengaduan::where('tujuan_id', '7' )->count();

// Chart Pengaduan bar
// Cari pake tahun ini whereYear('updated_at', Carbon::now()->year)
// Cari pake bulan ini whereMonth('updated_at', Carbon::now()->month)
$masuk = Pengaduan::where('status','Pengaduan Masuk')->whereYear('updated_at', Carbon::now()->year)->whereMonth('updated_at', Carbon::now()->month)->count();
$diverifikasi = Pengaduan::where('status','Pengaduan Sedang Diverifikasi')->whereYear('updated_at', Carbon::now()->year)->whereMonth('updated_at', Carbon::now()->month)->whereYear('updated_at', Carbon::now()->year)->whereMonth('updated_at', Carbon::now()->month)->count() ;
$diproses = Pengaduan::where('status','Pengaduan Sedang Diproses')->whereYear('updated_at', Carbon::now()->year)->whereMonth('updated_at', Carbon::now()->month)->count();
$ditolak = Pengaduan::where('status','Pengaduan Ditolak')->whereYear('updated_at', Carbon::now()->year)->whereMonth('updated_at', Carbon::now()->month)->count();
$selesai = Pengaduan::where('status','Pengaduan Selesai')->whereYear('updated_at', Carbon::now()->year)->whereMonth('updated_at', Carbon::now()->month)->count();

// Chart Pengaduan Bulan ini
$current_jaringan = Pengaduan::where('tujuan_id','1')->whereYear('updated_at', Carbon::now()->year)->whereMonth('updated_at', Carbon::now()->month)->count();
$current_server = Pengaduan::where('tujuan_id','2')->whereYear('updated_at', Carbon::now()->year)->whereMonth('updated_at', Carbon::now()->month)->count();
$current_si = Pengaduan::where('tujuan_id','3')->whereYear('updated_at', Carbon::now()->year)->whereMonth('updated_at', Carbon::now()->month)->count();
$current_webunima = Pengaduan::where('tujuan_id','4')->whereYear('updated_at', Carbon::now()->year)->whereMonth('updated_at', Carbon::now()->month)->count();
$current_lms = Pengaduan::where('tujuan_id','5')->whereYear('updated_at', Carbon::now()->year)->whereMonth('updated_at', Carbon::now()->month)->count();
$current_ijazah = Pengaduan::where('tujuan_id','6')->whereYear('updated_at', Carbon::now()->year)->whereMonth('updated_at', Carbon::now()->month)->count();
$current_slip = Pengaduan::where('tujuan_id','7')->whereYear('updated_at', Carbon::now()->year)->whereMonth('updated_at', Carbon::now()->month)->count();

    return view('welcome',compact(
        'jaringan','server','si','web_unima','lms','ijazah','slip',
        'masuk','diverifikasi','diproses','ditolak','selesai',
        'current_jaringan','current_server','current_si','current_webunima','current_lms','current_ijazah','current_slip'
    ));
});


// Kalo yang login nda ad akses direct ke sini
    Route::get('cannot-access',[AuthController::class,'cannot_access'])->name('cannot_access');

// Controller Auth
    Route::get('login',[AuthController::class,'index'])->name('login');
    Route::post('authenticate',[AuthController::class,'authenticate'])->name('authenticate');
    Route::post('logout',[AuthController::class,'logout'])->name('logout');


   // Edit Tujuan bisa diakses semua
        // route::get('/admin/tujuan/edit/{pengaduan:kode}',[AdminController::class,'tujuan_store'])->name('admin.tujuan.store'); 
            route::post('/admin/tujuan/{pengaduan:kode}',[AdminController::class,'tujuan_store'])->name('admin.tujuan.store'); 

// Route Group untuk yang login
    // =============================== Admin Page ================================= 
        Route::group(['middleware' => ['auth','cek_level:admin,petugas']], (function (){
            // Route::middleware(['auth','cek_level:admin'])->group (function (){
            
            // Register Admin yang lain || Controller Auth
                Route::get('register', [AuthController::class, 'register'])->name('register');
                Route::post('register', [AuthController::class, 'store'])->name('register.store');
            // Admin Pages
                Route::get('/admin/pages',[AdminController::class,'pages'])->name('admin.pages');
                Route::delete('/auth/destroy/{user:email}',[AuthController::class,'destroy'])->name('auth.destroy');

            // Hapus data pengaduan 
                Route::delete('admin/destroy/{pengaduan:kode}',[AdminController::class,'destroy'])->name('admin.destroy');    

            // index & detail
                Route::get('admin',[AdminController::class,'index'])->name('admin.index');    
                Route::get('admin/detail/{pengaduan:kode}',[AdminController::class,'detail'])->name('admin.detail');    
                
            // Pengaduan Masuk Proses
                route::get('/admin/masuk/{pengaduan:kode}',[AdminController::class,'masuk'])->name('admin.masuk'); 
                route::post('/admin/masuk/{pengaduan:kode}',[AdminController::class,'masuk_store'])->name('admin.masuk.store'); 

            // Email ke petugas
                route::post('/admin/email-to-petugas/{pengaduan:kode}',[AdminController::class,'email_petugas'])->name('email.petugas');

            // Edit Tujuan pindah keatas karena bisa diakses semua
                // route::get('/admin/tujuan/edit/{pengaduan:kode}',[AdminController::class,'tujuan_store'])->name('admin.tujuan.store'); 
                // route::post('/admin/tujuan/{pengaduan:kode}',[AdminController::class,'tujuan_store'])->name('admin.tujuan.store'); 

            // Export
                Route::get('/admin/export/excel', [PengaduansExportController::class,'excel'])->name('export.excel');

            // Admin Section
                // Semua
                route::get('admin/section/semua',[AdminController::class,'section_semua'])->name('admin.section.semua');
                
            }));
             

    // =================================== Jaringan Page ==================================
        Route::group(['middleware' => ['auth','cek_level:jaringan,admin']], (function (){
            // Route::middleware(['auth','cek_level:jaringan,admin'])->group (function (){
            // index & detail jaringan
                route::get('jaringan',[JaringanController::class,'index'])->name('jaringan.index');
                route::get('jaringan/detail/{pengaduan:kode}',[JaringanController::class,'detail'])->name('jaringan.detail');

                // Update (Pengaduan Sedang Diverifikasi)
                route::post('jaringan/update/{pengaduan:kode}',[JaringanController::class,'update_store'])->name('jaringan.update.store');
                
                // Proses (Pengaduan Sedang Diproses)
                route::post('jaringan/proses/{pengaduan:kode}',[JaringanController::class,'proses_store'])->name('jaringan.proses.store');
           
            // Section
                // Semua
                route::get('jaringan/section/semua',[JaringanController::class,'section_semua'])->name('jaringan.section.semua');

            }));


    // =================================== Server Page ==================================
        Route::group(['middleware' => ['auth','cek_level:server,admin']], (function (){
            // index & detail Server
                route::get('server',[ServerController::class,'index'])->name('server.index');
                route::get('server/detail/{pengaduan:kode}',[ServerController::class,'detail'])->name('server.detail');

                // Update (Pengaduan Sedang Diverifikasi)
                route::post('server/update/{pengaduan:kode}',[ServerController::class,'update_store'])->name('server.update.store');
                
                // Proses (Pengaduan Sedang Diproses)
                route::post('server/proses/{pengaduan:kode}',[ServerController::class,'proses_store'])->name('server.proses.store');
           
            // Section
                // Semua
                route::get('server/section/semua',[ServerController::class,'section_semua'])->name('server.section.semua');

            }));

  

// ======== POV Visitor ===========

    // Pengaduan Email Verifying alternative 
        // Verifikasi email (to create pengaduan)
        Route::get('pengaduan', [PengaduanController::class,'index'])->name('pengaduan.index');
        Route::post('pengaduan', [PengaduanController::class,'verify'])->name('pengaduan.verify-email');
        
        // Resend link verifikasi (to create pengaduan)
        Route::get('pengaduan/check', [PengaduanController::class,'check'])->name('pengaduan.check');
        Route::post('pengaduan/check', [PengaduanController::class,'resend_email'])->name('pengaduan.resend_email');

    //  untuk membuat pengaduan harus lewat email yang sudah dimasukkan
        Route::get('pengaduan/create/{pengaduan:token}', [PengaduanController::class,'create'])->name('pengaduan.create');
        Route::post('pengaduan/create/{pengaduan:token}', [PengaduanController::class,'store'])->name('pengaduan.store');

    // Search Pengaduan
        Route::get('pengaduan/search',[PengaduanController::class,'search'])->name('pengaduan.search');
        
    // Rating
        Route::get('pengaduan/detail/{pengaduan:kode}',[PengaduanController::class,'detail'])->name('pengaduan.detail');
        Route::post('Pengaduan/detail/{pengaduan:kode}', [PengaduanController::class,'detail_store'])->name('pengaduan.detail.store');

