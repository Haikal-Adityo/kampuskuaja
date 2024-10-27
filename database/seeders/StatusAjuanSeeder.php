<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\StatusAjuan;

class StatusAjuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            'Belum Diajukan',
            'Telah Diajukan',
        ];

        foreach ($statuses as $status) {
            StatusAjuan::create(['status' => $status]);
        }
    }
}
