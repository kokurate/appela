<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;

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
use Illuminate\Support\Facades\Validator;

class PengaduanController extends Controller
{
    // public function automatically_delete_data(){
    //     $stale_pengaduan = Pengaduan::where('created_at', '<', Carbon::now()->addMinutes(1))
    //     ->where('status','Registrasi Email')
    //     ->get();

    //     foreach ($stale_pengaduan as $pengaduan) {
    //     $pengaduan->delete();
    //     }

    //   }


   
      public function index(){
        // Automatically delete data who are over 10 minutes
        app('App\Http\Controllers\HelperController')->automatically_delete_data();



        // Alert::success('Success Title', 'Success Message');
        // alert()->success('SuccessAlert','Lorem ipsum dolor sit amet.');
        return view('pengaduan.index',[
            'title' => 'Pengaduan',
            'page_title_1' => 'Sebelum membuat pengaduan, mohon untuk  dibaca',
            'page_title_2' => '  dengan seksama ketentuan untuk membuat aduan.',
        ]);
    }

// =============================================================================== 
// Page to get the first email (create pengaduan using email)
    public function verify(VerifyRequest $request)
    {
        // Verify using VerifyRequest
            $validated = array_merge($request->validated(), 
            ['token' => Str::random(127),
            'tujuan_id'=>8,
            'kode' => Str::random(10),
            'used_email' => $request->email,
            'status' => 'Registrasi Email',
            'judul' => 'Visitor '. $request->email .' meregistrasikan email. Belum Membuat Pengaduan',
            ]);
            
            // // Testing function for captcha
            // Validator::make($request,[
            //     'captcha' => ['required','captcha'],
            // ]);
           
        // Buat 
            $pengaduan = Pengaduan::create($validated);
        // Beking tujuan id palsu
     
        // Setup Activity Log
        $id = $pengaduan->id;
        $activitylog = [
            'pengaduan_id' => $id,
            'opener' => 'Register',
            'user' => $request->email  ,
            'do' => 'Meregistrasikan email' ,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ];
      // Insert Activity Log
        DB::table('catatans')->insert($activitylog);

        // Setup the email message
            $data = [
                'important' => 'Harap segera membuat pengaduan. Batas pembuatan pengaduan yaitu 10 menit',
                'note' => 'Jika setelah 10 menit belum membuat pengaduan. Maka anda diharuskan meregistrasikan kembali email anda',
                'content' => 'Untuk membuat pengaduan silahkan klik button di bawah ini',
                'url' => 'http://127.0.0.1:8000/pengaduan/create/' . $validated['token'],
            ];
        // Send to email
        Mail::to($validated['email'])->send(new VerifyAlternative($data));
        Alert::success('Batas pembuatan pengaduan yaitu 10 Menit', 'Silahkan cek email anda untuk membuat pengaduan');

       
        return redirect()
            ->route('pengaduan.check')
            ->with('berhasil', 'Registrasi Email berhasil. Silahkan cek email anda untuk membuat pengaduan. Batas pembuatan pengaduan yaitu 10 Menit');
    }

    public function reload()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }

// ===================================================================================
    // Halaman resending email dan landing page saat berhasil registrasi email
    public function check(){
    // Automatically delete data who are over 10 minutes
        app('App\Http\Controllers\HelperController')->automatically_delete_data();


        return view('pengaduan.check',[
            'title' => 'Kirim Ulang Link',
            'page_title_1' => 'Jika tidak ada email yang masuk tapi kalian sudah mendaftarkannya.',
            'page_title_2' => 'Silahkan daftarkan kembali email anda',
        ]);
    }

    // Saat mereka memasukkan email mereka and click the button
    public function resend_email(Resend_emailRequest $request){
    // Pake request resend_email
        $validated = array_merge($request->validated(),);    
        $newtoken = Str::random(127);
      
        // email = request('email) cari, kalo nda sama dengan di database
        $post=  Pengaduan::where('email', $validated['email'])->first();
            // Tampilkan error
                  if(is_null($post)) {
                    Alert::error('Opps...', 'Email belum terdaftar');
                      return redirect()->route('pengaduan.check')
                                       ->with('gagal','Email belum terdaftar');
                  }
            //Kalo sesuai update token   
                  else{
                    Pengaduan::where('email', $validated['email'])
                              ->update(['token' => $newtoken,]);
                
                // I'm trying to make the log but its not fix yet
                    //     $pengaduan = Pengaduan::where('id',$validated['email'])->first();
                    // // Setup Activity Log
                    //     $id = $pengaduan;
                    //   $activitylog = [
                    //         'pengaduan_id' => $id,
                    //         'opener' => 'Resend',
                    //         'user' => $request->email  ,
                    //         'do' => 'Kirim ulang email' ,
                    //         'updated_at' => Carbon::now()->toDateTimeString(),
                    //     ];
                    //     // Insert Activity Log
                    //     DB::table('catatans')->insert($activitylog);
                    
                  }   

           
            
            // Setup email message   
                $data =[
                'important' => 'Harap segera membuat pengaduan. Batas pembuatan pengaduan yaitu 10 menit',
                'note' => 'Jika setelah 10 menit belum membuat pengaduan. Maka anda diharuskan meregistrasikan kembali email anda',
                'content' => 'Ini adalah link baru anda untuk membuat pengaduan. Silahkan klik button di bawah ini untuk membuat pengaduan ',
                'url' => 'http://127.0.0.1:8000/pengaduan/create/'. $newtoken,
                ];
            // Kirim ke email
                Mail::to($validated['email'])->send(new VerifyAlternative($data));
                Alert::success('Batas pembuatan pengaduan yaitu 10 Menit', 'Link baru sudah dikirimkan. Silahkan cek email anda untuk membuat pengaduan');
            return redirect()->route('pengaduan.check')
                             ->with('berhasil','Link baru sudah dikirimkan. Silahkan cek email anda untuk membuat pengaduan');
    }

