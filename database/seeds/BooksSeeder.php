<?php

use Illuminate\Database\Seeder;

class BooksSeeder extends Seeder
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
            \App\Book::create([
                'title' => $faker->company,
                'image' =>  $faker->image('public/uploads',400,300, null, false),
                'auther_name' => $faker->lastName ,
                'name' => $faker->firstNameMale ,
                'mobile' => $faker->phoneNumber ,
                'email' => $faker->email ,
                'type' => 'free' ,
            ]);
        }
    }
}
