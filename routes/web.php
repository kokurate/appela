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
            
            // Admin Page 
            Route::group(['middleware' => ['cek_login:admin']], function (){
                // Register Admin yang lain
                Route::get('register', [AuthController::class, 'register'])->name('register');
                Route::post('register', [AuthController::class, 'store'])->name('register.store');
            
                Route::get('admin',[AdminController::class,'index'])->name('admin.index');    
                Route::delete('admin/destroy/{pengaduan:kode}',[AdminController::class,'destroy'])->name('admin.destroy');    
                Route::get('admin/detail/{pengaduan:kode}',[AdminController::class,'detail'])->name('admin.detail');    

            });
            
            // Jaringan Page
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

