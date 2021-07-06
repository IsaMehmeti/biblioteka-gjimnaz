<?php

use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('books')->insert([
            'emri' => 'Lahuta e Malesise',
            'category_id' => '1' ,
            'sasia' => '12',
        ]);
    }
}
