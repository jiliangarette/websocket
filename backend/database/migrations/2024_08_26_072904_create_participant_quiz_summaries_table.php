<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipantQuizSummariesTable extends Migration
{
    public function up()
    {
        Schema::create('participant_quiz_summaries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('participant_id')->constrained('participants');
            $table->foreignId('quiz_id')->constrained('quizzes');
            $table->integer('score');
            $table->timestamp('completed_at');
        });
    }

    public function down()
    {
        Schema::dropIfExists('participant_quiz_summaries');
    }
}
