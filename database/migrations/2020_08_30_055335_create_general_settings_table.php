<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_settings', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->default('logo.png');
            $table->string('invoice_logo')->default('invoice_logo.png');
            $table->string('favicon')->default('favicon.png');

            $table->string('site_name')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->string('about')->nullable();
            $table->string('address')->nullable();
            $table->text('header')->nullable();
            $table->text('footer')->nullable();
            $table->char('phone', 150)->nullable();
            $table->char('email', 150)->nullable();
            $table->string('currency', 25)->default('USD');
            $table->string('currency_symble', 15)->default('$');

            $table->tinyInteger('registration')->nullable();
            $table->tinyInteger('email_verification')->nullable();
            $table->tinyInteger('sms_verification')->nullable();
            $table->tinyInteger('email_notification')->nullable();
            $table->tinyInteger('sms_notification')->nullable();

            $table->tinyInteger('newsletters')->default(1);
            $table->tinyInteger('is_loader')->default(1);
            $table->string('date_format')->default('j M, Y');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('general_settings');
    }
}
