<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuizQuestionLinkSeeder extends Seeder
{
    public function run()
    {
        DB::table('quiz_question_links')->insert([
            [
                'quiz_id' => 1,
                'question_id' => 1,
            ],
            [
                'quiz_id' => 1,
                'question_id' => 2,
            ],
            [
                'quiz_id' => 2,
                'question_id' => 3,
            ],
        ]);
    }
}
