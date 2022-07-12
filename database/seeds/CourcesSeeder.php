<?php

use Illuminate\Database\Seeder;

class CourcesSeeder extends Seeder
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
            \App\Course::create([
                'name_course' => $faker->title,
                'image' => $faker->image('public/uploads', 400, 300, null, false),
                'trainer_name' => $faker->firstNameMale,
                'details' => $faker->text,
            ]);

        }
    }
}
