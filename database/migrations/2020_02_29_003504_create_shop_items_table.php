<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('img_primaria')->nullable();
            $table->string('img_secundaria')->nullable();
            $table->string('cart_btn')->default('Carrito')->nullable();
            $table->string('img_btn')->default('Acercar')->nullable();
            $table->string('img_icon')->default('fas fa-search-plus')->nullable();
            $table->float('precio')->nullable();
            $table->float('weight')->nullable();
            $table->string('unit')->default('lb')->nullable();
            $table->integer('destacado')->default(0)->nullable();
            $table->string('destacado_title')->nullable();
            $table->string('precio_nuevo')->nullable();
            $table->string('button')->default('Más Información')->nullable();
            $table->string('button_icon')->default('fas fa-arrow-right')->nullable();
            $table->string('button_link')->default('#')->nullable();
            $table->string('link_code')->nullable();
            $table->text('details')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('shop_items');
    }
}
