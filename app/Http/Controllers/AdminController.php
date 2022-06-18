<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
 public function index(){
   return view('_admin.index',[
    "title" => "Admin Index",
    // Tidak perlu lagi pake with karena sudah didefinisikan withnya di dalam model pengaduan
    // pengaduans karena banyak
    "pengaduan" => Pengaduan::all()
    ]);
 }

 public function detail(Pengaduan $pengaduan)
 {
     return view('_admin/detail',[
         "title" => "Detail Pengaduan Admin",
         // Lazy Eager Loading
         "pengaduan" =>$pengaduan->load('tujuan')
     ]);     
 }
 
 public function destroy(Pengaduan $pengaduan){

  // Kalo ada isi itu image hapus juga
    if($pengaduan->visitor_image_1){
      Storage::delete($pengaduan->visitor_image_1);
    }
    if($pengaduan->visitor_image_2){
      Storage::delete($pengaduan->visitor_image_2);
    }
    if($pengaduan->visitor_image_3){
      Storage::delete($pengaduan->visitor_image_3);
    }

  Pengaduan::destroy($pengaduan->id);
  return redirect()->route('admin.index')->with('success','Data berhasil dihapus');
 }
 
}
