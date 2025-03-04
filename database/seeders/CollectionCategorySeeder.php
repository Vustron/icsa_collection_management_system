<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CollectionCategory;

class CollectionCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $collection_categories = [
            [
                "category_name" => "Kalibulong",
                "description" => null,
                "created_at" => now(),
                "updated_at" => null,
            ],
            [
                "category_name" => "Locker Payment",
                "description" => null,
                "created_at" => now(),
                "updated_at" => null,
            ],
            [
                "category_name" => "PSITS",
                "description" => null,
                "created_at" => now(),
                "updated_at" => null,
            ],
            [
                "category_name" => "Attendance Fees",
                "description" => null,
                "created_at" => now(),
                "updated_at" => null,
            ],
        ];

        foreach ($collection_categories as $collection_category) {
            CollectionCategory::create($collection_category);
        }
    }
}
