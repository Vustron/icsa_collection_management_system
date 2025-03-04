<?php

namespace Database\Factories;

use App\Models\Institute;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Session;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $salt = Str::random(16);
        return [
            "session_id" => null,
            "user_name" => $this->faker->unique()->userName,
            "email" => fake()->unique()->userName() . "@dnsc.edu.ph",
            "email_verified_at" => null,
            "password" => bcrypt(
                "password" . (string) $salt . "supersecretpepper"
            ),
            "salt" => $salt,
            "avatar" => $this->faker->imageUrl(),
            "provider" => fake()->randomElement([
                "email",
                "google",
                "facebook",
            ]),
            "institute_id" => Institute::inRandomOrder()->first()?->id,
            "status" => $this->faker->randomElement(["active", "deactivated"]),
            "created_at" => fake()->dateTimeBetween("-1 year"),
            "updated_at" => null,
        ];
    }
}
