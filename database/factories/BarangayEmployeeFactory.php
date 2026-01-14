<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BarangayEmployee>
 */
class BarangayEmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
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
            'job_title' => fake()->jobTitle(),
            'status' => fake()->randomElement(['Active', 'Inactive']),
            'contact_number' => fake()->numerify('09#########'),
            'employment_type' => fake()->randomElement(['Full-Time', 'Part-Time']),
            'citizenship' => "Filipino",
            'religion' => fake()->randomElement(['Roman Catholic', 'Iglesia ni Cristo', 'Islam']),
            'hired_at' => fake()->date(),
        ];
    }
}
