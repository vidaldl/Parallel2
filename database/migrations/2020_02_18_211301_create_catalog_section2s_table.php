<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatalogSection2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalog_section2s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->default('Catálogo 2')->nullable();
            $table->string('title_link')->nullable();
            $table->string('button_primary')->default('#EEE');
            $table->string('button_secondary')->default('#F9F9F9');
            $table->string('button_text_color')->default('#333');
            $table->integer('style')->default(0);
            $table->integer('rows')->default(1);
            $table->integer('img_orientation')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('catalog_section2s');
    }
}
