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

        // except verifikator
        Gate::define('except_verifikator', function (User $user){
            return $user->level == 'admin' || 
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

        // verifikator
        Gate::define('verifikator', function (User $user){
            return $user->level == 'verifikator';
        });

        // Jaringan
        Gate::define('jaringan', function (User $user){
            return $user->level == 'jaringan' || $user->level == 'admin';
        });

        // Server
        Gate::define('server', function (User $user){
            return $user->level == 'server' || $user->level == 'admin';
        });

        // Sistem Informasi
        Gate::define('sistem_informasi', function (User $user){
            return $user->level == 'sistem_informasi' || $user->level == 'admin';
        });

        // Website Unima
        Gate::define('website_unima', function (User $user){
            return $user->level == 'website_unima' || $user->level == 'admin';
        });

        // Learning Management System
        Gate::define('lms', function (User $user){
            return $user->level == 'lms' || $user->level == 'admin';
        });

        // Ijazah
        Gate::define('ijazah', function (User $user){
            return $user->level == 'ijazah' || $user->level == 'admin';
        });

        // Slip
        Gate::define('slip', function (User $user){
            return $user->level == 'slip' || $user->level == 'admin';
        });

        // Lain lain
        Gate::define('lain_lain', function (User $user){
            return $user->level == 'lain_lain' || $user->level == 'admin';
        });

    // =============================== Dashboard =============================
    // Jaringan
    Gate::define('jaringanDashboard', function (User $user){
        return $user->level == 'jaringan';
    });

    // Server
    Gate::define('serverDashboard', function (User $user){
        return $user->level == 'server';
    });

    // Sistem Informasi
    Gate::define('sistem_informasiDashboard', function (User $user){
        return $user->level == 'sistem_informasi';
    });

    // Website Unima
    Gate::define('website_unimaDashboard', function (User $user){
        return $user->level == 'website_unima';
    });

    // Learning Management System
    Gate::define('lmsDashboard', function (User $user){
        return $user->level == 'lms';
    });

    // Ijazah
    Gate::define('ijazahDashboard', function (User $user){
        return $user->level == 'ijazah';
    });

    // Slip
    Gate::define('slipDashboard', function (User $user){
        return $user->level == 'slip';
    });

    // Slip
    Gate::define('lain_lainDashboard', function (User $user){
        return $user->level == 'lain_lain';
    });



    }
}
