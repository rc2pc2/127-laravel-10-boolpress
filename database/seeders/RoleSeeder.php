<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rolesData = [
            [
                "name" => "admin",
                "level" => 1,
            ],
            [
                "name" => "editor",
                "level" => 2,
            ],
            [
                "name" => "moderator",
                "level" => 2,
            ],
            [
                "name" => "superuser",
                "level" => 4,
            ],
            [
                "name" => "writer",
                "level" => 3,
            ],
            [
                "name" => "registered user",
                "level" => 10,
            ],
        ];

        foreach ($rolesData as $roleData) {
            Role::create($roleData);
        }
    }
}
