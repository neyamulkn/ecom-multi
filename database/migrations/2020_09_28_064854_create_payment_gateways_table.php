<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentGatewaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_gateways', function (Blueprint $table) {
            $table->id();
            $table->char('method_name', 55);
            $table->char('method_slug', 55);
            $table->char('method_logo')->default('method_logo.png');
            $table->string('public_key', 125)->nullable();
            $table->string('secret_key', 125)->nullable();
            $table->string('method_mode', 6)->nullable();
            $table->string('method_info', 255)->nullable();
            $table->enum('method_for', ['both', 'purchase', 'payment']);
            $table->tinyInteger('is_default')->nullable();
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
        Schema::dropIfExists('payment_gateways');
    }
}
