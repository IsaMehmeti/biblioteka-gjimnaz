<?php

use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert([
            'name' => 'John',
            'surname' => 'Doe',
            'class' => '12',
            'parallel' => '1',
            
        ]);
    }
}
