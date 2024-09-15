<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizQuestionLinksTable extends Migration
{
    public function up()
    {
        Schema::create('quiz_question_links', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quiz_id')->constrained('quizzes');
            $table->foreignId('question_id')->constrained('quiz_questions');
        });
    }

    public function down()
    {
        Schema::dropIfExists('quiz_question_links');
    }
}
