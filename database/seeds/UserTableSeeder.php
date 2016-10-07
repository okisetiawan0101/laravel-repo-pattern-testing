<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        $date = date('Y-m-d H:i:s');

        DB::table('users')->insert([
            'name' => 'oki setiawan',
            'email' => 'okisetiawan0101@gmail.com',
            'password' => bcrypt('secret'),
            'created_at' => $date,
            'updated_at' => $date
        ]);
    }
}
