<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    public function definition(): array
    {
        return [
            "user_id" => User::factory(),
            "school_id" => fake()->numberBetween(1, 100),
            "program_id" => Program::factory(),
            "rfid" => fake()->unique()->uuid(),
            "first_name" => fake()->firstName(),
            "middle_name" => fake()->optional()->lastName(),
            "last_name" => fake()->lastName(),
            "email" => fake()->unique()->safeEmail(),
            "set" => fake()->set(),
            "year" => fake()->numberBetween(1, 4),
            "status" => fake()->randomElement([
                "active",
                "inactive",
                "graduated",
                "leave",
            ]),
            "delete_flag" => false,
            "created_at" => now(),
            "updated_at" => now(),
        ];
    }
}
