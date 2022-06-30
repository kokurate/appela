<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
        ],
        [
            'email.required' => 'Email harus diisi',
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

    public function register(){
        return view ('auth.register',[
            'title' => 'Register',
        ]);
    }

    public function store(Request $request){
        // Ambil semua request terus validasi
        // request()->all();
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            // 'phone' => ['required', 'min:10', 'max:15','numeric', 'unique:users' ],
            'phone' => 'required|numeric|unique:users|digits_between:12,15',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255',
            // 'level' => 'required|in:Petugas,Jaringan,Server,Sistem Informasi,Website UNIMA,Learning Management System,Ijazah,Slip',
            'level' => 'required|in:petugas,jaringan,server,sistem_informasi,website_unima,lms,ijazah,slip',
        ]);
        // Jika data lolos Enkripsi password 
        // $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);
        // $request->session()->flash('success','Registrasi berhasil');
        return redirect()->route('register')->with('success','Registrasi berhasil');
    }

}
