<?php

namespace Database\Factories;

use App\Models\AttendanceEvent;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AttendanceRecord>
 */
class AttendanceRecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $event =
            AttendanceEvent::inRandomOrder()->first() ??
            AttendanceEvent::factory()->create();

        $date = $this->faker
            ->dateTimeBetween($event->start_date, $event->end_date)
            ->format("Y-m-d");

        $morningCheckIn = $this->faker
            ->optional(0.8)
            ->dateTimeBetween("$date 07:00:00", "$date 09:00:00");
        $morningCheckOut = $morningCheckIn
            ? $this->faker->dateTimeBetween($morningCheckIn, "$date 12:00:00")
            : null;
        $afternoonCheckIn = $this->faker
            ->optional(0.8)
            ->dateTimeBetween("$date 13:00:00", "$date 15:00:00");
        $afternoonCheckOut = $afternoonCheckIn
            ? $this->faker->dateTimeBetween($afternoonCheckIn, "$date 18:00:00")
            : null;

        return [
            "student_id" =>
                Student::inRandomOrder()->first()->id ?? Student::factory(),
            "attendance_event_id" => $event->id,
            "date" => $date,
            "morning_check_in" => $morningCheckIn,
            "morning_check_out" => $morningCheckOut,
            "afternoon_check_in" => $afternoonCheckIn,
            "afternoon_check_out" => $afternoonCheckOut,
        ];
    }
}
