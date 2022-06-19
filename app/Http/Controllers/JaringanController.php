<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JaringanController extends Controller
{
    public function index(Request $request){
     // Kalo mo ubah paginasi ubaj juga variabelnya like this 15->all
     $pagination = 2;


        return view('_jaringan.index',[
          'title' => 'Ini halaman jaringan setelah login',
          'pengaduan' => Pengaduan::where('status','Pengaduan Sedang Diverifikasi')
                                  ->where('tujuan_id','1')
                                  ->paginate(2)->withQueryString(), 
        ])->with('i', ($request->input('page', 1) - 1) * $pagination); // code for paginate     ;
      }


}
