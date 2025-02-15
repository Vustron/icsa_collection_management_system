<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'role' => 'super_admin',
                'description' => ' Has full control over the entire system, including all institutes. | Manages user accounts, system settings, and global configurations.',
                'deleted_at' => null,
                'created_at' => now(),
                'updated_at' => null,
            ],
            [
                'role' => 'institute_super_admin',
                'description' => 'The highest authority within a specific institute. |  Manages institute-wide settings, user roles, and collections.',
                'deleted_at' => null,
                'created_at' => now(),
                'updated_at' => null,


            ],
            [
                'role' => 'institute_officer_admin',
                'description' => ' Handles day-to-day operations within an institute. |  Manages student payments, reviews submissions, and updates records.',
                'deleted_at' => null,
                'created_at' => now(),
                'updated_at' => null,

            ]
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
