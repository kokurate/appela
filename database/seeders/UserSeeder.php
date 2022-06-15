<?php

namespace Database\Seeders;
use App\Models\User;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
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

    // server
    User::create([
            'name' => 'server',
            'level' => 'server',
            'email' => 'server@unima.ac.id',
            'phone' => '08521236354891',
            'password' => bcrypt('password'), //password
        ]);

    // sistem_informasi
    User::create([
            'name' => 'Sistem Informasi',
            'level' => 'sistem_informasi',
            'email' => 'sisteminformasi@unima.ac.id',
            'phone' => '08521236354891',
            'password' => bcrypt('password'), //password
        ]);

    // website_unima
    User::create([
            'name' => 'Website Unima',
            'level' => 'website_unima',
            'email' => 'websiteunima@unima.ac.id',
            'phone' => '08521236354891',
            'password' => bcrypt('password'), //password
        ]);

    // lms
    User::create([
            'name' => 'Learning Management System',
            'level' => 'lms',
            'email' => 'lms@unima.ac.id',
            'phone' => '08521236354891',
            'password' => bcrypt('password'), //password
        ]);

    // ijazah
    User::create([
            'name' => 'ijazah',
            'level' => 'ijazah',
            'email' => 'ijazah@unima.ac.id',
            'phone' => '08521236354891',
            'password' => bcrypt('password'), //password
        ]);

    // slip
    User::create([
            'name' => 'slip',
            'level' => 'slip',
            'email' => 'slip@unima.ac.id',
            'phone' => '08521236354891',
            'password' => bcrypt('password'), //password
        ]);

    }
}
