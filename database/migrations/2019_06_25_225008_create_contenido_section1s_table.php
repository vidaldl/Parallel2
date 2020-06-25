<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContenidoSection1sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contenido_section1s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('logo')->nullable();
            $table->string('background_image')->nullable();
            $table->string('title')->nullable();
            $table->text('tagline')->nullable();
            $table->string('button')->nullable();
            $table->text('link')->nullable();
            $table->integer('display')->default('1')->nullable();
            $table->integer('carousel')->default('1')->nullable();
            $table->integer('style')->default('1')->nullable();
            $table->integer('title_size')->default('60')->nullable();
            $table->integer('subtitle_size')->default('32')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contenido_section1s');
    }
}
