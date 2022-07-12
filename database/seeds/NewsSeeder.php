<?php

use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($i = 1 ; $i < 12 ; $i++) {
            \App\News::create([
                'title' => $faker->title,
                'details' => $faker->text,
            ]);

        }
    }
}
