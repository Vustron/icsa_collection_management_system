<?php

namespace Database\Seeders;

use App\Models\AdminRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $user_emails = [
            'dnsc.super.admin@dnsc.edu.ph',
            'ic.super.admin@dnsc.edu.ph',
            'iaas.super.admin@dnsc.edu.ph',
            'ilegg.super.admin@dnsc.edu.ph',
            'ited.super.admin@dnsc.edu.ph'
        ];

        $initial_admin_roles = [
            [
                'user_id' => User::where('email', '=', $user_emails[0])->value('id'),
                'role_id' => 1,
                'system_id' => null,
                'deleted_at' => null,
                'created_at' => now(),
                'updated_at' => null,
            ],
            [
                'user_id' => User::where('email', '=', $user_emails[1])->value('id'),
                'role_id' => 2,
                'system_id' => 3,
                'deleted_at' => null,
                'created_at' => now(),
                'updated_at' => null,
            ],
            [
                'user_id' => User::where('email', '=', $user_emails[2])->value('id'),
                'role_id' => 2,
                'system_id' => 3,
                'deleted_at' => null,
                'created_at' => now(),
                'updated_at' => null,
            ],
            [
                'user_id' => User::where('email', '=', $user_emails[3])->value('id'),
                'role_id' => 2,
                'system_id' => 3,
                'deleted_at' => null,
                'created_at' => now(),
                'updated_at' => null,
            ],
            [
                'user_id' => User::where('email', '=', $user_emails[4])->value('id'),
                'role_id' => 2,
                'system_id' => 3,
                'deleted_at' => null,
                'created_at' => now(),
                'updated_at' => null,
            ],
        ];

        foreach ($initial_admin_roles as $role) {
            AdminRole::create($role);
        }
    }
}
