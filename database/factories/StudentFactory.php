<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_id' => $this->faker->unique()->numberBetween(100000, 999999),
            'first_name' => $this->faker->firstName(),
            'middle_name' => $this->faker->optional()->firstName(),
            'last_name' => $this->faker->lastName(),
            'date_of_birth' => $this->faker->dateTimeBetween('-25 years', '-16 years')->format('Y-m-d'),
            'email' => $this->faker->unique()->safeEmail(),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'course' => $this->faker->randomElement([
                'BSIT',
                'BSCS',
                'BSIS',
                'BSCE',
            ]),
            'year_level' => $this->faker->numberBetween(1, 4),
        ];
    }
}
