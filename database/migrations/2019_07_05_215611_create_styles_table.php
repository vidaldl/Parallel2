<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStylesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('styles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('primary_color')->nullable();
            $table->string('button_primary')->nullable();
            $table->string('button_secondary')->nullable();
            $table->string('favicon')->nullable();
            $table->string('page_title')->nullable();
            $table->string('custom_icon_1')->nullable();
            $table->string('custom_link_text_1')->nullable();
            $table->text('custom_link_address_1')->nullable();
            $table->integer('show_link_1')->default('1')->nullable();
            $table->string('custom_icon_2')->nullable();
            $table->string('custom_link_text_2')->nullable();
            $table->text('custom_link_address_2')->nullable();
            $table->integer('show_link_2')->default('1')->nullable();
            $table->integer('link_mode_1')->default('1')->nullable();
            $table->integer('link_mode_2')->default('1')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('styles');
    }
}
