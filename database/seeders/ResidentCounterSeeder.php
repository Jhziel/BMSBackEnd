<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResidentCounterSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('resident_counters')->insert([
            'barangay_code' => 'BG',
            'last_number' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
