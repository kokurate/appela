<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\JaringanController;
use App\Http\Controllers\PengaduanController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('cannot-access',[AuthController::class,'cannot_access'])->name('cannot_access');

Route::get('login',[AuthController::class,'index'])->name('login');
Route::post('authenticate',[AuthController::class,'authenticate'])->name('authenticate');
Route::post('logout',[AuthController::class,'logout'])->name('logout');



        // Route Group untuk yang login
        Route::group(['middleware' => ['auth']], function(){
            
            // =============================== Admin Page ================================= 
            Route::group(['middleware' => ['cek_login:admin']], function (){
                // Register Admin yang lain
                Route::get('register', [AuthController::class, 'register'])->name('register');
                Route::post('register', [AuthController::class, 'store'])->name('register.store');
            
                Route::get('admin',[AdminController::class,'index'])->name('admin.index');    
                Route::delete('admin/destroy/{pengaduan:kode}',[AdminController::class,'destroy'])->name('admin.destroy');    
                Route::get('admin/detail/{pengaduan:kode}',[AdminController::class,'detail'])->name('admin.detail');    
                
                // Pengaduan Masuk Proses
                route::get('/admin/masuk/{pengaduan:kode}',[AdminController::class,'masuk'])->name('admin.masuk'); 
                route::post('/admin/masuk/{pengaduan:kode}',[AdminController::class,'masuk_store'])->name('admin.masuk.store'); 

                // Edit Tujuan
                // route::get('/admin/tujuan/edit/{pengaduan:kode}',[AdminController::class,'tujuan_store'])->name('admin.tujuan.store'); 
                route::post('/admin/tujuan/{pengaduan:kode}',[AdminController::class,'tujuan_store'])->name('admin.tujuan.store'); 


                // ========================== Admin Jaringan Section ==============================
                // Show all and detail
                route::get('admin/jaringan',[JaringanController::class,'index'])->name('admin.jaringan.index');
                route::get('admin/jaringan/detail/{pengaduan:kode}',[JaringanController::class,'detail'])->name('admin.jaringan.detail');

                // Update (Pengaduan Sedang Diverifikasi)
                route::get('admin/jaringan/update/{pengaduan:kode}',[JaringanController::class,'update'])->name('admin.jaringan.update');
                route::post('admin/jaringan/update/{pengaduan:kode}',[JaringanController::class,'update_store'])->name('admin.jaringan.update.store');
                
                // Proses (Pengaduan Sedang Diproses)
                route::get('admin/jaringan/proses/{pengaduan:kode}',[JaringanController::class,'proses'])->name('admin.jaringan.proses');
                route::post('admin/jaringan/proses/{pengaduan:kode}',[JaringanController::class,'proses_store'])->name('admin.jaringan.proses.store');
                




                // Server all
                route::get('admin/server',[AdminController::class,'server'])->name('admin.server.index');

                // 
                route::get('admin/sistem-informasi',[AdminController::class,'jaringan'])->name('admin.sistem_informasi.index');
                route::get('admin/website-unima',[AdminController::class,'jaringan'])->name('admin.website_unima.index');
                route::get('admin/learning-management-system',[AdminController::class,'jaringan'])->name('admin.lms.index');
                route::get('admin/ijazah',[AdminController::class,'jaringan'])->name('admin.ijazah.index');
                route::get('admin/slip',[AdminController::class,'jaringan'])->name('admin.slip.index');
            });
            
            // =================================== Jaringan Page ==================================
            Route::group(['middleware' => ['cek_login:jaringan']], function (){
            
                Route::get('jaringan',[JaringanController::class,'index'])->name('jaringan.index');
            
            });

        });

// ================================ POV Visitor 

// Pengaduan Email Verifying alternative 
    Route::get('pengaduan', [PengaduanController::class,'index'])->name('pengaduan.index');
    Route::post('pengaduan', [PengaduanController::class,'verify'])->name('pengaduan.verify-email');
    Route::get('pengaduan/check', [PengaduanController::class,'check'])->name('pengaduan.check');
    Route::post('pengaduan/check', [PengaduanController::class,'resend_email'])->name('pengaduan.resend_email');

//  untuk membuat pengaduan harus lewat email yang sudah dimasukkan
    Route::get('pengaduan/create/{pengaduan:token}', [PengaduanController::class,'create'])->name('pengaduan.create');
    Route::post('pengaduan/create/{pengaduan:token}', [PengaduanController::class,'store'])->name('pengaduan.store');

// Search Pengaduan
    Route::get('pengaduan/search',[PengaduanController::class,'search'])->name('pengaduan.search');
    Route::get('pengaduan/detail/{pengaduan:kode}',[PengaduanController::class,'detail'])->name('pengaduan.detail');

