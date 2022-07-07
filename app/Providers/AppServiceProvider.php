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

        // Jaringan
        Gate::define('petugas', function (User $user){
            return $user->level == 'petugas';
        });

        // Jaringan
        Gate::define('jaringan', function (User $user){
            return $user->level == 'jaringan';
        });


    }
}
