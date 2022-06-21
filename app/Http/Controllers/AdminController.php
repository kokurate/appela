<?php

namespace App\Http\Controllers;

use App\Models\Catatan;
use App\Models\Pengaduan;
use App\Models\Tujuan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

        if($pengaduan->petugas_image_1){
          Storage::delete($pengaduan->petugas_image_1);
        }
        if($pengaduan->petugas_image_2){
          Storage::delete($pengaduan->petugas_image_2);
        }
        if($pengaduan->petugas_image_3){
          Storage::delete($pengaduan->petugas_image_3);
        }
      
      Catatan::where('pengaduan_id', $pengaduan->id)->delete();
      Pengaduan::destroy($pengaduan->id);
      return back()->with('success','Data berhasil dihapus');
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

      // Sebelum update Cek dlu kalo misalnya ditolak kase validasi keterangan(tanggapan)
      if($request['status'] == 'Pengaduan Ditolak'){
        $validateData = $request->validate([
          'keterangan' => 'required',
          'status' => 'required'
        ],
       [
         'keterangan.required' => 'Tanggapan harus diisi',
         'status.required' => 'Field ini tidak boleh kosong'
       ]);
     }

          // Kalo ditolak email kase null
    if($request['status'] == 'Pengaduan Ditolak'){
      $validateData['email'] = null;    
    }


     $status = $request['status'];
        // Activity Log
        $activitylog = [
          'pengaduan_id' => $pengaduan->id,
          'opener' => 'Update',
          'user' => auth()->user()->name  ,
          'do' => 'mengupdate pengaduan menjadi'.' '. $status ,
          'updated_at' => Carbon::now()->toDateTimeString(),
      ];
 
      DB::table('catatans')->insert($activitylog);

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
          $tujuan = $request->tujuan_id;
            // buat kondisi untuk menamakan tujuan 
            if($tujuan == 1){$tujuan = 'Jaringan';}
            elseif($tujuan == 2){$tujuan = 'Server';}
            elseif($tujuan == 3){$tujuan = 'Sistem Informasi';}
            elseif($tujuan == 4){$tujuan = 'Website unima';}
            elseif($tujuan == 5){$tujuan = 'Learning Management System';}
            elseif($tujuan == 6){$tujuan = 'Ijazah';}
            elseif($tujuan == 7){$tujuan = 'Slip';}
    
       // Activity Log
       $activitylog = [
         'pengaduan_id' => $pengaduan->id,
         'opener' => 'Change',
         'user' => auth()->user()->name  ,
         'do' => 'mengubah tujuan pengaduan menjadi : ' . $tujuan,
         'updated_at' => Carbon::now()->toDateTimeString(),
     ];
     DB::table('catatans')->insert($activitylog);


       Pengaduan::where('id', $pengaduan->id)->update($validateData);
       return back()->with('success', 'Tujuan Pengaduan Berhasil Diupdate');
  

    }
}
