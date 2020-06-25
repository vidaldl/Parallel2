->nullable()<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContenidoSection5sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contenido_section5s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->string('success')->default('success')->nullable();
            $table->string('errors')->default('error')->nullable();
            $table->integer('map')->default(1);
            $table->text('map_iframe')->nullable();
            $table->text('info')->nullable();
            $table->string('back_color')->nullable()->default('#E5E5E5');
            $table->string('back_form')->nullable()->default('#1ABC9C');
            $table->string('name')->default('Name');
            $table->string('email')->default('Email');
            $table->string('phone')->default('Phone');
            $table->string('services')->default('Services');
            $table->string('subject')->default('Subject');
            $table->string('message')->default('Message');
            $table->string('send_button')->default('Send Message');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contenido_section5s');
    }
}