// =====================================================================================
// Create Pengaduan
    public function create(Pengaduan $pengaduan , Request $request){
    // Automatically delete data who are over 10 minutes
        app('App\Http\Controllers\HelperController')->automatically_delete_data();


        return view('pengaduan.create',[
            'title' => 'Buat Pengaduan',
            'page_title_1' => 'Masukkan pengaduan anda di bawah ini',
            'page_title_2' => '',
            // 'tujuan' => Tujuan::all(), // Untuk pangge tujuan pengaduan
            'tujuan' => Tujuan::where('id',1)
                         ->orwhere('id',2)       
                         ->orwhere('id',3)       
                         ->orwhere('id',4)       
                         ->orwhere('id',5)       
                         ->orwhere('id',6)       
                         ->orwhere('id',7)            
                         ->orwhere('id',9)            
                        ->get(), // Untuk pangge tujuan pengaduan
            'token' => $request->url(), // request->url is to take the request from url
            "pengaduan" =>$pengaduan->load('tujuan')
        ]);
    } 

    public function store(Pengaduan $pengaduan, Request $request){
        $validator = Validator::make($request->all(),[
            'nama' => 'required',
            'judul' => 'required|max:255',
            'isi' => 'required',
            'tujuan_id' => 'required|in:1,2,3,4,5,6,7,9',
            'visitor_image_1' => 'required|image|file|max:1024',
            'visitor_image_2' => '|image|file|max:1024',
            'visitor_image_3' => '|image|file|max:1024',
        ],
        [
            'nama.required' => 'Nama harus diisi',
            'judul.required' => 'Judul Harus diisi',
            'tujuan_id.required' => 'Pilih Tujuan Pengaduan',
            'tujuan_id.in' => 'Pilih Tujuan Pengaduan',
            'isi.required' => 'Isi tidak boleh kosong',
            'visitor_image_1.required' => 'Gambar 1 tidak boleh kosong',
            'visitor_image_1.image' => 'Gambar 1 harus format gambar',
            'visitor_image_1.max' => 'Gambar 1 tidak boleh lebih dari 1MB',
            'visitor_image_2.image' => 'Gambar 2 harus format gambar',
            'visitor_image_2.max' => 'Gambar 2 tidak boleh lebih dari 1MB',
            'visitor_image_3.image' => 'Gambar 3 harus format gambar',
            'visitor_image_3.max' => 'Gambar 3 tidak boleh lebih dari 1MB',
        ]);
        // Kalo error kase alert error
            if($validator->fails()){
                return back()->with('toast_error', $validator->errors()->all()[0])->withInput()->withErrors($validator);
            }
        // Validasi
            // $validatedData = $request->validate($rules);
            $validatedData = $validator->validated();

            
        // Kalo image ada isi, store(), kalo nda kasih nilai null
            if($request->file('visitor_image_2')){
                $validatedData['visitor_image_2'] = $request->file('visitor_image_2')
                                                            ->store('image');
            }
            if($request->file('visitor_image_3')){
                $validatedData['visitor_image_3'] = $request->file('visitor_image_3')
                                                            ->store('image');
            }
        $validatedData['visitor_image_1'] = $request->file('visitor_image_1')->store('image');
        $validatedData['token'] = null;
        $validatedData['kode'] = Str::random(10);
        $validatedData['status'] = 'Pengaduan Masuk';
        $validatedData['published_at'] = Carbon::now()->toDateTimeString();     
        $validatedData['used_email'] = $pengaduan->email;  
      
        
        $tujuan = $request->tujuan_id;
            // buat kondisi untuk menamakan tujuan 
                if($tujuan == 1){$tujuan = 'Jaringan';}
                elseif($tujuan == 2){$tujuan = 'Server';}
                elseif($tujuan == 3){$tujuan = 'Sistem Informasi';}
                elseif($tujuan == 4){$tujuan = 'Website unima';}
                elseif($tujuan == 5){$tujuan = 'Learning Management System';}
                elseif($tujuan == 6){$tujuan = 'Ijazah';}
                elseif($tujuan == 7){$tujuan = 'Slip';}
                elseif($tujuan == 9){$tujuan = 'Lain-lain';}

            // Hapus data 1 
                if (Pengaduan::Where('id', '1')){
                    Pengaduan::where('id', '1')->delete();
                    // Tujuan::where('id','8')->delete();
                }

        // Activity Log setup 
            $activitylog = [
                'pengaduan_id' => $pengaduan->id,
                'opener' => '+',
                'user' => 'User :'.' '.$pengaduan->email,
                'do' => 'membuat pengaduan ke : '. $tujuan,
                'updated_at' => Carbon::now()->toDateTimeString(),
            ];
    // Insert activity log and update pengaduan 
        DB::table('catatans')->insert($activitylog);
    // Create Pengaduan
        Pengaduan::where('id',$pengaduan->id)->update($validatedData);

    // Setup Email message 
        $data =[
            'header' => 'Selamat datang di APL Pusat Komputer ',
            'content' => 'Gunakan kode berikut untuk cek detail pengaduan anda',
            'status' =>   $validatedData['kode'] ,
            ];

    // Kirim Email
       Mail::to($pengaduan->email)->send(new SendMailVisitor ($data));
       Alert::success('Pengaduan berhasil dibuat', 'Silahkan cek email anda untuk melihat kode pengaduan');
       return redirect()->route('pengaduan.search')
                        ->with('berhasil', 'Pengaduan Berhasil dibuat. Silahkan cek email anda untuk melihat kode pengaduan');
    }

