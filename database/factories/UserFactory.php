<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    public function definition(): array
    {
        return [
            "session_id" => Session::factory(),
            "user_name" => fake()->userName(),
            "email" => fake()->unique()->safeEmail(),
            "password" => bcrypt("password"),
            "salt" => Str::random(16),
            "gcash_number" => fake()->numberBetween(1000000000, 9999999999),
            "avatar" => fake()->imageUrl(200, 200),
            "provider" => fake()->randomElement([
                "email",
                "google",
                "facebook",
            ]),
            "role" => fake()->randomElement(["user", "admin"]),
            "created_at" => fake()->dateTimeBetween("-1 year"),
            "updated_at" => fake()->dateTimeBetween("-1 month"),
        ];
    }
}
