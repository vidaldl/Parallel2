<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receipts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('receipt_number')->unique();
            $table->string('description')->default('description');
            $table->string('date');
            $table->string('client_name');
            $table->string('client_email');
            $table->string('method');
            $table->string('card_type')->nullable();
            $table->string('card_last4')->nullable();
            $table->string('subtotal');
            $table->string('tax');
            $table->string('total');
            $table->string('payment_status')->nullable();
            $table->string('recurring_id')->nullable();
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
        Schema::dropIfExists('receipts');
    }
}
