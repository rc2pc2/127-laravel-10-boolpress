<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $userNames = [
            [
                "username" => "gina",
                "email" => "gina@gmail.com",
                "password" => "12345678"
            ],
            [
                "username" => "jack",
                "email" => "jack@gmail.com",
                "password" => "12345678"
            ],
            [
                "username" => "geeno",
                "email" => "geeno@gmail.com",
                "password" => "12345678"
            ],
            [
                "username" => "johanna",
                "email" => "johanna@email.com",
                "password" => "12345678"
            ],
            [
                "username" => "karen",
                "email" => "karen@gmail.com",
                "password" => "12345678"
            ],
            [
                "username" => "wolverine",
                "email" => "wolverine@gmail.com",
                "password" => "12345678"
            ],
            [
                "username" => "deadpool",
                "email" => "deadpool@gmail.com",
                "password" => "12345678"
            ],
            [
                "username" => "nonno",
                "email" => "nonno@nonno.com",
                "password" => "12345678"
            ]
        ];

        foreach ($userNames as $userData) {
            $user = new User();
            $user->name = $userData['username'];
            $user->email = $userData['email'];
            $user->password = bcrypt($userData['password']);
            $user->save();
        }

    }
}
