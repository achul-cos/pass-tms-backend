<?php

namespace Database\Seeders;

use App\Models\Penumpang;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenumpangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Penumpang::factory()
            ->count(50)             // Membuat 50 penumpang
            ->hasTikets(0.4)       // 40% dari penumpang memiliki tiket
            ->create();
    }
    
}
