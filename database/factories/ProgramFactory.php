<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Program>
 */
class ProgramFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
                // "institute_id " => '',
                // "name" => fake()->randomElement([
                //     "Bachelor of Science in Information Technology",
                //     "Bachelor of Science in Information Systems",
                // ]),
                // "status" => fake()->randomElement(["active", "inactive"]),
                // "delete_flag" => false,
                // "date_created" => now(),
                // "date_updated" => now(),
                // erase  naku kay gusto naku mag fix og mga important nga details
            ];
    }
}
