<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Resident>
 */
class ResidentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'barangay_code' => 'BG',
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'middle_name' => fake()->lastName(),
            'birthdate' => fake()->date(),
            'gender' => fake()->randomElement(['Male', 'Female']),
            'civil_status' => fake()->randomElement([
                'Single',
                'Married',
                'Divorced',
                'Widowed'
            ]),
            'voter_status' => fake()->randomElement(['Active', 'Inactive']),
            'contact_number' => fake()->numerify('09#########'),
            'occupation' => fake()->jobTitle(),
            'citizenship' => "Filipino",
            'religion' => fake()->randomElement(['Roman Catholic', 'Iglesia ni Cristo', 'Islam']),
        ];
    }
}
