<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfoSliderTextsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_slider_texts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->text('contenido')->nullable();
            $table->string('button')->nullable();
            $table->text('link')->nullable();
            $table->integer('display_type')->nullable()->default(0);
            $table->text('video')->nullable();
            $table->integer('display')->default('1')->nullable();
            $table->string('back_color')->nullable()->default('#FFFFFF');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('info_slider_texts');
    }
}
