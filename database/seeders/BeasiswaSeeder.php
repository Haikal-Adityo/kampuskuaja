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
        $namas = [
            'Beasiswa Akademik',
            'Beasiswa Non Akademik',
            'Beasiswa Siswa Berprestasi',
            'Beasiswa Keluarga Tidak Mampu',
        ];

        foreach ($namas as $nama) {
            Beasiswa::create(['nama' => $nama]);
        }
    }
}
