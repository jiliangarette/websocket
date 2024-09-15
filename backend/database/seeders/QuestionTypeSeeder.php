<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionTypeSeeder extends Seeder
{
    public function run()
    {
        DB::table('question_types')->insert([
            ['type' => 'Multiple Choice'],
            ['type' => 'True/False'],
            ['type' => 'Short Answer'],
            ['type' => 'Essay'],
        ]);
    }
}