// ========================================================================================== 
    public function search(Request $request){
  // Automatically delete data who are over 10 minutes
    app('App\Http\Controllers\HelperController')->automatically_delete_data();


        // Kalo mo ubah paginasi ubah juga variabelnya like this 5->all
        $pagination = 5;
        $search = request('kode');

        // Lakukan pengecekan terhadap request search yang dikirim dari Button pengaduan/search.blade.php
        if($search){ 
            // Jika request seach sama dengan filter[search] query dari database maka tampilkan hasilnya
            $cari = Pengaduan::filter(request(['kode']));
        } else{
            // Jika tidak sama jangan tampilkan pake auto search "-"
            $cari =  Pengaduan::where('kode','-');
        }
        
        return view ('pengaduan.search',[
            "title" => "Cari Pengaduan",
            // Kalau ada request yang berisi search didalam filter maka ambil datanya (get)
            // "kode" => Pengaduan::filter(request(['search']))->paginate(5)->withQueryString(),
            "kode" => $cari->paginate(5)->withQueryString(), // Ambil filter dari model Pengaduan, apapun yang ada di query string sebelumnya bawa
            'page_title_1' => 'Masukkan kode pengaduan yang masuk',
            'page_title_2' => 'di email kalian untuk melihat detail pengaduan',
        ])->with('i', ($request->input('page', 1) - 1) * $pagination); // code for paginate       
    }

    public function detail(Pengaduan $pengaduan){
  // Automatically delete data who are over 10 minutes
    app('App\Http\Controllers\HelperController')->automatically_delete_data();



        return view('pengaduan.detail',[
            "title" => "Detail Pengaduan",
            // Lazy Eager Loading
            "pengaduan" =>$pengaduan->load('tujuan'),
            'log' => Catatan::where('pengaduan_id', $pengaduan->id)->get()->load('pengaduan'),
        ]);
    }

    // ================================== For Rating ========================================
    public function detail_store(Pengaduan $pengaduan, Request $request){
        //yang lama
        // $validatedata = $request->validate([
        //         'rating' => 'required',
        //         'komentar' => 'required'
        //     ],
        //     [
        //         'rating.required' => 'Rating harus diisi',
        //         'komentar.required' => 'Komentar harus diisi'
        //     ]);


        $validator = Validator::make($request->all(),[
            'rating' => 'required',
            'komentar' => 'required'
        ],
        [
            'rating.required' => 'Rating harus diisi',
            'komentar.required' => 'Komentar harus diisi'
        ]);
        // Kalo error kase alert error
            if($validator->fails()){
                return back()->with('toast_error', $validator->errors()->all()[0])->withInput()->withErrors($validator);
            }
        // Validasi
            // $validatedData = $request->validate($rules);
            $validatedData = $validator->validated();

    // kalo request komentar tidak sama dengan null (ada isi)
        // if($request->komentar !=  null ){
        //     // ambe depe data
        //     $validatedata['komentar'] = $request->komentar;
        // }

    // Update rating
    Pengaduan::where('id' , $pengaduan->id)->update($validatedData);

        // Setup Activity Log
            $activitylog = [
                'pengaduan_id' => $pengaduan->id,
                'opener' => '+',
                'user' => 'User :'.' '.$pengaduan->nama,
                'do' => 'Menambahkan rating',
                'updated_at' => Carbon::now()->toDateTimeString(),
            ];
            // Insert activity log
            DB::table('catatans')->insert($activitylog);

    return back()->with('success','Rating berhasil ditambahkan');
    }


//  ==================================== POV ADMIN ==============================================

}
