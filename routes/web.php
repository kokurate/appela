<?php

use App\Exports\PengaduansExport;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\IjazahController;
use App\Http\Controllers\JaringanController;
use App\Http\Controllers\LearningManagementSystemController;
use App\Http\Controllers\ServerController;
use App\Http\Controllers\SistemInformasiController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\PengaduansExportController;
use App\Http\Controllers\SlipController;
use App\Http\Controllers\WebsiteUnimaController;
use App\Http\Controllers\LainlainController;
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
  
    $pengaduan = Pengaduan::latest()->take(5)->get();

// if(Pengaduan::whereNotNull('status')){
    // ======== Chart Pie Total Pengaduan ======================= 
    $jaringan = Pengaduan::where('tujuan_id','1')->count();
    $server = Pengaduan::where('tujuan_id', '2' )->count();
    $si = Pengaduan::where('tujuan_id', '3' )->count();
    $web_unima = Pengaduan::where('tujuan_id', '4' )->count();
    $lms = Pengaduan::where('tujuan_id', '5' )->count();
    $ijazah = Pengaduan::where('tujuan_id', '6' )->count();
    $slip = Pengaduan::where('tujuan_id', '7' )->count();
    $lain_lain = Pengaduan::where('tujuan_id', '9' )->count();

    // Chart Pengaduan bar
    // Cari pake tahun ini whereYear('updated_at', Carbon::now()->year)
    // Cari pake bulan ini whereMonth('updated_at', Carbon::now()->month)

    $masuk = Pengaduan::where('status','Pengaduan Masuk')->whereYear('updated_at', Carbon::now()->year)->whereMonth('updated_at', Carbon::now()->month)->count();
    $diverifikasi = Pengaduan::where('status','Pengaduan Sedang Diverifikasi')->whereYear('updated_at', Carbon::now()->year)->whereMonth('updated_at', Carbon::now()->month)->count() ;
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
    $current_lain_lain = Pengaduan::where('tujuan_id','9')->whereYear('updated_at', Carbon::now()->year)->whereMonth('updated_at', Carbon::now()->month)->count();
// } //endif

    // app('App\Http\Controllers\HelperController')->automatically_delete_data();

    return view('landing_page',compact(
        'jaringan','server','si','web_unima','lms','ijazah','slip','lain_lain',
        'masuk','diverifikasi','diproses','ditolak','selesai',
        'current_jaringan','current_server','current_si','current_webunima','current_lms','current_ijazah','current_slip','current_lain_lain', 'pengaduan'
    ));
});


// Kalo yang login nda ad akses direct ke sini
    Route::get('cannot-access',[AuthController::class,'cannot_access'])->name('cannot_access');

// Pake helper middleware for mo auto delete
    // Controller Auth
    Route::group(['middleware' => ['helpermiddleware']], (function (){
        Route::get('login',[AuthController::class,'index'])->name('login');
        Route::post('authenticate',[AuthController::class,'authenticate'])->name('authenticate');
        Route::post('logout',[AuthController::class,'logout'])->name('logout');
    }));

   // Edit Tujuan bisa diakses semua
        // route::get('/admin/tujuan/edit/{pengaduan:kode}',[AdminController::class,'tujuan_store'])->name('admin.tujuan.store'); 
            route::post('/admin/tujuan/{pengaduan:kode}',[AdminController::class,'tujuan_store'])->name('admin.tujuan.store'); 

