<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('book_categories')->delete();
        $date = date('Y-m-d H:i:s');

        for($i=1;$i<=5;$i++)
        {
            DB::table('book_categories')->insert([
                'description' => 'category '.$i,
                'created_at' => $date,
                'updated_at' => $date,
            ]);
        }
    }
}
