<?php

namespace Database\Seeders;

use App\Models\AttendanceEvent;
use App\Models\AttendanceRecord;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class AttendanceRecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = Student::all();

        AttendanceEvent::all()->each(function ($event) use ($students) {
            $startDate = Carbon::parse($event->start_date);
            $endDate = Carbon::parse($event->end_date);

            for ($date = $startDate; $date->lte($endDate); $date->addDay()) {
                foreach ($students as $student) {
                    AttendanceRecord::create([
                        'student_id' => $student->id,
                        'attendance_event_id' => $event->id,
                        'date' => $date->format('Y-m-d'),
                        'morning_check_in' => rand(0, 1) ? $date->copy()->setTime(rand(7, 9), rand(0, 59)) : null,
                        'morning_check_out' => rand(0, 1) ? $date->copy()->setTime(rand(11, 12), rand(0, 59)) : null,
                        'afternoon_check_in' => rand(0, 1) ? $date->copy()->setTime(rand(13, 15), rand(0, 59)) : null,
                        'afternoon_check_out' => rand(0, 1) ? $date->copy()->setTime(rand(16, 18), rand(0, 59)) : null,
                    ]);
                }
            }
        });
    }
}