// Route Group untuk yang login
    // =============================== Admin Page ================================= 
        Route::group(['middleware' => ['auth','cek_level:admin,verifikator','helpermiddleware']], (function (){
            // Route::middleware(['auth','cek_level:admin'])->group (function (){
            
            // Register Admin yang lain || Controller Auth
                Route::get('register', [AuthController::class, 'register'])->name('register');
                Route::post('register', [AuthController::class, 'store'])->name('register.store');
            // Admin Pages
                Route::get('/admin/pages',[AdminController::class,'pages'])->name('admin.pages');
                Route::delete('/auth/destroy/{user:email}',[AuthController::class,'destroy'])->name('auth.destroy');

            // Hapus data pengaduan 
                Route::delete('admin/destroy/{pengaduan:id}',[AdminController::class,'destroy'])->name('admin.destroy');    

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
                Route::get('/admin/export/excel-monthly', [PengaduansExportController::class,'excel_monthly'])->name('export.excel_monthly');
                Route::get('/admin/export/excel-all', [PengaduansExportController::class,'excel_all'])->name('export.excel_all');

            // Admin Section
                // Semua
                route::get('admin/section/semua',[AdminController::class,'section_semua'])->name('admin.section.semua');
                
            // Rating Average
                route::get('admin/rating-average',[AdminController::class,'rating_average'])->name('rating.average')->middleware('auth','cek_level:admin');


            }));
             

    // =================================== Jaringan Page ==================================
        Route::group(['middleware' => ['auth','cek_level:jaringan,admin','helpermiddleware']], (function (){
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
        Route::group(['middleware' => ['auth','cek_level:server,admin','helpermiddleware']], (function (){
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

    // =================================== Sistem Informasi Page ==================================
        Route::group(['middleware' => ['auth','cek_level:sistem_informasi,admin','helpermiddleware']], (function (){
            // index & detail Server
                route::get('sistem-informasi',[SistemInformasiController::class,'index'])->name('sistem_informasi.index');
                route::get('sistem-informasi/detail/{pengaduan:kode}',[SistemInformasiController::class,'detail'])->name('sistem_informasi.detail');

                // Update (Pengaduan Sedang Diverifikasi)
                route::post('sistem-informasi/update/{pengaduan:kode}',[SistemInformasiController::class,'update_store'])->name('sistem_informasi.update.store');
                
                // Proses (Pengaduan Sedang Diproses)
                route::post('sistem-informasi/proses/{pengaduan:kode}',[SistemInformasiController::class,'proses_store'])->name('sistem_informasi.proses.store');
           
            // Section
                // Semua
                route::get('sistem-informasi/section/semua',[SistemInformasiController::class,'section_semua'])->name('sistem_informasi.section.semua');

            }));
    // =================================== Website Unima Informasi Page ==================================
        Route::group(['middleware' => ['auth','cek_level:website_unima,admin','helpermiddleware']], (function (){
            // index & detail Server
                route::get('website-unima',[WebsiteUnimaController::class,'index'])->name('website_unima.index');
                route::get('website-unima/detail/{pengaduan:kode}',[WebsiteUnimaController::class,'detail'])->name('website_unima.detail');

                // Update (Pengaduan Sedang Diverifikasi)
                route::post('website-unima/update/{pengaduan:kode}',[WebsiteUnimaController::class,'update_store'])->name('website_unima.update.store');
                
                // Proses (Pengaduan Sedang Diproses)
                route::post('website-unima/proses/{pengaduan:kode}',[WebsiteUnimaController::class,'proses_store'])->name('website_unima.proses.store');
           
            // Section
                // Semua
                route::get('website-unima/section/semua',[WebsiteUnimaController::class,'section_semua'])->name('website_unima.section.semua');

            }));


    // =================================== Learning Management System  Page ==================================
        Route::group(['middleware' => ['auth','cek_level:lms,admin','helpermiddleware']], (function (){
            // index & detail Server
                route::get('learning-management-system',[LearningManagementSystemController::class,'index'])->name('lms.index');
                route::get('learning-management-system/detail/{pengaduan:kode}',[LearningManagementSystemController::class,'detail'])->name('lms.detail');

                // Update (Pengaduan Sedang Diverifikasi)
                route::post('learning-management-system/update/{pengaduan:kode}',[LearningManagementSystemController::class,'update_store'])->name('lms.update.store');
                
                // Proses (Pengaduan Sedang Diproses)
                route::post('learning-management-system/proses/{pengaduan:kode}',[LearningManagementSystemController::class,'proses_store'])->name('lms.proses.store');
           
            // Section
                // Semua
                route::get('learning-management-system/section/semua',[LearningManagementSystemController::class,'section_semua'])->name('lms.section.semua');

            }));
    // =================================== Ijazah  Page ==================================
        Route::group(['middleware' => ['auth','cek_level:ijazah,admin','helpermiddleware']], (function (){
            // index & detail Server
                route::get('ijazah',[IjazahController::class,'index'])->name('ijazah.index');
                route::get('ijazah/detail/{pengaduan:kode}',[IjazahController::class,'detail'])->name('ijazah.detail');

                // Update (Pengaduan Sedang Diverifikasi)
                route::post('ijazah/update/{pengaduan:kode}',[IjazahController::class,'update_store'])->name('ijazah.update.store');
                
                // Proses (Pengaduan Sedang Diproses)
                route::post('ijazah/proses/{pengaduan:kode}',[IjazahController::class,'proses_store'])->name('ijazah.proses.store');
           
            // Section
                // Semua
                route::get('ijazah/section/semua',[IjazahController::class,'section_semua'])->name('ijazah.section.semua');

            }));


    // =================================== Slip  Page ==================================
        Route::group(['middleware' => ['auth','cek_level:slip,admin','helpermiddleware']], (function (){
            // index & detail Server
                route::get('slip',[SlipController::class,'index'])->name('slip.index');
                route::get('slip/detail/{pengaduan:kode}',[SlipController::class,'detail'])->name('slip.detail');

                // Update (Pengaduan Sedang Diverifikasi)
                route::post('slip/update/{pengaduan:kode}',[SlipController::class,'update_store'])->name('slip.update.store');
                
                // Proses (Pengaduan Sedang Diproses)
                route::post('slip/proses/{pengaduan:kode}',[SlipController::class,'proses_store'])->name('slip.proses.store');
           
            // Section
                // Semua
                route::get('slip/section/semua',[SlipController::class,'section_semua'])->name('slip.section.semua');

            }));


    // =================================== Lain-lain  Page ==================================
        Route::group(['middleware' => ['auth','cek_level:lain_lain,admin','helpermiddleware']], (function (){
            // index & detail Server
                route::get('lain-lain',[LainlainController::class,'index'])->name('lain_lain.index');
                route::get('lain-lain/detail/{pengaduan:kode}',[LainlainController::class,'detail'])->name('lain_lain.detail');

                // Update (Pengaduan Sedang Diverifikasi)
                route::post('lain-lain/update/{pengaduan:kode}',[LainlainController::class,'update_store'])->name('lain_lain.update.store');
                
                // Proses (Pengaduan Sedang Diproses)
                route::post('lain-lain/proses/{pengaduan:kode}',[LainlainController::class,'proses_store'])->name('lain_lain.proses.store');
           
            // Section
                // Semua
                route::get('lain-lain/section/semua',[LainlainController::class,'section_semua'])->name('lain_lain.section.semua');

            }));

            
  




    // ======== POV Visitor ===========

    // Pengaduan Email Verifying alternative 
        //  Resend Captcha for verify email
        Route::get('reload', [PengaduanController::class, 'reload']);

    Route::group(['middleware' => ['helpermiddleware']], (function (){
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

    }));
