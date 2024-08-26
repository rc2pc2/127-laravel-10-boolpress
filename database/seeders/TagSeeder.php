<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $tagsData = [
            [
                "name" => "Technology",
                "color" => "#FF5733"
            ],
            [
                "name" => "Health",
                "color" => "#33FF57"
            ],
            [
                "name" => "Education",
                "color" => "#3357FF"
            ],
            [
                "name" => "Science",
                "color" => "#FF33A1"
            ],
            [
                "name" => "Travel",
                "color" => "#33FFA1"
            ],
            [
                "name" => "Food",
                "color" => "#A133FF"
            ],
            [
                "name" => "Lifestyle",
                "color" => "#FF5733"
            ],
            [
                "name" => "Finance",
                "color" => "#FF8C33"
            ],
            [
                "name" => "Entertainment",
                "color" => "#33FF8C"
            ],
            [
                "name" => "Sports",
                "color" => "#FF3333"
            ],
            [
                "name" => "Art",
                "color" => "#5733FF"
            ],
            [
                "name" => "Music",
                "color" => "#FF33D4"
            ],
            [
                "name" => "Politics",
                "color" => "#33FFD4"
            ],
            [
                "name" => "Environment",
                "color" => "#D433FF"
            ],
            [
                "name" => "Business",
                "color" => "#FFD433"
            ],
            [
                "name" => "Fashion",
                "color" => "#33A1FF"
            ],
            [
                "name" => "History",
                "color" => "#D4FF33"
            ],
            [
                "name" => "Culture",
                "color" => "#FF33FF"
            ],
            [
                "name" => "Gaming",
                "color" => "#33FF57"
            ],
            [
                "name" => "Nature",
                "color" => "#FF3357"
            ]
        ];

        foreach ($tagsData as $tagData) {
            Tag::create($tagData);
        }


    }
}
