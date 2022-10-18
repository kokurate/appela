<?php

namespace Database\Seeders;

use App\Models\Tujuan;
use Illuminate\Database\Seeder;

class TujuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tujuan::create([
            'nama' => 'Jaringan' // 1
        ]);

        Tujuan::create([
            'nama' => 'Server' // 2
        ]);

        Tujuan::create([
            'nama' => 'Sistem Informasi' // 3
        ]);
        Tujuan::create([
            'nama' => 'Website Unima' // 4
        ]);
        Tujuan::create([
            'nama' => 'Learning Management System' // 5
        ]);
        Tujuan::create([
            'nama' => 'Ijazah' // 6
        ]);
        Tujuan::create([
            'nama' => 'Slip' // 7
        ]);
        Tujuan::create([
            'nama' => '-' // 8
        ]);
        Tujuan::create([
            'nama' => 'Lain-lain' // 9
        ]);
    }
}
