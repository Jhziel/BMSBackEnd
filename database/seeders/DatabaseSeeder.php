<?php

namespace Database\Seeders;

use App\Models\Asset;
use App\Models\BarangayEmployee;
use App\Models\BarangayOfficial;
use App\Models\Resident;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{


    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'John doe',
            'email' => 'john@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        $this->call([
            ResidentCounterSeeder::class,
        ]);
        Resident::factory(15)->create();
        BarangayEmployee::factory(10)->create();
        BarangayOfficial::factory(10)->create();
        Asset::factory(10)->create();
    }
}
