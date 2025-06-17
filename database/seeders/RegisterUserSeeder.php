<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class RegisterUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('registed_user')->insert([
            ['emp_code' => 8736],
            ['emp_code' => 6746],
            ['emp_code' => 6745],
            ['emp_code' => 5919],
            ['emp_code' => 3963],
            ['emp_code' => 3494],
            
        ]);

    }
}
