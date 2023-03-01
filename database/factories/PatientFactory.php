<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'type' => '0',
            'age' => rand(20,80),
            'gender' => 1,
            'phone'=> fake()->phoneNumber(),
            'nrc'=> rand(),
            'address'=> fake()->address(),
            'nationality'=> fake()->country(),
            'ethnicity'=> fake()->country(),
            'email' => fake()->unique()->safeEmail(),
            'date_of_birth' => fake()->date(),
            'patient_id'=> 'PID-'.rand(),
        ];
    }
}
