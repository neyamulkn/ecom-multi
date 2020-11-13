<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('type', 25)->comment('productByeSell, adminPay, wallet, refund, blTransfer');
            $table->string('payment_method', 25)->nullable();
            $table->string('transaction_details', 25)->nullable();
            $table->integer('seller_id')->nullable();
            $table->integer('customer_id')->nullable();
            $table->integer('item_id')->nullable();
            $table->double('amount', 8, 2);
            $table->double('total_amount', 8, 2)->nullable();
            $table->string('ref_id', 25)->nullable();
            $table->double('ref_earning', 8, 2)->nullable();
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('transactions');
    }
}
