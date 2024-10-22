<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Beasiswa;

class BeasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Beasiswa::create([
            'nama' => 'Beasiswa Akademik',
        ]);

        Beasiswa::create([
            'nama' => 'Beasiswa Non Akademik',
        ]);

        Beasiswa::create([
            'nama' => 'Beasiswa Prestasi',
        ]);

        Beasiswa::create([
            'nama' => 'Beasiswa Siswa Berprestasi',
        ]);

        Beasiswa::create([
            'nama' => 'Beasiswa Keluarga Tidak Mampu',
        ]);

        // Add more seeder entries as needed
    }
}
