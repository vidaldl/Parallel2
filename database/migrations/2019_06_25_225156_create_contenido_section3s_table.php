<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContenidoSection3sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contenido_section3s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->text('contenido')->nullable();
            $table->string('button')->nullable();
            $table->string('background_color')->default('#1ABC9C')->nullable();
            $table->string('text_color')->default('#EEE')->nullable();
            $table->string('link')->nullable();
            $table->integer('link_type')->default(0);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contenido_section3s');
    }
}
