<?php

namespace Database\Seeders;

use App\Models\Pengaduan;
use Illuminate\Database\Seeder;

class PengaduanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pengaduan::create([
            'judul' => 'judul pertama',
            'kode' => 'kode1',
            'email' => 'asd@unima.ac.id',
            'status' => 'Pengaduan Masuk',
            'nama' => 'Serda Bapura',
            // 'isi' => '<p>'. implode('</p><p>', $this->faker->Paragraphs(mt_rand(4,7))).'</p>',
            'isi' => '    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p><p> Aperiam debitis quo ipsa, explicabo ab ad velit nemo eligendi repellat voluptate ratione magnam deleniti possimus laboriosam blanditiis quidem non dolor excepturi adipisci aliquid quae dolorem.</p>',
            'tujuan_id' => mt_rand(1,7),
            'token' =>1 ,
        ]);

        Pengaduan::create([
            'judul' => 'judul kedua',
            'kode' => 'kode2',
            'email' => 'appela@unima.ac.id',
            'status' => 'Pengaduan Masuk',
            'nama' => 'Muhammad Rasyid',
            // 'isi' => '<p>'. implode('</p><p>', $this->faker->Paragraphs(mt_rand(4,7))).'</p>',
            'isi' => '    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p><p> Aperiam debitis quo ipsa, explicabo ab ad velit nemo eligendi repellat voluptate ratione magnam deleniti possimus laboriosam blanditiis quidem non dolor excepturi adipisci aliquid quae dolorem.</p>',
            'tujuan_id' => mt_rand(1,7),
            'token' =>2 ,
        ]);

        Pengaduan::create([
            'judul' => 'judul ketiga',
            'kode' => 'kode3',
            'email' => 'testing@unima.ac.id',
            'status' => 'Pengaduan Sedang Diverifikasi',
            'nama' => 'Robby Liu',
            // 'isi' => '<p>'. implode('</p><p>', $this->faker->Paragraphs(mt_rand(4,7))).'</p>',
            'isi' => '    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p><p> Aperiam debitis quo ipsa, explicabo ab ad velit nemo eligendi repellat voluptate ratione magnam deleniti possimus laboriosam blanditiis quidem non dolor excepturi adipisci aliquid quae dolorem.</p>',
            'tujuan_id' => mt_rand(1,7),
            'token' =>3 ,
        ]);
    }
}
