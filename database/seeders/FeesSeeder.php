<?php

namespace Database\Seeders;

use App\Models\AttendanceFee;
use App\Models\Fees;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = Student::all();

        foreach ($students as $student) {
            $totalFine = AttendanceFee::whereHas("attendanceRecord", function (
                $query
            ) use ($student) {
                $query->where("student_id", $student->id);
            })->sum("amount");

            if ($totalFine > 0) {
                $fee = Fees::create([
                    "student_id" => $student->id,
                    "category_id" => 4,
                    // "institute_id" => 1, //ilisan rani kay for now IC lang sa (akong gi wala kay pwede raman diay mag check sa student unsa siya nga insti)
                    "total_amount" => $totalFine,
                    "balance" => $totalFine,
                    "status" => "pending",
                    "issued_by" => 2, // Could be an admin ID e null lang after testing
                    // "issued_date" => now(),
                    // "due_date" => now()->addDays(30),
                    "remarks" => "Accumulated attendance fines",
                ]);

                AttendanceFee::whereHas("attendanceRecord", function (
                    $query
                ) use ($student) {
                    $query->where("student_id", $student->id);
                })->update(["fee_id" => $fee->id]);
            }
        }

        Fees::factory(100)->create();
    }
}
