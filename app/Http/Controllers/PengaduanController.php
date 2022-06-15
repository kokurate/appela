<?php

namespace App\Http\Controllers;

use App\Mail\VerifyAlternative;
use App\Models\Tujuan;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class PengaduanController extends Controller
{
    public function index(){
        return view('pengaduan.index');
    }

    public function verify(Request $request){
         // Ambil semua request terus validasi
        // request()->all();
        // Deklarasi email unima
        
        

        $validatedData = $request->validate([
            // 'email' => 'required|email:dns|unique:pengaduans',
            'email' => 'required|unique:pengaduans', 
        ],
        [
            'email.unique' => 'Email ini sedang melakukan Pengaduan. Tunggu pengaduan selesai untuk membuat pengaduan kembali  '
        ]
        );
     
    // Jika data lolos buat email unima
    $input = $request->email;
    $unima = '@unima.ac.id';
    $emailunima = $input .= $unima; 

    $validatedData['email'] = $emailunima;

        //ambil email request jadikan email unima 
        $validatedData['token'] = Str::random(127);


        Pengaduan::create($validatedData);

        // Deklarasi tu mo kirim dorang pe link create di email
        $email =  $validatedData['email'];
            $data =[
                'content' => 'Untuk membuat pengaduan silahkan klik button di bawah ini',
                'url' => 'http://127.0.0.1:8000/pengaduan/create/'. $validatedData['token'],
            ];

        // Kirim ke email
          Mail::to($email)->send(new VerifyAlternative($data));
        // $request->session()->flash('success','Registrasi berhasil');
        return redirect()->route('pengaduan.check')->with('success','Registrasi Email berhasil. Silahkan cek email anda untuk membuat pengaduan');
    }

    // Halaman resending email dan landing page saat berhasil registrasi email
    public function check(){
        return view('pengaduan.check');
    }

    public function resend_email(Request $request){
        $validatedData = $request->validate([
            // 'email' => 'required|email:dns|unique:pengaduans',
            'email' => 'required|', 
        ],
        [
            'email.unique' => 'Email ini sedang melakukan Pengaduan. Tunggu pengaduan selesai untuk membuat pengaduan kembali  '
        ]
        );

        $email = $validatedData['email'];

      
        
        $newtoken = Str::random(127);
            // Pengaduan::where('email', $email)
        //           ->where('status', 'Verified')->firstOrFail()
        //           ->update(['token' => $newtoken ]);

        // Kalo input email nda ada verified di status
        $post=  Pengaduan::where('email', $email)->first();

                // Tampilkan error
                  if(is_null($post)) {
                      return redirect()->route('pengaduan.check')->with('error','Email belum terverifikasi');
                  }
                        //Kalo sesuai update token   
                  else{
                    Pengaduan::where('email', $email)
                              ->update(['token' => $newtoken ]);
            
                  }


            // Pengaduan::where('email', $email)->update(['token' => $newtoken ]);
    
           
            // Deklarasi tu mo kirim dorang pe link create di email
            $email =  $validatedData['email'];
                $data =[
                    'content' => 'Ini adalah link baru anda untuk membuat pengaduan. Silahkan klik button di bawah ini untuk membuat pengaduan ',
                    'url' => 'http://127.0.0.1:8000/pengaduan/create/'. $newtoken,
                ];
    
            // Kirim ke email
              Mail::to($email)->send(new VerifyAlternative($data));
            // $request->session()->flash('success','Registrasi berhasil');
            return redirect()->route('pengaduan.check')->with('success','Link baru sudah dikirimkan. Silahkan cek email anda untuk membuat pengaduan');
    
            


    }

    public function create(Pengaduan $pengaduan){
        return 'tes';
    }
}
