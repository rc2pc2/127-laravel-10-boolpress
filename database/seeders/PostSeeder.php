<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        $categories = Category::all()->pluck("id");
        $users = User::all()->pluck("id");

        for ($i=0; $i < 600; $i++) {
            $newPost = new Post();
            $newPost->user_id = $faker->randomElement($users);
            $newPost->category_id = $faker->randomElement($categories);
            $newPost->title = $faker->realText(40);
            $newPost->content = $faker->realText(1000);
            $newPost->date = $faker->dateTimeThisMonth();
            $newPost->image = $faker->imageUrl(400,250, 'posts');
            $newPost->save();
        }
    }
}
