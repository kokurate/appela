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
        Pengaduan::create([
            'judul' => 'judul pertama',
            'kode' => '123',
            'email' => 'asd@unima.ac.id',
            'status' => 'Pengaduan Sedang Diverifikasi',
            'nama' => 'uus kamu kita',
            // 'isi' => '<p>'. implode('</p><p>', $this->faker->Paragraphs(mt_rand(4,7))).'</p>',
            'isi' => '    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p><p> Aperiam debitis quo ipsa, explicabo ab ad velit nemo eligendi repellat voluptate ratione magnam deleniti possimus laboriosam blanditiis quidem non dolor excepturi adipisci aliquid quae dolorem.</p>',
            'tujuan_id' => mt_rand(1,7),
            'token' =>1 ,
        ]);

    // Create a 20 fresh data from factory
        Pengaduan::factory(5)->create();

    //  Call the  Seeder
      $this->call(TujuanSeeder::class);
      $this->call(UserSeeder::class);

    }


}
