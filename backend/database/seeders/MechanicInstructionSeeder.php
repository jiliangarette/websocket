<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MechanicInstructionSeeder extends Seeder
{
    public function run()
    {
        DB::table('mechanic_instructions')->insert([
            [
                'instruction' => 'Read each question carefully.',
                'icon' => 'https://example.com/icons/instruction1.png',
            ],
            [
                'instruction' => 'You can skip a question if needed.',
                'icon' => 'https://example.com/icons/instruction2.png',
            ],
            [
                'instruction' => 'Select the best answer for each question.',
                'icon' => 'https://example.com/icons/instruction3.png',
            ],
        ]);
    }
}
