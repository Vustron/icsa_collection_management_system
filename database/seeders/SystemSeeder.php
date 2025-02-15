<?php

namespace Database\Seeders;

use App\Models\System;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SystemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $systems = [
            [
                'name' => 'Attendance and Fines Management System',
                'created_at' => now(),
                'updated_at' => null
            ],
            [
                'name' => 'Locker Rental Management System',
                'created_at' => now(),
                'updated_at' => null
            ],
            [
                'name' => 'Collection Management System',
                'created_at' => now(),
                'updated_at' => null
            ],
            [
                'name' => 'Mobile Portal System',
                'created_at' => now(),
                'updated_at' => null
            ],
            [
                'name' => 'Election Management System',
                'created_at' => now(),
                'updated_at' => null
            ],
            [
                'name' => 'Document Monitoring System',
                'created_at' => now(),
                'updated_at' => null
            ],
            [
                'name' => 'Clearance Management System',
                'created_at' => now(),
                'updated_at' => null
            ],
        ];

        foreach ($systems as $sytem) {
            System::create($sytem);
        }
    }
}
