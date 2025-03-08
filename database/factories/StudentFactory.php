<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Program;

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
            "school_id" => fake()->unique()->numberBetween(1, 500),
            // 'program_id' => Program::inRandomOrder()->first()->id, //i baylo rani if deli naka mo handle pang IC lang
            "program_id" => $this->faker->randomElement([1, 2]),
            "rfid" => $this->faker->optional()->uuid, // Nullable RFID
            "first_name" => $this->faker->firstName,
            "middle_name" => $this->faker->optional()->lastName,
            "last_name" => $this->faker->lastName,
            "email" => $this->faker->unique()->safeEmail,
            "set" => $this->faker->randomElement(["A", "B", "C", "D"]),
            "year" => $this->faker->numberBetween(1, 4),
            "status" => $this->faker->randomElement([
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
