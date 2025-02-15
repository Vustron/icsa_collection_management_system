<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Institute;

class InstituteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $institutes = [
            [
                'institute_name' => 'Institute of Computing',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'institute_name' => 'Institute of Aquatic and Applied Sciences',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'institute_name' => 'Institute of Leadership, Entrepreneurship and Good Governance',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'institute_name' => 'Institute of Teacher Education',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($institutes as $institute) {
            Institute::create(
                $institute
            );
        }
    }
}
