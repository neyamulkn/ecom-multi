<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->string('thumbnail')->nullable();
            $table->string('banner')->nullable();
            $table->string('background_color', 10)->nullable();
            $table->string('text_color', 10)->nullable();
            $table->string('link')->nullable();
            $table->tinyInteger('featured')->nullable();
            $table->string('notes')->nullable();
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
        Schema::dropIfExists('offers');
    }
}
