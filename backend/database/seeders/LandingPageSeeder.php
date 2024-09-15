<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LandingPageSeeder extends Seeder
{
    public function run()
    {
        DB::table('landing_page')->insert([
            [
                'background_image' => 'https://example.com/images/landing-page-bg1.jpg',
                'landing_page_image' => 'https://example.com/images/landing-page-img1.jpg',
                'header' => 'Welcome to the General Knowledge Quiz!',
                'sub_header' => 'Test your knowledge and have fun.',
                'button_text' => 'Start Quiz',
            ],
            [
                'background_image' => 'https://example.com/images/landing-page-bg2.jpg',
                'landing_page_image' => 'https://example.com/images/landing-page-img2.jpg',
                'header' => 'Science Trivia Awaits!',
                'sub_header' => 'Put your science knowledge to the test.',
                'button_text' => 'Begin',
            ],
            [
                'background_image' => 'https://example.com/images/landing-page-bg3.jpg',
                'landing_page_image' => 'https://example.com/images/landing-page-img3.jpg',
                'header' => 'History Challenge',
                'sub_header' => 'How well do you know history?',
                'button_text' => 'Join Now',
            ],
        ]);
    }
}
