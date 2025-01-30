<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;

class SessionFactory extends Factory
{
    public function definition(): array
    {
        return [
            "user_id" => User::factory(),
            "token" => Str::random(60),
            "ip_address" => fake()->ipv4(),
            "expires_at" => now()->addHours(24),
            "created_at" => now(),
            "updated_at" => now(),
        ];
    }
}
