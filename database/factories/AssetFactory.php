<?php

namespace Database\Factories;

use App\Models\BarangayEmployee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Asset>
 */
class AssetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'barangay_employee_id' => BarangayEmployee::factory(),
            'item_name' => fake()->words(2, true),
            'type' => fake()->randomElement([
                'Computer',
                'Vehicle',
                'Office Equipment',
                'Furniture',
                'Electronics',
                'Network Equipment',
            ]),
            'serial_number' => strtoupper(fake()->bothify('??-#######')),

            'amount' => fake()->numberBetween(3000, 20000),
            'status' => fake()->randomElement(['GOOD', 'BAD']),
        ];
    }
}
