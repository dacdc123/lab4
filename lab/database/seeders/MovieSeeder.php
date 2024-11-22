<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

    for ($i = 0; $i < 50; $i++) {
        DB::table('movies')->insert([
            'title' => $faker->unique()->sentence(3),
            'poster' => $faker->imageUrl(200, 300, 'movies'),
            'intro' => $faker->text(100),
            'release_date' => $faker->dateTimeBetween('now', '+1 years')->format('Y-m-d'),
            'genre_id' => rand(1, 4),
        ]);
    }
    }
}
