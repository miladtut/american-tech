<?php

use Illuminate\Database\Seeder;

class SoftwareSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 1 ; $i < 7 ; $i++) {
            \App\Software::create([
                'tool_name' => $faker->company,
                'tool_image' =>  $faker->image('public/uploads',400,300, null, false),
            ]);
        }

    }
}
