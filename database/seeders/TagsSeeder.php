<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tags;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            ["id" => 1, "name" => "Science"],
            ["id" => 2, "name" => "Technology"],
            ["id" => 3, "name" => "Politics"],
            ["id" => 4, "name" => "Business"],
            ["id" => 5, "name" => "Economy"],
            ["id" => 6, "name" => "World News"],
        ];

        foreach($tags as $tag)
        {
            Tags::create($tag);
        }
    }
}
