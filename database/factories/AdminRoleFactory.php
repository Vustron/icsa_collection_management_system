<?php

namespace Database\Factories;

use App\Models\Role;
use App\Models\System;
use Illuminate\Database\Eloquent\Factories\Factory;
use User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AdminRole>
 */
class AdminRoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()?->id,
            'role_id' => Role::inRandomOrder()->first()?->id,
            'system_id' => System::inRandomOrder()->first()?->id,
            'deleted_at' => $this->faker->optional()->dateTime(),
        ];
    }
}
