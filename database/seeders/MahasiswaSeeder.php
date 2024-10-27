<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mahasiswa::create([
            'nim' => '1234',
            'nama' => 'Andi',
            'email' => 'andi@gmail.com',
            'nomor_hp' => '08123456789',
            'semester' => 5,
            'ipk' => 3.75,
            'berkas_syarat' => null,
            'beasiswa_id' => null,
            'status_ajuan_id' => 1,
        ]);

        Mahasiswa::create([
            'nim' => '5678',
            'nama' => 'Budi',
            'email' => 'budi@yahoo.com',
            'nomor_hp' => '08123456789',
            'semester' => 3,
            'ipk' => 2.8,
            'berkas_syarat' => null,
            'beasiswa_id' => null,
            'status_ajuan_id' => 1,
        ]);

    }
}
