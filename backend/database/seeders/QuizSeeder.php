<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuizSeeder extends Seeder
{
    public function run()
    {
        DB::table('quizzes')->insert([
            [
                'name' => 'General Knowledge Quiz',
                'description' => 'A quiz to test your general knowledge.',
                'thumbnail' => 'https://example.com/images/general-knowledge-thumbnail.jpg',
                'quiz_status_id' => 1, // Draft
                'theme_id' => 1, // Classic theme
                'landing_page_id' => 1,
                'mechanic_page_id' => 1,
                'admin_id' => 1,
            ],
            [
                'name' => 'Science Trivia',
                'description' => 'Test your knowledge in science with this quiz.',
                'thumbnail' => 'https://example.com/images/science-trivia-thumbnail.jpg',
                'quiz_status_id' => 2, // Published
                'theme_id' => 2, // Modern theme
                'landing_page_id' => 2,
                'mechanic_page_id' => 2,
                'admin_id' => 2,
            ],
            // [
            //     'name' => 'History Challenge',
            //     'description' => 'A challenging quiz on historical events.',
            //     'thumbnail' => 'https://example.com/images/history-challenge-thumbnail.jpg',
            //     'quiz_status_id' => 3, // Archived
            //     'theme_id' => 3, // Dark theme
            //     'landing_page_id' => 3,
            //     'mechanic_page_id' => 3,
            //     'admin_id' => 3,
            // ],
        ]);
    }
}
