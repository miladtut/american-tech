<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call(ContentPageSeed::class);
        $this->call(RoleSeed::class);
        $this->call(UserSeed::class);

        $this->call(BooksSeeder::class);

        $this->call(CollegeSeeder::class);

        $this->call(ContactSeeder::class);

        $this->call(NewsSeeder::class);

        $this->call(SoftwareSeeder::class);

        $this->call(CourcesSeeder::class);

    }
}
