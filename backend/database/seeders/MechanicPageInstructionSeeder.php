<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MechanicPageInstructionSeeder extends Seeder
{
    public function run()
    {
        DB::table('mechanic_page_instructions')->insert([
            [
                'mechanic_page_id' => 1,
                'instruction_id' => 1,
            ],
            [
                'mechanic_page_id' => 1,
                'instruction_id' => 2,
            ],
            [
                'mechanic_page_id' => 2,
                'instruction_id' => 3,
            ],
        ]);
    }
}
