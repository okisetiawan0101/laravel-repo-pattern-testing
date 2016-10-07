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
        $this->call(BookCategoryTableSeeder::class);
        $this->call(BookTableSeeder::class);
        // $this->call(UsersTableSeeder::class);
    }
}
