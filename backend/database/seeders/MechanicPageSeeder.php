<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MechanicPageSeeder extends Seeder
{
    public function run()
    {
        DB::table('mechanic_page')->insert([
            [
                'background_image' => 'https://example.com/images/mechanic-page-bg1.jpg',
                'header' => 'How to Play the General Knowledge Quiz',
                'button_text' => 'Got It!',
            ],
            [
                'background_image' => 'https://example.com/images/mechanic-page-bg2.jpg',
                'header' => 'Science Trivia Mechanics',
                'button_text' => 'Understand',
            ],
            [
                'background_image' => 'https://example.com/images/mechanic-page-bg3.jpg',
                'header' => 'History Challenge Instructions',
                'button_text' => 'Start Challenge',
            ],
        ]);
    }
}
