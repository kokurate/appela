<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Tujuan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Mail\SendMailVisitor;
use Illuminate\Support\Facades\Mail;

class JaringanController extends Controller
{
    public function index(Request $request){
     // Kalo mo ubah paginasi ubah juga variabelnya di view
     $current_left = $request->input('masuk') ? $request->input('masuk') : 1;
     $current_right = $request->input('masuk') ? $request->input('proses') : 1;
        return view('_officer.jaringan.index',[
          // ================================== Count ============================
            'selesai' => Pengaduan::where('status','Pengaduan Selesai')->where('tujuan_id' , 1)->count(),
            'ditolak' => Pengaduan::where('status','Pengaduan Ditolak')->where('tujuan_id' , 1)->count(),
            'rating' => Pengaduan::whereNotNull(['rating', 'komentar'])->where('tujuan_id', 1)->count(),
    
          // =================================== Jaringan Verifikasi (Masuk) ==================================================== 
          'current_left' => $current_left,
          'jaringan_masuk_count' => Pengaduan::where('status','Pengaduan Sedang Diverifikasi')
                                      ->where('tujuan_id','1')
                                      ->count(),
          'jaringan_masuk' => Pengaduan::where('status','Pengaduan Sedang Diverifikasi')
                                  ->where('tujuan_id','1')->orderBy('id','ASC')
                                  ->paginate(10,['*'],'masuk')->withQueryString(), 

        // =================================== Jaringan Proses ===============================================
        'current_right' => $current_right,
        'jaringan_proses_count' => Pengaduan::where('status','Pengaduan Sedang Diproses')
                                    ->where('tujuan_id','1')
                                    ->count(),
        'jaringan_proses' => Pengaduan::where('status','Pengaduan Sedang Diproses')
                                    ->where('tujuan_id','1')->orderBy('id','ASC')
                                    ->paginate(10,['*'],'proses')->withQueryString(),
        'title' => 'Jaringan',
        'url' => $request->path(),
        ]);   
      }

    public function detail(Pengaduan $pengaduan, ){
      return view('_officer.jaringan.detail',[
        'title' => "Ini halaman detail jaringan",
        'tujuan' => Tujuan::all(),
        'pengaduan' => $pengaduan,
      ]);
    }

// ====================================================================================
// Update disini masih ada 2 opsi, ditolak dan diproses
    public function update(Pengaduan $pengaduan){
      return view('_officer.jaringan.update',[
        'title' => 'Ini halaman proses jaringan',
        'pengaduan' => $pengaduan,
      ]);
    }

    public function update_store(Pengaduan $pengaduan, Request $request){
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
    // Setup Activity Log 
        $activitylog = [
          'pengaduan_id' => $pengaduan->id,
          'opener' => 'Update',
          'user' => auth()->user()->name  ,
          'do' => 'mengupdate pengaduan menjadi'.' '. $status ,
          'updated_at' => Carbon::now()->toDateTimeString(),
      ];
    // Insert Activity Log
      DB::table('catatans')->insert($activitylog);
    // Update Pengaduan
       Pengaduan::where('id', $pengaduan->id)->update($validateData);
    // Setup Email Message
       $data =[
        'header' => 'Update Pengaduan ',
        'content' => 'Untuk melihat detail pengaduan silahkan cek appela puskom ',
        'status' =>   'Status pengaduan saat ini '.$validateData['status'] ,
      ];
    // Kirim Email
       Mail::to($pengaduan->email)->send(new SendMailVisitor ($data)); 
       return redirect()->route('jaringan.detail', $pengaduan->kode)
                          ->with('success', 'Pengaduan Berhasil Diupdate');
    }

// ====================================================================================
// proses disini sudah pasti selesai
    public function proses(Pengaduan $pengaduan){
      return view('_officer.jaringan.proses',[
        'title' => 'Ini halaman jaringan proses',
        'pengaduan' => $pengaduan,
      ]);
    }

    public function proses_store(Pengaduan $pengaduan, Request $request){
        $validatedData = $request->validate([   
          'keterangan' => 'required',
          'petugas_image_1' => '|image|file|max:1024',
          'petugas_image_2' => '|image|file|max:1024',
          'petugas_image_3' => '|image|file|max:1024',
          ],
        [
          'keterangan.required' => 'Tanggapan harus diisi'
        ]);
    // Kalo image ada isi, store(), kalo nda kasih nilai null
      if($request->file('petugas_image_1')){
          $validatedData['petugas_image_1'] = $request->file('petugas_image_1')->store('image');
      }
      if($request->file('petugas_image_2')){
          $validatedData['petugas_image_2'] = $request->file('petugas_image_2')->store('image');
      }
      if($request->file('petugas_image_3')){
          $validatedData['petugas_image_3'] = $request->file('petugas_image_3')->store('image');
      }
      
      $validatedData['status'] = 'Pengaduan Selesai';
    // Kalo so klar email kase null supaya kalo dia mo beking ulang pengaduan so boleh
      $validatedData['email'] = null;      

    // Setup Activity Log
      $activitylog = [
        'pengaduan_id' => $pengaduan->id,
        'opener' => 'Complete',
        'user' => auth()->user()->name  ,
        'do' => 'telah menyelesaikan pengaduan' ,
        'updated_at' => Carbon::now()->toDateTimeString(),
      ];
  // Insert Activity Log
    DB::table('catatans')->insert($activitylog);
  // update pengaduan 
    Pengaduan::where('id',$pengaduan->id)->update($validatedData);
  // Setup Email Message
      $data =[
        'header' => 'Update Pengaduan ',
        'content' => 'Untuk melihat detail pengaduan silahkan cek appela puskom ',
        'status' =>   'Status pengaduan saat ini '.$validatedData['status'] ,
    ];
  // Kirim Email
     Mail::to($pengaduan->email)->send(new SendMailVisitor ($data)); 
  return redirect()->route('jaringan.detail', $pengaduan->kode)
                   ->with('success', 'Pengaduan Berhasil Diselesaikan');
    }
}


