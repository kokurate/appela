<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PengaduanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // mt_rand untuk membangkitkan bilangan random, ada 2 value (minimal, maksimal)
            'judul' => $this->faker->sentence(mt_rand(4,10)),
            'kode' => $this->faker->slug(),
            'email' => $this->faker->unique()->safeEmail(),
            'status' => 'Pengaduan Sedang Diverifikasi',
            'nama' => $this->faker->name(),
            // 'isi' => '<p>'. implode('</p><p>', $this->faker->Paragraphs(mt_rand(4,7))).'</p>',
            'isi' => collect($this->faker->Paragraphs(mt_rand(4,7)))
                    ->map(fn($p) => "<p>$p</p>")
                    ->implode(''), //jpin pakai kutip
                    // collect dijadikan array lalu dibungkus dengan tag p ditengah"nya kasih faker
            'tujuan_id' => mt_rand(1,7),
            'token' =>Str::random(255) ,
        ];
    }
}
