<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuizQuestionSeeder extends Seeder
{
    public function run()
    {
        DB::table('quiz_questions')->insert([
            [
                'question_text' => 'What is the capital of France?',
                'question_type_id' => 1, // Multiple Choice
            ],
            [
                'question_text' => 'The Earth is flat. True or False?',
                'question_type_id' => 2, // True/False
            ],
            [
                'question_text' => 'Describe the theory of relativity.',
                'question_type_id' => 4, // Essay
            ],
        ]);
    }
}
