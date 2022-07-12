<?php

use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        \App\ContactCompany::create([
            'name' => $faker->name ,
            'website'     =>  $faker->phoneNumber ,
            'email'      =>  $faker->email ,
            'address'  => $faker->address ,
        ]);
    }
}
