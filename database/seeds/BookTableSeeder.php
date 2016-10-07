<?php

use Illuminate\Database\Seeder;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->delete();
        $date = date('Y-m-d H:i:s');

        for($i=1;$i<=5;$i++)
        {
            DB::table('books')->insert([
                'title' => 'title '.$i,
                'author' => 'author '.$i,
                'book_category_id' => $i,
                'created_at' => $date,
                'updated_at' => $date,
            ]);
        }
    }
}
