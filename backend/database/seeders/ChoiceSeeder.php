<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChoiceSeeder extends Seeder
{
    public function run()
    {
        DB::table('choices')->insert([
            [
                'question_id' => 1,
                'choice_text' => 'Paris',
                'is_correct' => true,
            ],
            [
                'question_id' => 1,
                'choice_text' => 'London',
                'is_correct' => false,
            ],
            [
                'question_id' => 2,
                'choice_text' => 'True',
                'is_correct' => false,
            ],
            [
                'question_id' => 2,
                'choice_text' => 'False',
                'is_correct' => true,
            ],
        ]);
    }
}
