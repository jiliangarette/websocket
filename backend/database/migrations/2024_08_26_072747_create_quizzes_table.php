<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizzesTable extends Migration
{
    public function up()
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('thumbnail');
            $table->foreignId('quiz_status_id')->constrained('quiz_status');
            $table->foreignId('theme_id')->constrained('themes');
            $table->foreignId('landing_page_id')->constrained('landing_page');
            $table->foreignId('mechanic_page_id')->constrained('mechanic_page');
            $table->foreignId('admin_id')->constrained('admins');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('quizzes');
    }
}
