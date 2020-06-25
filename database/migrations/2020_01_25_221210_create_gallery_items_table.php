<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalleryItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gallery_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->string('desc_title')->nullable();
            $table->string('video')->nullable();
            $table->text('desc')->nullable();
            $table->string('left_btn')->default('Expander');
            $table->string('right_btn')->default('Más');
            $table->integer('display_tooltip')->default(1);
            $table->integer('display_type')->default(1);
            $table->integer('display_simple')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gallery_items');
    }
}
