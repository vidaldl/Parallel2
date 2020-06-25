<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfoSliderText2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_slider_text2s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->text('contenido')->nullable();
            $table->string('button')->nullable();
            $table->text('link')->nullable();
            $table->integer('display_type')->nullable()->default(0);
            $table->text('video')->nullable();
            $table->integer('display')->default('0')->nullable();
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
        Schema::dropIfExists('info_slider_text2s');
    }
}
