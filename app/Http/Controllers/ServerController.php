<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pengaduan;
use App\Models\Tujuan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Mail\SendMailVisitor;
use App\Models\Catatan;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ServerController extends Controller
{
    public function index(Request $request){
      app('App\Http\Controllers\HelperController')->automatically_delete_data();

        // Kalo mo ubah paginasi ubah juga variabelnya di view
        $current_left = $request->input('masuk') ? $request->input('masuk') : 1;
        $current_right = $request->input('proses') ? $request->input('proses') : 1;

           return view('_officer.server.index',[
             // ================================== Count ============================
               'semua' => Pengaduan::where('tujuan_id' , 2)->count(),
       
             // =================================== Jaringan Verifikasi (Masuk) ==================================================== 
             'current_left' => $current_left,
             'pengaduan_masuk_count' => Pengaduan::where('status','Pengaduan Sedang Diverifikasi')
                                         ->where('tujuan_id','2')
                                         ->count(),
             'pengaduan_masuk' => Pengaduan::where('status','Pengaduan Sedang Diverifikasi')
                                     ->where('tujuan_id','2')->orderBy('id','ASC')
                                     ->paginate(10,['*'],'masuk')->withQueryString(), 
   
           // =================================== Jaringan Proses ===============================================
           'current_right' => $current_right,
           'pengaduan_proses_count' => Pengaduan::where('status','Pengaduan Sedang Diproses')
                                       ->where('tujuan_id','2')
                                       ->count(),
           'pengaduan_proses' => Pengaduan::where('status','Pengaduan Sedang Diproses')
                                       ->where('tujuan_id','2')->orderBy('id','ASC')
                                       ->paginate(10,['*'],'proses')->withQueryString(),
           'title' => 'Server',
           'url' => $request->path(),
           ]);   
         }

    public function detail(Pengaduan $pengaduan, Request $request){
            return view('_officer.server.detail',[
              'title' => "Detail Server",
              'url' => $request->path(),
              'tujuan' => Tujuan::all(),
              'pengaduan' => $pengaduan,
              'log' => Catatan::where('pengaduan_id', $pengaduan->id)->get()->load('pengaduan')
            ]);
          }
    
    // ====================================================================================
// Update disini masih ada 2 opsi, ditolak dan diproses
public function update_store(Pengaduan $pengaduan, Request $request){
    $validateData = $request->validate([
        'status' => 'required'
      ],
      [
        'status.required' => 'Status tidak boleh kosong'
      ]);

    // Sebelum update Cek dlu kalo misalnya ditolak kase validasi keterangan(tanggapan)
    if($request['status'] == 'Pengaduan Ditolak'){
     $validateData = $request->validate([
       'keterangan' => 'required',
       'status' => 'required'
     ],
    [
      'keterangan.required' => 'Tanggapan harus diisi',
      'status.required' => 'Status tidak boleh kosong'
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
      'content' => 'Untuk melihat detail pengaduan silahkan cek APL Pusat Komputer ',
      'status' =>   'Status pengaduan saat ini '.$validateData['status'] ,
    ];
  // Kirim Email
     Mail::to($pengaduan->email)->send(new SendMailVisitor ($data)); 
     return redirect()->back()
                        ->with('success', 'Pengaduan Berhasil Diupdate');
  }

    // ====================================================================================
    // proses disini sudah pasti selesai
    public function proses_store(Pengaduan $pengaduan, Request $request){
        $validator = Validator::make($request->all() ,[   
            'keterangan' => 'required',
            'petugas_image_1' => '|image|file|max:1024',
            'petugas_image_2' => '|image|file|max:1024',
            'petugas_image_3' => '|image|file|max:1024',
            ],
        [
            'keterangan.required' => 'Tanggapan harus diisi',
            'petugas_image_1.image' => 'Gambar 1 harus format gambar',
            'petugas_image_1.max' => 'Gambar 1 tidak boleh lebih dari 1MB',
            'petugas_image_2.image' => 'Gambar 2 harus format gambar',
            'petugas_image_2.max' => 'Gambar 2 tidak boleh lebih dari 1MB',
            'petugas_image_3.image' => 'Gambar 3 harus format gambar',
            'petugas_image_3.max' => 'Gambar 3 tidak boleh lebih dari 1MB',
        ]);

        // Kalo error kase alert error
        if($validator->fails()){
            return back()->with('toast_error', $validator->errors()->all()[0])->withInput()->withErrors($validator);
        }
    // Validasi
        $validatedData = $validator->validated();

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
        'content' => 'Untuk melihat detail pengaduan silahkan cek APL Pusat Komputer ',
        'status' =>   'Status pengaduan saat ini '.$validatedData['status'] ,
    ];
    // Kirim Email
    Mail::to($pengaduan->email)->send(new SendMailVisitor ($data)); 
    return redirect()->back()
                    ->with('success', 'Pengaduan Berhasil Diselesaikan');
    }

    
     // ========================= Server Section Semua ====================
  public function section_semua(Request $request){

    $pagination = 10;
    $pengaduan = Pengaduan::where('tujuan_id' , 2)->orderBy('id','DESC');

    if(request('search')){
      $pengaduan->where('kode','like','%' . request('search') . '%')
                ->orWhere('used_email','like','%' . request('search') . '%')
                ->orWhere('nama','like','%' . request('search') . '%')
                ->orWhere('judul','like','%' . request('search') . '%')
                ->orWhere('isi','like','%' . request('search') . '%')
                ->orWhere('status','like','%' . request('search') . '%')
                ;
    }

    return view('_officer.server.semua',[
      'title' => 'Server',
      'url' => $request->path(),
      'pengaduan' => $pengaduan->paginate($pagination)->withQueryString(),
      'selesai' => Pengaduan::where('status','Pengaduan Selesai')->where('tujuan_id' , 2)->count(),
      'ditolak' => Pengaduan::where('status','Pengaduan Ditolak')->where('tujuan_id' , 2)->count(),
      'rating' => Pengaduan::whereNotNull(['rating', 'komentar'])->where('tujuan_id', 2)->count(),
      'semua' => Pengaduan::where('tujuan_id' , 2)->count(),
  ])->with('i', ($request->input('page', 1) - 1) * $pagination); // code for paginate   

  }

}
