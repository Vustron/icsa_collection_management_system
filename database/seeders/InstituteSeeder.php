<?php

namespace Database\Seeders;

use App\Models\CollectionCategory;
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
                "institute_name" => "Institute of Computing",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "institute_name" => "Institute of Aquatic and Applied Sciences",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "institute_name" =>
                    "Institute of Leadership, Entrepreneurship and Good Governance",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "institute_name" => "Institute of Teacher Education",
                "created_at" => now(),
                "updated_at" => now(),
            ],
        ];

        $collection_categories = [
            [
                "category_name" => "Kalibulong",
                "description" => null,
                "institute_id" => 1, //nag add raku ani kay sa collection mangud naay edit og delete, tas centralized baya any institute maka kita atong categ. maong bahalag same ra silag name and purpose gi separate japun naku sila
                "created_at" => now(),
                "updated_at" => null,
            ],
            [
                "category_name" => "Locker Payment",
                "description" => null,
                "institute_id" => 1,
                "created_at" => now(),
                "updated_at" => null,
            ],
            [
                "category_name" => "PSITS",
                "description" => null,
                "institute_id" => 1,
                "created_at" => now(),
                "updated_at" => null,
            ],
            [
                "category_name" => "Attendance Fees",
                "description" => null,
                "institute_id" => 1,
                "created_at" => now(),
                "updated_at" => null,
            ],
        ];

        foreach ($institutes as $institute) {
            $insti = Institute::create($institute);
            foreach ($collection_categories as $collection_category) {
                // $collection_category_data = $collection_category;
                $collection_category["institute_id"] = $insti["id"];
                CollectionCategory::create($collection_category);
            }
        }
    }
}
