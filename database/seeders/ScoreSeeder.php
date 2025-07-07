<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ScoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $score = [
            ['D' => 'B', 'I' => 'D', 'S' => 'A', 'C' => 'C'],
            ['D' => 'A', 'I' => 'C', 'S' => 'D', 'C' => 'B'],
            ['D' => 'C', 'I' => 'B', 'S' => 'A', 'C' => 'D'],
            ['D' => 'A', 'I' => 'D', 'S' => 'C', 'C' => 'B'],
            ['D' => 'D', 'I' => 'B', 'S' => 'C', 'C' => 'A'],
            ['D' => 'B', 'I' => 'A', 'S' => 'D', 'C' => 'C'],
            ['D' => 'C', 'I' => 'D', 'S' => 'B', 'C' => 'A'],
            ['D' => 'B', 'I' => 'A', 'S' => 'D', 'C' => 'C'],
            ['D' => 'D', 'I' => 'A', 'S' => 'C', 'C' => 'B'],
            ['D' => 'C', 'I' => 'B', 'S' => 'D', 'C' => 'A'],
            ['D' => 'A', 'I' => 'D', 'S' => 'C', 'C' => 'B'],
            ['D' => 'D', 'I' => 'C', 'S' => 'A', 'C' => 'B'],
            ['D' => 'B', 'I' => 'A', 'S' => 'D', 'C' => 'C'],
            ['D' => 'C', 'I' => 'D', 'S' => 'B', 'C' => 'A'],
            ['D' => 'D', 'I' => 'A', 'S' => 'C', 'C' => 'B'],
            ['D' => 'A', 'I' => 'B', 'S' => 'C', 'C' => 'D'],
            ['D' => 'B', 'I' => 'C', 'S' => 'D', 'C' => 'A'],
            ['D' => 'C', 'I' => 'A', 'S' => 'B', 'C' => 'D'],
            ['D' => 'D', 'I' => 'B', 'S' => 'C', 'C' => 'A'],
            ['D' => 'A', 'I' => 'D', 'S' => 'C', 'C' => 'B'],
            ['D' => 'A', 'I' => 'B', 'S' => 'C', 'C' => 'D'],
            ['D' => 'D', 'I' => 'C', 'S' => 'B', 'C' => 'A'],
            ['D' => 'D', 'I' => 'B', 'S' => 'A', 'C' => 'C'],
            ['D' => 'D', 'I' => 'C', 'S' => 'A', 'C' => 'B'],



            // Add more questions as needed
            
        ];
         DB::table('score')->insert($score);
    }
}
