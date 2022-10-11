<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Pengaduan;
use App\Models\Tujuan;
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
      
        //  Call the  Seeder
          $this->call(TujuanSeeder::class);
          $this->call(UserSeeder::class);
          $this->call(PengaduanSeeder::class);
        //   $this->call(PengaduanProsesSeeder::class);



    // Create a 20 fresh data from factory
        // Pengaduan::factory(25)->create();


    }


}
