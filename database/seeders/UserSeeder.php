<?php

namespace Database\Seeders;

use App\Models\AdminRole;
use App\Models\Role;
use App\Models\System;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $salt = Str::random(16);
        $initial_admins = [
            [
                "user_name" => "DNSC Super Admin",
                "email" => "dnsc.super.admin@dnsc.edu.ph",
                "password" => bcrypt(
                    "dnscsuperadmin" . (string) $salt . "supersecretpepper"
                ),
                "salt" => $salt,
                "provider" => "email",
                "institute_id" => null,
            ],
            [
                "user_name" => "IC Super Admin",
                "email" => "ic.super.admin@dnsc.edu.ph",
                "password" => bcrypt(
                    "icsuperadmin" . (string) $salt . "supersecretpepper"
                ),
                "salt" => $salt,
                "provider" => "email",
                "institute_id" => 1,
            ],
            [
                "user_name" => "IAAS Super Admin",
                "email" => "iaas.super.admin@dnsc.edu.ph",
                "password" => bcrypt(
                    "iaassuperadmin" . (string) $salt . "supersecretpepper"
                ),
                "salt" => $salt,
                "provider" => "email",
                "institute_id" => 2,
            ],
            [
                "user_name" => "ILEGG Super Admin",
                "email" => "ilegg.super.admin@dnsc.edu.ph",
                "password" => bcrypt(
                    "ileggsuperadmin" . (string) $salt . "supersecretpepper"
                ),
                "salt" => $salt,
                "provider" => "email",
                "institute_id" => 3,
            ],
            [
                "user_name" => "ITED Super Admin",
                "email" => "ited.super.admin@dnsc.edu.ph",
                "password" => bcrypt(
                    "itedsuperadmin" . (string) $salt . "supersecretpepper"
                ),
                "salt" => $salt,
                "provider" => "email",
                "institute_id" => 4,
            ],
        ];

        foreach ($initial_admins as $admin) {
            User::create($admin);
        }

        $users = User::factory(20)->create();
    }
}
