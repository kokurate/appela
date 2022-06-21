<?php

namespace App\Http\Controllers;

use App\Http\Requests\PengaduanRequest;
use App\Http\Requests\Resend_emailRequest;
use App\Http\Requests\VerifyRequest;
use App\Mail\SendMailVisitor;
use App\Mail\VerifyAlternative;
use App\Models\Tujuan;
use App\Models\Pengaduan;
use App\Models\Catatan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PengaduanController extends Controller
{
    public function index(){
        return view('pengaduan.index');
    }


public function verify(VerifyRequest $request)
{
    // Verify using PengaduanRequest
    $validated = array_merge($request->validated(), ['token' => Str::random(127)]);
    // Buat 
    Pengaduan::create($validated);
    $data = [
        'content' => 'Untuk membuat pengaduan silahkan klik button di bawah ini',
        'url' => 'http://127.0.0.1:8000/pengaduan/create/' . $validated['token'],
    ];
    Mail::to($validated['email'])->send(new VerifyAlternative($data));
  
    return redirect()
        ->route('pengaduan.check')
        ->with('success', 'Registrasi Email berhasil. Silahkan cek email anda untuk membuat pengaduan');
}

// Halaman resending email dan landing page saat berhasil registrasi email
    public function check(){
        return view('pengaduan.check');
    }

    public function resend_email(Resend_emailRequest $request){
       
        $validated = array_merge($request->validated(),);    
        $newtoken = Str::random(127);
            // Pengaduan::where('email', $email)
        //           ->where('status', 'Verified')->firstOrFail()
        //           ->update(['token' => $newtoken ]);

        // email = request('email) cari, kalo nda sama dengan di database
        $post=  Pengaduan::where('email', $validated['email'])->first();

                // Tampilkan error
                  if(is_null($post)) {
                      return redirect()->route('pengaduan.check')
                                       ->with('error','Email belum terverifikasi');
                  }
                        //Kalo sesuai update token   
                  else{
                    Pengaduan::where('email', $validated['email'])
                              ->update(['token' => $newtoken ]);
                  }   
                $data =[
                    'content' => 'Ini adalah link baru anda untuk membuat pengaduan. Silahkan klik button di bawah ini untuk membuat pengaduan ',
                    'url' => 'http://127.0.0.1:8000/pengaduan/create/'. $newtoken,
                ];
            // Kirim ke email
              Mail::to($validated['email'])->send(new VerifyAlternative($data));
            return redirect()->route('pengaduan.check')
                             ->with('success','Link baru sudah dikirimkan. Silahkan cek email anda untuk membuat pengaduan');
    }

    public function create(Pengaduan $pengaduan , Request $request){
        return view('pengaduan.create',[
            'title' => 'Buat Pengaduan',
            'tujuan' => Tujuan::all(), // Untuk pangge tujuan pengaduan
            'token' => $request->url(), // request->url is to take the request from url
            "pengaduan" =>$pengaduan->load('tujuan')
            
        ]);
    } 

    public function store(Pengaduan $pengaduan, Request $request){
       
        $rules = ([   
            'nama' => 'required',
            'judul' => 'required|max:255',
            'tujuan_id' => 'required|in:1,2,3,4,5,6,7',
            'visitor_image_1' => 'required|image|file|max:1024',
            'visitor_image_2' => '|image|file|max:1024',
            'visitor_image_3' => '|image|file|max:1024',
            'isi' => 'required',
        ]);

        
        // Validasi
        $validatedData = $request->validate($rules);
        
        // Kalo image ada isi, store(), kalo nda kasih nilai null
        if($request->file('visitor_image_2')){
            $validatedData['visitor_image_2'] = $request->file('visitor_image_2')->store('image');
        }

        if($request->file('visitor_image_3')){
            $validatedData['visitor_image_3'] = $request->file('visitor_image_3')->store('image');
        }

        $validatedData['visitor_image_1'] = $request->file('visitor_image_1')->store('image');
        $validatedData['token'] = null;
        $validatedData['kode'] = Str::random(10);
        $validatedData['status'] = 'Pengaduan Masuk';
        $validatedData['published_at'] = Carbon::now()->toDateTimeString();
        
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
            'opener' => '+',
            'user' => 'User :'.' '.$pengaduan->email,
            'do' => 'membuat pengaduan ke : '. $tujuan,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ];
        DB::table('catatans')->insert($activitylog);
       Pengaduan::where('id',$pengaduan->id)->update($validatedData);
       
       $data =[
        'header' => 'Selamat datang di APPELA Puskom ',
        'content' => 'Gunakan kode berikut untuk cek detail pengaduan anda',
        'status' =>   $validatedData['kode'] ,
    ];
       // Kirim Email
       Mail::to($pengaduan->email)->send(new SendMailVisitor ($data)); 
       return redirect()->route('pengaduan.search')
                        ->with('success', 'Pengaduan Berhasil dibuat. Silahkan cek email anda untuk melihat kode pengaduan');
    }

    public function search(Request $request){
        // Kalo mo ubah paginasi ubaj juga variabelnya like this 5->all
        $pagination = 5;
        $search = request('kode');

        // Lakukan pengecekan terhadap request search yang dikirim dari Button pengaduan/cari.blade.php
        if($search){ 
            // Jika request seach sama dengan filter[search] query dari database maka tampilkan hasilnya
            $cari = Pengaduan::filter(request(['kode']));
        } else{
            // Jika tidak sama jangan tampilkan 
            $cari =  Pengaduan::where('kode','-');
        }
        
        return view ('pengaduan.search',[
            "title" => "Cari Pengaduan",
            // Kalau ada request yang berisi search didalam filter maka ambil datanya (get)
            // "kode" => Pengaduan::filter(request(['search']))->paginate(5)->withQueryString(),

            "kode" => $cari->paginate(5)->withQueryString(), // Ambil filter dari model Pengaduan, apapun yang ada di query string sebelumnya bawa
        ])->with('i', ($request->input('page', 1) - 1) * $pagination); // code for paginate       
    }

    public function detail(Pengaduan $pengaduan){
        return view('pengaduan.detail',[
            "title" => "Detail Pengaduan User",
            // Lazy Eager Loading
            "pengaduan" =>$pengaduan->load('tujuan'),
            'log' => Catatan::where('pengaduan_id', $pengaduan->id)->get()->load('tujuan')
        ]);
    }

//  ==================================== POV ADMIN ==============================================

}
