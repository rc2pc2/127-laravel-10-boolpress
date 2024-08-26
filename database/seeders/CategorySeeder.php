<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $categoriesName = [
            "Web Development",
            "Application Security",
            "News",
            "IT",
            "Networks",
            "Operating Systems",
            "Gaming",
            "Devops",
            "Database",
            "Front-end",
            "Back-end",
            "Full-stack"
        ];

        foreach ($categoriesName as $categoryName) {
            $category = new Category();
            $category->name = $categoryName;
            $category->color = $faker->unique()->safeHexColor();
            $category->save();
        }
    }
}
