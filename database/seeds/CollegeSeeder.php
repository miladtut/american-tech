<?php

use Illuminate\Database\Seeder;

class CollegeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\College::create([
            'name' => 'Faculty of Education',
        ]);

        \App\College::create([
            'name' => 'Faculty of medicine',
        ]);

        \App\College::create([
            'name' => 'Faculty of Computer Science and Information Technology',
        ]);

        \App\College::create([
            'name' => 'College of Business Administration',
        ]);
        \App\College::create([
            'name' => 'Preparatory Year',
        ]);
    }
}
