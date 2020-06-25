<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatalogItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalog_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('img_primaria')->nullable();
            $table->string('img_secundaria')->nullable();
            $table->string('img_btn')->default('Acercar')->nullable();
            $table->string('img_icon')->default('fas fa-search-plus')->nullable();
            $table->float('precio')->nullable();
            $table->integer('destacado')->default(0)->nullable();
            $table->string('destacado_title')->nullable();
            $table->string('precio_nuevo')->nullable();
            $table->string('button')->default('Más Información')->nullable();
            $table->string('button_icon')->default('fas fa-arrow-right')->nullable();
            $table->string('button_link')->default('#')->nullable();
            $table->string('link_code')->nullable();
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
        Schema::dropIfExists('catalog_items');
    }
}
