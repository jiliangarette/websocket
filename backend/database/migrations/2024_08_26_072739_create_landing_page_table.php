<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandingPageTable extends Migration
{
    public function up()
    {
        Schema::create('landing_page', function (Blueprint $table) {
            $table->id(); // This is an unsignedBigInteger by default
            $table->string('background_image')->nullable();
            $table->string('landing_page_image')->nullable();
            $table->string('header');
            $table->string('sub_header');
            $table->string('button_text');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('landing_page');
    }
}
