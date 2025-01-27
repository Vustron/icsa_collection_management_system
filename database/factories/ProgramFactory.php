<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProgramFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement([
                'Bachelor of Science in Information Technology',
                'Bachelor of Science in Information Systems',
            ]),
            'status' => fake()->randomElement(['active', 'inactive']),
            'delete_flag' => false,
            'date_created' => now(),
            'date_updated' => now()
        ];
    }
}
