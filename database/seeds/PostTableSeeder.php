<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('posts')->truncate();
        $faker = Faker::create();
        $posts = [];
        foreach (range(1, 20) as $index) {
            $posts[] = [
                'title' => $faker->text($maxNbChars = 100),
                'short_description' => $faker->text($maxNbChars = 200),
                'description' => $faker->text($maxNbChars = 200),
                'content' => $faker->text($maxNbChars = 430),
                'feature_image' => $faker->imageUrl($width = 640, $height = 480),
                'cate_id' => rand(3, 8),
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ];
        }
        DB::table('posts')->insert($posts);
    }
}
