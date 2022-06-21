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
     // Kalo mo ubah paginasi ubaj juga variabelnya like this 15->all
     $pagination = 15;

        return view('_officer.jaringan.index',[
          'title' => 'Ini halaman jaringan setelah login',
          'jaringancount' => Pengaduan::where('status','Pengaduan Sedang Diverifikasi')
                                      ->where('tujuan_id','1')
                                      ->count(),
          'pengaduan' => Pengaduan::where('status','Pengaduan Sedang Diverifikasi')
                                  ->where('tujuan_id','1')
                                  ->paginate(15)->withQueryString(), 
        ])->with('i', ($request->input('page', 1) - 1) * $pagination); // code for paginate     ;
      }

    public function detail(Pengaduan $pengaduan, ){
      return view('_officer.jaringan.detail',[
        'title' => "Ini halaman detail jaringan",
        'tujuan' => Tujuan::all(),
        'pengaduan' => $pengaduan,
      ]);
    }

    public function update(Pengaduan $pengaduan){
      return view('_officer.jaringan.update',[
        'title' => 'Ini halaman proses jaringan',
        'pengaduan' => $pengaduan,
      ]);
    }

    public function update_store(Pengaduan $pengaduan, Request $request){
      // Kalo pengaduan tolak kase validasi required
      
    
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

      // Activity Log
      $activitylog = [
        'pengaduan_id' => $pengaduan->id,
        'opener' => 'Complete',
        'user' => auth()->user()->name  ,
        'do' => 'telah menyelesaikan pengaduan' ,
        'updated_at' => Carbon::now()->toDateTimeString(),
    ];
    DB::table('catatans')->insert($activitylog);


    Pengaduan::where('id',$pengaduan->id)->update($validatedData);


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


