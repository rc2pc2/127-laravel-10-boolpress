<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $users = User::all();
        $roles = Role::all()->pluck('id');

        foreach ($users as $user){
            if ($user->id === 1){
                $user->roles()->attach([1, 2, 3, 4]);
            } else {
                $user->roles()->attach($faker->randomElements($roles, rand(1,3)));
            }
        }
    }
}
