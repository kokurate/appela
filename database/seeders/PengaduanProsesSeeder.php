<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pengaduan;
class PengaduanProsesSeeder extends Seeder
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
            'kode' => 'wefwefefw',
            'email' => 'aasdasdasdsd@unima.ac.id',
            'status' => 'Pengaduan Sedang Diproses',
            'nama' => 'Serda Bapura',
            // 'isi' => '<p>'. implode('</p><p>', $this->faker->Paragraphs(mt_rand(4,7))).'</p>',
            'isi' => '    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p><p> Aperiam debitis quo ipsa, explicabo ab ad velit nemo eligendi repellat voluptate ratione magnam deleniti possimus laboriosam blanditiis quidem non dolor excepturi adipisci aliquid quae dolorem.</p>',
            'tujuan_id' => 1,
            'token' =>1232323 ,
        ]);

        Pengaduan::create([
            'judul' => 'judul kedua',
            'kode' => 'dfthyukuysdda',
            'email' => 'haha@unima.ac.id',
            'status' => 'Pengaduan Sedang Diproses',
            'nama' => 'Muhammad Rasyid',
            // 'isi' => '<p>'. implode('</p><p>', $this->faker->Paragraphs(mt_rand(4,7))).'</p>',
            'isi' => '    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p><p> Aperiam debitis quo ipsa, explicabo ab ad velit nemo eligendi repellat voluptate ratione magnam deleniti possimus laboriosam blanditiis quidem non dolor excepturi adipisci aliquid quae dolorem.</p>',
            'tujuan_id' =>1,
            'token' =>22323233 ,
        ]);

        Pengaduan::create([
            'judul' => 'judul ketiga',
            'kode' => 'asdshythysac',
            'email' => 'wwew@unima.ac.id',
            'status' => 'Pengaduan Sedang Diproses',
            'nama' => 'Robby Liu',
            // 'isi' => '<p>'. implode('</p><p>', $this->faker->Paragraphs(mt_rand(4,7))).'</p>',
            'isi' => '    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p><p> Aperiam debitis quo ipsa, explicabo ab ad velit nemo eligendi repellat voluptate ratione magnam deleniti possimus laboriosam blanditiis quidem non dolor excepturi adipisci aliquid quae dolorem.</p>',
            'tujuan_id' => 1,
            'token' =>3232323 ,
        ]);

        Pengaduan::create([
            'judul' => 'judul ketiga',
            'kode' => 'asdssderbrac',
            'email' => 'wweasaw@unima.ac.id',
            'status' => 'Pengaduan Sedang Diproses',
            'nama' => 'Robby Liu',
            // 'isi' => '<p>'. implode('</p><p>', $this->faker->Paragraphs(mt_rand(4,7))).'</p>',
            'isi' => '    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p><p> Aperiam debitis quo ipsa, explicabo ab ad velit nemo eligendi repellat voluptate ratione magnam deleniti possimus laboriosam blanditiis quidem non dolor excepturi adipisci aliquid quae dolorem.</p>',
            'tujuan_id' => 1,
            'token' =>442 ,
        ]);
    }
}
