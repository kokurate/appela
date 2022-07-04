<?php

namespace App\Http\Controllers;

use App\Mail\SendMailOfficer;
use App\Models\Catatan;
use App\Models\Pengaduan;
use App\Models\Tujuan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Mail\SendMailVisitor;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function index(Request $request){
      $pagination = 10;
      return view('_admin.index',[
        // Count 
        'jaringan' => Pengaduan::where('tujuan_id','1')->where('status','Pengaduan Sedang Diproses')->count(),
        'server' => Pengaduan::where('tujuan_id','2')->Where('status','Pengaduan Sedang Diproses')->count(),
        'sistem_informasi' => Pengaduan::where('tujuan_id','3')->Where('status','Pengaduan Sedang Diproses')->count(),
        'website_unima' => Pengaduan::where('tujuan_id','4')->Where('status','Pengaduan Sedang Diproses')->count(),
        'lms' => Pengaduan::where('tujuan_id','5')->Where('status','Pengaduan Sedang Diproses')->count(),
        'ijazah' => Pengaduan::where('tujuan_id','6')->Where('status','Pengaduan Sedang Diproses')->count(),
        'slip' => Pengaduan::where('tujuan_id','7')->Where('status','Pengaduan Sedang Diproses')->count(),
                    
        'url' => $request->path(),
        "title" => "Admin Dashboard",
        // Tidak perlu lagi pake with karena sudah didefinisikan withnya di dalam model pengaduan
        // pengaduans karena banyak
        "pengaduan" => Pengaduan::where('status', 'Pengaduan Masuk')->orderBy('id','ASC')->paginate(10)->withQueryString(),
        'selesai' => Pengaduan::where('status','Pengaduan Selesai')->count(),
        'ditolak' => Pengaduan::where('status','Pengaduan Ditolak')->count(),
        ])->with('i', ($request->input('page', 1) - 1) * $pagination); // code for paginate  
    }

    public function detail(Pengaduan $pengaduan)
    {
        return view('_admin/detail',[
            "title" => "Detail Pengaduan Admin",
            // Lazy Eager Loading
            "pengaduan" =>$pengaduan->load('tujuan')
        ]);     
    }
    
// ==================================    Hapus Data    ======================================
    public function destroy(Pengaduan $pengaduan){
      // Kalo ada isi itu image visitor hapus juga
        if($pengaduan->visitor_image_1){
          Storage::delete($pengaduan->visitor_image_1);
        }
        if($pengaduan->visitor_image_2){
          Storage::delete($pengaduan->visitor_image_2);
        }
        if($pengaduan->visitor_image_3){
          Storage::delete($pengaduan->visitor_image_3);
        }
      // Kalo ada isi itu image petugas hapus juga
        if($pengaduan->petugas_image_1){
          Storage::delete($pengaduan->petugas_image_1);
        }
        if($pengaduan->petugas_image_2){
          Storage::delete($pengaduan->petugas_image_2);
        }
        if($pengaduan->petugas_image_3){
          Storage::delete($pengaduan->petugas_image_3);
        }
      // Hapus juga dia pe log
        Catatan::where('pengaduan_id', $pengaduan->id)->delete();
      // Hapus di table pengaduan
      Pengaduan::destroy($pengaduan->id);
      return back()->with('success','Data berhasil dihapus');
    }
 
// =============================== Pengaduan Masuk ===============================
    public function masuk(Pengaduan $pengaduan, Request $request){
      return view('_admin.masuk',[
        'url' => $request->path(),
        'title' => "Pengaduan Masuk",
        'pengaduan' => $pengaduan,
        'tujuan' => Tujuan::all()
      ]);
    }

    public function masuk_store(Pengaduan $pengaduan, Request $request){
     $validateData = $request->validate([
        'status' => 'required'
      ],
      [
        'status.required' => 'Update tidak boleh kosong'
      ]);

      // Sebelum update Cek dlu kalo misalnya ditolak kase validasi keterangan(tanggapan)
        if($request['status'] == 'Pengaduan Ditolak'){
          $validateData = $request->validate([
            'keterangan' => 'required',
            'status' => 'required'
          ],
        [
          'keterangan.required' => 'Tanggapan harus diisi',
          'status.required' => 'Update harus diisi'
        ]);
      }

    // Kalo ditolak email kase null supaya dorang boleh b beking ulang pengaduan
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

    // Setup email message
     $data =[
      'header' => 'Update Pengaduan ',
      'content' => 'Untuk melihat detail pengaduan silahkan cek appela puskom ',
      'status' =>   'Status pengaduan saat ini '.$validateData['status'] ,
      ];
    // Kirim Email
     Mail::to($pengaduan->email)->send(new SendMailVisitor ($data));   
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
        'tujuan_id.required' => 'Tujuan ini harus diisi'
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

  // ===================================== Email Ke Petugas ==============================
  public function email_petugas(Pengaduan $pengaduan, Request $request){

    // dd($pengaduan->toArray());

   $users = [];
    if($pengaduan->tujuan_id == 1){$users = User::where('level', 'jaringan')->get();}
    elseif($pengaduan->tujuan_id == 2){$users = User::where('level', 'server')->get();}
    else {
     return back()->with('toast_error','Email petugas tidak ada');
    }    

    // Message to email
    $data = [
      'content' => 'Ada pengaduan yang masuk di ' . $pengaduan->tujuan->nama ,
      'url' => 'http://127.0.0.1:8000/login',
  ];

  // Loop data petugas
    foreach($users as $user){
      Mail::to($user->email)->send(new SendMailOfficer($data));
    }

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
      'opener' => 'Send',
      'user' => auth()->user()->name  ,
      'do' => 'Mengirim Email ke Petugas : ' . $tujuan,
      'updated_at' => Carbon::now()->toDateTimeString(),
    ];
    DB::table('catatans')->insert($activitylog);

    // return response()->json(['success'=>'Berhasil Kirim Email ke petugas.']);
    return back()->with('toast_success','Berhasil Kirim Email ke petugas.');
  }
}
