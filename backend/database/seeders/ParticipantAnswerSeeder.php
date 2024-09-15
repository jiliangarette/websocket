<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParticipantAnswerSeeder extends Seeder
{
    public function run()
    {
        DB::table('participant_answers')->insert([
            [
                'participant_id' => 1,
                'quiz_id' => 1,
                'question_id' => 1,
                'choice_id' => 1,
            ],
            [
                'participant_id' => 2,
                'quiz_id' => 2,
                'question_id' => 2,
                'choice_id' => 4,
            ],
        ]);
    }
}
