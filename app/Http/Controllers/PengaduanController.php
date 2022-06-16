<?php

namespace App\Http\Controllers;

use App\Http\Requests\PengaduanRequest;
use App\Http\Requests\Resend_emailRequest;
use App\Http\Requests\VerifyRequest;
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


public function verify(VerifyRequest $request)
{
    // Verify using PengaduanRequest
    $validated = array_merge($request->validated(), ['token' => Str::random(127)]);
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
        // Pengaduan::create($validated);
    
        $newtoken = Str::random(127);
            // Pengaduan::where('email', $email)
        //           ->where('status', 'Verified')->firstOrFail()
        //           ->update(['token' => $newtoken ]);

        // Kalo input email nda ada verified di status


        $post=  Pengaduan::where('email', $validated['email'])->first();

                // Tampilkan error
                  if(is_null($post)) {
                      return redirect()->route('pengaduan.check')->with('error','Email belum terverifikasi');
                  }
                        //Kalo sesuai update token   
                  else{
                    Pengaduan::where('email', $validated['email'])
                              ->update(['token' => $newtoken ]);
                  }

            // Pengaduan::where('email', $email)->update(['token' => $newtoken ]);
    
                $data =[
                    'content' => 'Ini adalah link baru anda untuk membuat pengaduan. Silahkan klik button di bawah ini untuk membuat pengaduan ',
                    'url' => 'http://127.0.0.1:8000/pengaduan/create/'. $newtoken,
                ];
    
            // Kirim ke email
              Mail::to($validated['email'])->send(new VerifyAlternative($data));

            return redirect()->route('pengaduan.check')->with('success','Link baru sudah dikirimkan. Silahkan cek email anda untuk membuat pengaduan');
    }

    public function create(Pengaduan $pengaduan){
        return 'tes';
    }
}
