<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChoicesTable extends Migration
{
    public function up()
    {
        Schema::create('choices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_id')->constrained('quiz_questions');
            $table->string('choice_text');
            $table->string('choice_image')->nullable();
            $table->boolean('is_correct');
        });
    }

    public function down()
    {
        Schema::dropIfExists('choices');
    }
}