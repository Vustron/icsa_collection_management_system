<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use App\Models\Student;
use App\Models\CollectionCategory;
use App\Models\Institute;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Fees>
 */
class FeesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $issuedDate = Carbon::now()->subDays(rand(0, 60));
        $dueDate = (clone $issuedDate)->addDays(rand(10, 30));
        $paymentDate = $this->faker
            ->optional(0.7)
            ->dateTimeBetween($issuedDate, $dueDate); // 70% chance of being paid

        return [
            "student_id" => Student::inRandomOrder()->first()->id,
            "category_id" => CollectionCategory::inRandomOrder()->first()->id,
            "institute_id" =>
                Institute::inRandomOrder()->first()->id ?? Institute::factory(),
            "total_amount" => $this->faker->randomFloat(2, 50, 999), // Between 50 and 999
            "status" => $paymentDate
                ? "paid"
                : $this->faker->randomElement(["pending", "waived"]),
            // 'issued_by' => User::inRandomOrder()->first()->id,
            "issued_by" => 2,
            "issued_date" => $issuedDate,
            "due_date" => $dueDate,
            "payment_date" => $paymentDate,
            "remarks" => $this->faker->optional()->sentence(),
        ];
    }
}
