<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParticipantQuizSeeder extends Seeder
{
    public function run()
    {
        DB::table('participant_quizzes')->insert([
            [
                'participant_id' => 1,
                'quiz_id' => 1,
            ],
            [
                'participant_id' => 2,
                'quiz_id' => 2,
            ],
        ]);
    }
}
