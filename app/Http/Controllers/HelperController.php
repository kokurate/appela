<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use Carbon\Carbon;


class HelperController extends Controller
{
    // registered list 
    // PengaduanController : index, check, create, search, detail 
    // AdminController : index
    // AuthController : index 
    
    public function automatically_delete_data(){
        $stale_pengaduan = Pengaduan::where('updated_at', '<', Carbon::now()->subMinutes(10))
        ->where('status','Registrasi Email')
        ->get();

        foreach ($stale_pengaduan as $pengaduan) {
        $pengaduan->delete();
        }

      }
}
