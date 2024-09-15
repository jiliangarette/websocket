<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ThemeSeeder extends Seeder
{
    public function run()
    {
        DB::table('themes')->insert([
            [
                'name' => 'Winter Wonderland',
                'main_color' => '#ffffff',
                'accent_color' => '#00bfff',
                'text_color' => '#000000',
                'button_color' => '#4682b4',
                'background_type' => 'image',
                'background_value' => 'https://images.rawpixel.com/image_800/cHJpdmF0ZS9sci9pbWFnZXMvd2Vic2l0ZS8yMDIzLTEwL3Jhd3BpeGVsb2ZmaWNlN19waG90b19vZl93aW50ZXJfYmFja2dyb3VuZF9vZl9zbm93X2FuZF9mcm9zdF93aV82M2ViNmEwNy1mNmY0LTQwNTMtYWY2OC05ZGYwZDMyMTc5NTEtYi5qcGc.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Frosty Night',
                'main_color' => '#1e3a5f',
                'accent_color' => '#b0c4de',
                'text_color' => '#f5f5f5',
                'button_color' => '#4682b4',
                'background_type' => 'color',
                'background_value' => '#1e3a5f',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Spring Bloom',
                'main_color' => '#ff69b4',
                'accent_color' => '#98fb98',
                'text_color' => '#2f4f4f',
                'button_color' => '#ff6347',
                'background_type' => 'image',
                'background_value' => 'https://c0.wallpaperflare.com/preview/426/405/118/cherry-blossom-spring-bloom-pink.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Morning Dew',
                'main_color' => '#e0ffff',
                'accent_color' => '#3cb371',
                'text_color' => '#2e8b57',
                'button_color' => '#20b2aa',
                'background_type' => 'color',
                'background_value' => '#e0ffff',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Beach Sunset',
                'main_color' => '#ff4500',
                'accent_color' => '#ffd700',
                'text_color' => '#ffffff',
                'button_color' => '#ff6347',
                'background_type' => 'image',
                'background_value' => 'https://wallpapers.com/images/hd/beach-sunset-pictures-43h9lzv2hp9lycm6.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Tropical Vibes',
                'main_color' => '#32cd32',
                'accent_color' => '#ffa500',
                'text_color' => '#ffffff',
                'button_color' => '#ff4500',
                'background_type' => 'image',
                'background_value' => 'https://static.vecteezy.com/system/resources/previews/002/411/732/non_2x/summer-tropical-vibes-background-free-vector.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
