<?php

namespace Database\Seeders;

use App\Models\AttendanceEvent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class AttendanceEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = ["Byte Fest", "Kalibulong"];

        // Insert five specific events with randomized dates
        foreach ($events as $event) {
            $startDate = Carbon::today()
                ->subYears(rand(0, 1))
                ->addDays(rand(0, 365));
            $endDate = (clone $startDate)->addDays(rand(0, 2));

            AttendanceEvent::create([
                "event_name" => $event,
                "start_date" => $startDate->format("Y-m-d"),
                "end_date" => $endDate->format("Y-m-d"),
                "created_at" => now(),
                "updated_at" => now(),
            ]);
        }
    }
}
