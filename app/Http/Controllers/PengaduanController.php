<?php

namespace App\Http\Controllers;

use App\Models\Tujuan;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PengaduanController extends Controller
{
    public function index(){
        return view('pengaduan.index');
    }

    public function verify(Request $request){
         // Ambil semua request terus validasi
        // request()->all();
        $validatedData = $request->validate([
            // 'email' => 'required|email:dns|unique:pengaduans',
            'email' => 'required|unique:pengaduans',
         
         
        ]);
        // Jika data lolos kirim ke email
       
        // Deklarasi email unima
        $input = $request->email;
        $unima = '@unima.ac.id';
        $emailunima = $input .= $unima; 

        //ambil email request jadikan email unima 
        $validatedData['email'] = $emailunima;
        $validatedData['token'] = Str::random(255);

        dd($validatedData);
        Pengaduan::create($validatedData);
        // $request->session()->flash('success','Registrasi berhasil');
        return redirect()->route('register')->with('success','Registrasi berhasil');
    }
}
