<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('content_style')->default(0);
            $table->text('contenido')->nullable();
            $table->string('image')->nullable();
            $table->string('button')->default('Haz Click Para Cerrar')->nullable();
            $table->string('button_sub')->default('En caso que no necesites más información')->nullable();
            $table->string('color')->default('#fff')->nullable();
            $table->string('button_color_sec')->default('#AB350F')->nullable();
            $table->string('link')->nullable();
            $table->integer('width')->default(6);
            $table->string('back_color')->default('#FFF')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modals');
    }
}
