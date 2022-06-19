<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Tujuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index(){
      return view('_admin.index',[
        // Count 
        'jaringan' => Pengaduan::where('tujuan_id','1')->count(),
        'server' => Pengaduan::where('tujuan_id','2')->count(),
        'sistem_informasi' => Pengaduan::where('tujuan_id','3')->count(),
        'website_unima' => Pengaduan::where('tujuan_id','4')->count(),
        'lms' => Pengaduan::where('tujuan_id','5')->count(),
        'ijazah' => Pengaduan::where('tujuan_id','6')->count(),
        'slip' => Pengaduan::where('tujuan_id','7')->count(),

        "title" => "Admin Index",
        // Tidak perlu lagi pake with karena sudah didefinisikan withnya di dalam model pengaduan
        // pengaduans karena banyak
        "pengaduan" => Pengaduan::where('status', 'Pengaduan Masuk')->get()->load('tujuan')
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
 
// =============================== Pengaduan Masuk ==================================
    public function masuk(Pengaduan $pengaduan, Request $request){
      return view('_admin.masuk',[
        'title' => "Pengaduan Masuk Proses",
        'pengaduan' => $pengaduan,
        'tujuan' => Tujuan::all()
      ]);
    }

    public function masuk_store(Pengaduan $pengaduan, Request $request){
     $validateData = $request->validate([
      'status' => 'required'
     ],
    [
      'status.required' => 'Field ini tidak boleh kosong'
    ]);

     Pengaduan::where('id', $pengaduan->id)->update($validateData);
     return redirect()->route('admin.index')
                        ->with('success', 'Pengaduan Berhasil Diupdate');

    }

// ================================ Tujuan Edit =======================================
    public function edit_tujuan(){
    return view('tujuan.index',[
      
    ]);
    }

    public function tujuan_store(Pengaduan $pengaduan, Request $request){
      $validateData = $request->validate([
        'tujuan_id' => 'required'
       ],
       [
        'tujuan_id.required' => 'Field ini harus diisi'
       ]);

       Pengaduan::where('id', $pengaduan->id)->update($validateData);
       return back()->with('success', 'Tujuan Pengaduan Berhasil Diupdate');
  

    }
}
