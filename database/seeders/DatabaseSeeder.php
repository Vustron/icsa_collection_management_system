<?php

namespace Database\Seeders;

use App\Models\Payment;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            InstituteSeeder::class,
            ProgramSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            SystemSeeder::class,
            AdminRoleSeeder::class,
            CollectionCategorySeeder::class,
            StudentSeeder::class,
            AttendanceEventSeeder::class,
            AttendanceRecordSeeder::class,
            AttendanceFeeSeeder::class,
            FeesSeeder::class,
            PaymentSeeder::class,
            PaymentSubmissionSeeder::class,
        ]);
    }
}
