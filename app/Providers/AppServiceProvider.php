<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;





class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Default using Tailwind
        Paginator::useBootstrap();

        // except verifikator ini buat proses dan update
        Gate::define('except_verifikator', function (User $user){
            return $user->level == 'admin' || 
                    $user->level == 'petugas'|| 
                    $user->level == 'jaringan'|| 
                    $user->level == 'server'|| 
                    $user->level == 'sistem_informasi'|| 
                    $user->level == 'website_unima'|| 
                    $user->level == 'lms'|| 
                    $user->level == 'ijazah'|| 
                    $user->level == 'slip'|| 
                    $user->level == 'lain_lain' ;
        });

        // admin
        Gate::define('admin', function (User $user){
            return $user->level == 'admin';
        });

        // petugas
        Gate::define('petugas', function (User $user){
            return $user->level == 'petugas';
        });

        // verifikator
        Gate::define('verifikator', function (User $user){
            return $user->level == 'verifikator';
        });

        // verifikator
        Gate::define('admin_verifikator', function (User $user){
            return $user->level == 'verifikator' || $user->level == 'admin';
        });

        // Jaringan
        Gate::define('jaringan', function (User $user){
            return $user->level == 'jaringan' || $user->level == 'admin' || $user->can_jaringan = 1;
        });

        // Server
        Gate::define('server', function (User $user){
            return $user->level == 'server' || $user->level == 'admin' || $user->can_server = 1;
        });

        // Sistem Informasi
        Gate::define('sistem_informasi', function (User $user){
            return $user->level == 'sistem_informasi' || $user->level == 'admin' || $user->can_sistem_informasi = 1;
        });

        // Website Unima
        Gate::define('website_unima', function (User $user){
            return $user->level == 'website_unima' || $user->level == 'admin' || $user->can_website_unima = 1;
        });

        // Learning Management System
        Gate::define('lms', function (User $user){
            return $user->level == 'lms' || $user->level == 'admin' || $user->can_lms = 1;
        });

        // Ijazah
        Gate::define('ijazah', function (User $user){
            return $user->level == 'ijazah' || $user->level == 'admin' || $user->can_ijazah = 1;
        });

        // Slip
        Gate::define('slip', function (User $user){
            return $user->level == 'slip' || $user->level == 'admin' || $user->can_slip = 1;
        });

        // Lain lain
        Gate::define('lain_lain', function (User $user){
            return $user->level == 'lain_lain' || $user->level == 'admin' || $user->can_lain_lain = 1;
        });

    // =============================== Dashboard =============================
    // Jaringan
    Gate::define('jaringanDashboard', function (User $user){
        return $user->level == 'jaringan' || $user->can_jaringan == 1;;
    });

    // Server
    Gate::define('serverDashboard', function (User $user){
        return $user->level == 'server' || $user->can_server == 1;
    });

    // Sistem Informasi
    Gate::define('sistem_informasiDashboard', function (User $user){
        return $user->level == 'sistem_informasi' || $user->can_sistem_informasi == 1;
    });

    // Website Unima
    Gate::define('website_unimaDashboard', function (User $user){
        return $user->level == 'website_unima' || $user->can_website_unima == 1;
    });

    // Learning Management System
    Gate::define('lmsDashboard', function (User $user){
        return $user->level == 'lms' || $user->can_lms == 1;
    });

    // Ijazah
    Gate::define('ijazahDashboard', function (User $user){
        return $user->level == 'ijazah' || $user->can_ijazah == 1;
    });

    // Slip
    Gate::define('slipDashboard', function (User $user){
        return $user->level == 'slip' || $user->can_slip == 1;
    });

    // Lain lain
    Gate::define('lain_lainDashboard', function (User $user){
        return $user->level == 'lain_lain' || $user->can_lain_lain == 1;
    });

// ==================================================== Only ================================
    // Jaringan
    Gate::define('jaringan_only', function (User $user){
        return $user->can_jaringan == 1 && $user->level == 'petugas';
    });

    // server
    Gate::define('server_only', function (User $user){
        return $user->can_server == 1 && $user->level == 'petugas';
    });

    // sistem_informasi
    Gate::define('sistem_informasi_only', function (User $user){
        return $user->can_sistem_informasi == 1 && $user->level == 'petugas';
    });

    // website_unima
    Gate::define('website_unima_only', function (User $user){
        return $user->can_website_unima == 1 && $user->level == 'petugas';
    });

    // lms
    Gate::define('lms_only', function (User $user){
        return $user->can_lms == 1 && $user->level == 'petugas';
    });

    // ijazah
    Gate::define('ijazah_only', function (User $user){
        return $user->can_ijazah == 1 && $user->level == 'petugas';
    });

    // slip
    Gate::define('slip_only', function (User $user){
        return $user->can_slip == 1 && $user->level == 'petugas';
    });

    // lain_lain
    Gate::define('lain_lain_only', function (User $user){
        return $user->can_lain_lain == 1 && $user->level == 'petugas';
    });


    }
}
