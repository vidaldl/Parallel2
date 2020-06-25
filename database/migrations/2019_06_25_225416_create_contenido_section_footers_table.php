->nullable()<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContenidoSectionFootersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contenido_section_footers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('copy')->nullable();
            $table->string('logo')->nullable();
            $table->string('social_title')->nullable();
            $table->text('acerca')->nullable();
            $table->integer('style')->default('1')->nullable();
            $table->integer('line')->default('0')->nullable();
            $table->integer('line_style')->default('1')->nullable();
            $table->string('back_color')->default('#333');
            $table->string('color')->default('#CCC');
            $table->string('color_sec')->default('#999');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contenido_section_footers');
    }
}
