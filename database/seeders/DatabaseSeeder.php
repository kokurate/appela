<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

          // Admin
          User::create([
            'name' => 'Kokurate',
            'level' => 'admin',
            'email' => 'admin@unima.ac.id',
            'phone' => '0852123658421',
            'password' => bcrypt('password'), //password
        ]);

    // Petugas
    User::create([
            'name' => 'petugas',
            'level' => 'petugas',
            'email' => 'petugas@unima.ac.id',
            'phone' => '0254687632159',
            'password' => bcrypt('password'), //password
        ]);

    // Jaringan
    User::create([
            'name' => 'jaringan',
            'level' => 'jaringan',
            'email' => 'jaringan@unima.ac.id',
            'phone' => '08521236354891',
            'password' => bcrypt('password'), //password
        ]);
    }
}
