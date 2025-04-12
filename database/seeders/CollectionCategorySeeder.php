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
                "category_name" => "Kali",
                "collection_fee" => 200,
                "description" => null,
                "institute_id" => 1, //nag add raku ani kay sa collection mangud naay edit og delete, tas centralized baya any institute maka kita atong categ. maong bahalag same ra silag name and purpose gi separate japun naku sila
                "created_at" => now(),
                "updated_at" => null,
            ],
            [
                "category_name" => "Locker Payment",
                "collection_fee" => 200,
                "description" => null,

                "institute_id" => 1,
                "created_at" => now(),
                "updated_at" => null,
            ],
            [
                "category_name" => "PSITS",
                "collection_fee" => 200,
                "description" => null,

                "institute_id" => 1,
                "created_at" => now(),
                "updated_at" => null,
            ],
            [
                "category_name" => "Attendance Fees",
                "collection_fee" => 200,
                "description" => null,

                "institute_id" => 1,
                "created_at" => now(),
                "updated_at" => null,
            ],
        ];

        foreach ($collection_categories as $collection_category) {
            CollectionCategory::create($collection_category);
        }
    }
}
