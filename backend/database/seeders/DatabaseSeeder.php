<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use App\Models\Participant;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin::factory(15)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            AdminSeeder::class,
            LandingPageSeeder::class,
            MechanicInstructionSeeder::class,
            MechanicPageSeeder::class,
            MechanicPageInstructionSeeder::class,
            ParticipantSeeder::class,
            QuizStatusSeeder::class,
            ThemeSeeder::class,
            QuestionTypeSeeder::class,
            QuizQuestionSeeder::class,
            ChoiceSeeder::class,
            QuizSeeder::class
        ]);
    }
}
