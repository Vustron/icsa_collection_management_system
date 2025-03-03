<?php

namespace Database\Seeders;

use App\Models\AttendanceFee;
use App\Models\AttendanceRecord;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttendanceFeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AttendanceRecord::all()->each(function ($record) {
            $day_fee =
                collect([
                    $record->morning_check_in,
                    $record->morning_check_out,
                    $record->afternoon_check_in,
                    $record->afternoon_check_out,
                ])
                    ->filter(fn($value) => is_null($value))
                    ->count() * 25;

            if ($day_fee > 0) {
                AttendanceFee::create([
                    "attendance_record_id" => $record->id,
                    "amount" => $day_fee,
                ]);
            }
        });
    }
}
