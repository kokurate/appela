<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JaringanController extends Controller
{
    public function index(){
        return view('_jaringan.index');
      }


}
