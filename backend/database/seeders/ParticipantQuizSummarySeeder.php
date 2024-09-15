<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ParticipantQuizSummarySeeder extends Seeder
{
    public function run()
    {
        $data = [];
        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'participant_id' => rand(1, 2), // Randomly assign 1 or 2
                'quiz_id' => rand(1, 2),        // Randomly assign 1 or 2
                'score' => rand(100, 1000),     // Random score between 100 and 1000
                'completed_at' => now(),
            ];
        }

        DB::table('participant_quiz_summaries')->insert($data);
    }
}
