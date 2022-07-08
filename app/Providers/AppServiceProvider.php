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

        // admin
        Gate::define('admin', function (User $user){
            return $user->level == 'admin';
        });

        // Petugas
        Gate::define('petugas', function (User $user){
            return $user->level == 'petugas';
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



    }
}
