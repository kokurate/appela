<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\PengaduanController;
use Illuminate\Support\Facades\DB;



class AuthController extends Controller
{
    public function cannot_access(){
        return view('cannot_access');
    }

    public function index(){
    // Automatically delete data who are over 10 minutes
        // app('App\Http\Controllers\HelperController')->automatically_delete_data();
        
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
                elseif ($user->level == 'verifikator'){
                    $request->session()->regenerate();
                    return redirect()->intended('admin');
                }
                elseif ($user->level == 'petugas'){
                    $request->session()->regenerate();
                    return redirect()->intended('admin');
                }
                elseif ($user->level == 'jaringan'){
                    $request->session()->regenerate();
                    return redirect()->intended('jaringan');
                }
                elseif ($user->level == 'server'){
                    $request->session()->regenerate();
                    return redirect()->intended('server');
                }
                elseif ($user->level == 'sistem_informasi'){
                    $request->session()->regenerate();
                    return redirect()->intended('sistem-informasi');
                }
                elseif ($user->level == 'website_unima'){
                    $request->session()->regenerate();
                    return redirect()->intended('website-unima');
                }
                elseif ($user->level == 'lms'){
                    $request->session()->regenerate();
                    return redirect()->intended('learning-management-system');
                }
                elseif ($user->level == 'ijazah'){
                    $request->session()->regenerate();
                    return redirect()->intended('ijazah');
                }
                elseif ($user->level == 'slip'){
                    $request->session()->regenerate();
                    return redirect()->intended('slip');
                }
                elseif ($user->level == 'lain_lain'){
                    $request->session()->regenerate();
                    return redirect()->intended('lain-lain');
                }


                // Jika tidak semua maka akan dikembalikan ke halaman route
                toast('Login Gagal','error');
                return redirect()->intended('login')->with('gagal', 'Login Gagal');
        } else
        // Jika tidak login maka kembalikan ke halaman login
        toast('Login Gagal','error');
        return back()->with('gagal', 'Login Gagal');


    }

    public function logout(Request $request){
        Auth::logout($request);
        
        $request->session()->invalidate();
        
        $request->session()->regenerateToken();

        $request->session()->flash('berhasil', 'Anda Berhasil Keluar');
        toast('Anda berhasil keluar','success');
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
        // dd($request);
        $validator = Validator::make ($request->all(),[
            'level' => 'required|in:petugas,verifikator,jaringan,server,sistem_informasi,website_unima,lms,ijazah,slip,lain_lain',
            'name' => 'required|max:255',
            // 'phone' => ['required', 'min:10', 'max:15','numeric', 'unique:users' ],
            // 'email' => 'required|email:dns|unique:users',
            'email' => 'required|email|unique:users',
            'phone' => 'required|numeric|unique:users|digits_between:12,15',
            'password' => 'required|min:8|max:255',
            // 'level' => 'required|in:Petugas,Jaringan,Server,Sistem Informasi,Website UNIMA,Learning Management System,Ijazah,Slip',
        ],
        [
            'name.required' => 'Nama harus diisi',
            'name.max' => 'Nama maksimal 255 karakter',
            'phone.numeric' => 'Nomor Handphone harus angka',
            'phone.unique' => 'Nomor handphone sudah terdaftar',
            'phone.digits_between' => 'Nomor handphone minimal 12 maksimal 15',
            'phone.digits_between' => 'Nomor handphone minimal 12 maksimal 15',
            'password.min' => 'Password minimal 8 karakter',
            'password.max' => 'Password maksimal 255 karakter',
            'password.required' => 'Password harus diisi',
            'level.required' => 'Level Admin harus diisi',
            'level.in' => 'Level Admin harus diisi',
            // 'level.required' 
        ]);


      // Sebelum update Cek dlu kalo misalnya role petugas kase required untuk hak akses
      if($request['level'] == 'petugas'){
        // $validator = Validator::make ($request->all(),[
            // $validated_if =$request->validate([
        $validator_if = $request->validate([
        //   'can' => 'required|min:1',
        // 'can_jaringan','can_server','can_sistem_informasi','can_website_unima','can_lms','can_ijazah','can_slip','can_lain_lain' => 'min:1'
          'can_jaringan' => 'nullable',
          'can_server' => 'nullable',
          'can_sistem_informasi' => 'nullable',
          'can_website_unima' => 'nullable',
          'can_lms' => 'nullable',
          'can_ijazah' => 'nullable',
          'can_slip' => 'nullable',
          'can_lain_lain' => 'nullable',
        ],
      [
        // 'can.min' => 'Akses harus diisi minimal 1'
      ]);

    }
    //   DB::table('users')->insert($validator_if );
    //   if($request->can == 'jaringan'){ DB::table('catatans')->insert($validator_if );}
    //   if($request->can_jaringan == 'jaringan'){ $request->can_jaringan = 1 ; $validatedData = $request;}
    //   if($request->can_jaringan == 'jaringan'){ $validatedData['can_jaringan'] = 1;}
   
    // dd($validator);
    

        // Kalo error kase alert error
             if($validator->fails()){
                return back()->with('toast_error', $validator->errors()->all()[0])->withInput()->withErrors($validator);
             }
      
        // Validasi
        $validatedData = $validator->validate();

        // Jika data lolos Enkripsi password 
        // $validatedData['password'] = bcrypt($validatedData['password']);
        // dd($validatedData);
        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData );

        // if($validated_checkout == 'jaringan'){ DB::table('users')->where('email', $validatedData['email'])->insert(['can_jaringan' =>  1]);}
        
        if($request['level'] == 'petugas'){
            if($validator_if != null){
                DB::table('users')->where('email', $validatedData['email'])->update($validator_if );
            }
        }

        
        // if($validatedData['can_jaringan']){ $validatedData['can_jaringan'] = 1;}
        // $id = $user->id;
        // if($request['can'] == 'jaringan'){ User::where('id', $id)->insert(['can_jaringan' => 1]);}
        // if($request['can'] == 'server'){ $validatedData = User::create(['can_server' => 1]);}
     

        // $request->session()->flash('success','Registrasi berhasil');
        return redirect()->back()->with('success','Registrasi berhasil');
    }

    public function destroy(User $user){

        User::destroy($user->id);

        return back()->with('success','Data berhasil dihapus');
    }

}
