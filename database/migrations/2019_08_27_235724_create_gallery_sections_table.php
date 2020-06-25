<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGallerySectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gallery_sections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable()->default('Galería');
            $table->string('subtitle')->nullable()->default('Nuestras Fotos');
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
        Schema::dropIfExists('gallery_sections');
    }
}
