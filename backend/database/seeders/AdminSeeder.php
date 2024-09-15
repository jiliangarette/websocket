<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        DB::table('admins')->insert([
            [
                'first_name' => 'Alice',
                'last_name' => 'Johnson',
                'email' => 'alice.johnson@example.com',
                'password' => Hash::make('password123'),
                'role' => 'admin',
            ],
            [
                'first_name' => 'Bob',
                'last_name' => 'Smith',
                'email' => 'bob.smith@example.com',
                'password' => Hash::make('password123'),
                'role' => 'viewer',
            ],
        ]);
    }
}
