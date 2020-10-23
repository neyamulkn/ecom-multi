<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->char('title_size', 5)->default(60)->nullable();
            $table->string('title_color')->default('#000000')->nullable();
            $table->string('title_style')->default('inherit')->nullable();
            $table->char('subtitle_size', 5)->default(50)->nullable();
            $table->string('subtitle_color')->default('#000000')->nullable();
            $table->string('subtitle_style')->default('auto')->nullable();
            $table->string('text_position')->default('left');
            $table->integer('banner_type');
            $table->integer('position')->nullable();
            $table->integer('created_by');
            $table->integer('updated_by')->nullable();
            $table->tinyInteger('status')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banners');
    }
}
