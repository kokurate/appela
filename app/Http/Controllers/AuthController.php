<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function cannot_access(){
        return view('cannot_access');
    }

    public function index(){
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            // 'email' => 'required|email:dns',
            'email' => 'required|',
            'password' => 'required'
        ]);
        // $credentials =  $request->only('email','password');
            // Jika login berhasil
            if (Auth::attempt($credentials)){
                // Lakukan pengecekan level
                $user = Auth::user();
                if($user->level == 'admin'){
                    $request->session()->regenerate(); //pake regenerate session supaya terhindar serangan yang memanfaatkan session, taso lupa apa dpe nama serangan
                    return redirect()->intended('admin');
                }
                elseif ($user->level == 'jaringan'){
                    $request->session()->regenerate();
                    return redirect()->intended('jaringan');
                }
                // Jika tidak semua maka akan dikembalikan ke halaman route
                return redirect()->intended('login')->with('error', 'Login Gagal');
        } else
        // Jika tidak login maka kembalikan ke halaman login
        return back()->with('error', 'Login Gagal');


    }

    public function logout(Request $request){
        Auth::logout($request);
        
        $request->session()->invalidate();
        
        $request->session()->regenerateToken();

        $request->session()->flash('success', 'Anda Berhasil Keluar');
        
        return redirect()->route('login');
    
    }

}
