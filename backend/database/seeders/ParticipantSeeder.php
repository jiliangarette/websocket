<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParticipantSeeder extends Seeder
{
    public function run()
    {
        DB::table('participants')->insert([
            [
                'full_name' => 'John Doe',
                'email' => 'john.doe@example.com',
                'contact_number' => '123-456-7890',
            ],
            [
                'full_name' => 'Jane Smith',
                'email' => 'jane.smith@example.com',
                'contact_number' => '987-654-3210',
            ],
        ]);
    }
}
