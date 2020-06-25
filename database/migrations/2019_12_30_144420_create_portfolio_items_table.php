<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePortfolioItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portfolio_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->string('logo')->nullable();
            $table->integer('logo_link')->default(0);
            $table->integer('logo_link_type')->default(0);
            $table->string('logo_link_address')->nullable();
            $table->string('screenshot')->nullable();
            $table->text('contenido')->nullable();
            $table->string('author')->nullable();
            $table->text('author_bio')->nullable();
            $table->string('link_title')->nullable();
            $table->string('button_text')->nullable();
            $table->string('button_icon')->nullable();
            $table->string('link')->nullable();
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
        Schema::dropIfExists('portfolio_items');
    }
}
