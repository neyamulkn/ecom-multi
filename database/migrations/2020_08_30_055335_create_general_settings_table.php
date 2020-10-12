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
            $table->string('favicon')->default('favicon.png');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->text('tags')->nullable();
            $table->string('about')->nullable();
            $table->text('header')->nullable();
            $table->text('footer')->nullable();
            $table->char('phone', 150)->nullable();
            $table->char('email', 150)->nullable();
            $table->string('currency', 25)->default('USD');
            $table->string('currency_symble', 15)->default('$');
            $table->tinyInteger('cash_on_delivery')->nullable();
            $table->tinyInteger('slider')->default(1);
            $table->tinyInteger('services')->default(1);
            $table->tinyInteger('banner_large')->default(1);
            $table->tinyInteger('banner_small')->default(1);
            $table->tinyInteger('banner_towImg')->default(1);
            $table->tinyInteger('banner_threeImg')->default(1);
            $table->tinyInteger('banner_leftRight')->default(1);
            $table->tinyInteger('best_seller')->default(1);
            $table->tinyInteger('flash_deal')->default(1);
            $table->tinyInteger('hot')->default(1);
            $table->tinyInteger('arrival')->default(1);
            $table->tinyInteger('top_rated')->default(1);
            $table->tinyInteger('trending')->default(1);
            $table->tinyInteger('feature_products')->default(1);
            $table->tinyInteger('special_products')->default(1);
            $table->tinyInteger('category')->default(1);
            $table->tinyInteger('brand')->default(1);

            $table->tinyInteger('registration')->nullable();
            $table->tinyInteger('email_verification')->nullable();
            $table->tinyInteger('sms_verification')->nullable();
            $table->tinyInteger('email_notification')->nullable();
            $table->tinyInteger('sms_notification')->nullable();

            $table->tinyInteger('blog')->default(1);
            $table->tinyInteger('patner')->default(1);
            $table->tinyInteger('reviews')->default(1);
            $table->tinyInteger('newsletters')->default(1);
            $table->tinyInteger('is_loader')->default(1);

            $table->string('cart_success')->default('Successfully Added To Cart.');
            $table->string('cart_error')->default('Out Of Stock !!');
            $table->string('cart_remove')->default('Successfully Remove From Cart.');
            $table->string('wish_success')->default('Successfully Added To Cart.');
            $table->string('wish_error')->default('Already Added To Wishlist !!');
            $table->string('wish_remove')->default('Successfully Remove From Wishlist.');
            $table->string('compare_success')->default('Successfully Added To Compare.');
            $table->string('compare_error')->default('Already Added To Compare !!');
            $table->string('compare_remove')->default('Successfully Remove From Compare.');

            $table->string('smtp_host')->default(1);
            $table->string('smtp_port')->default(1);
            $table->string('smtp_user')->default(1);
            $table->string('smtp_pass')->default(1);
            $table->string('date_format')->default('j M, Y');
           
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
        Schema::dropIfExists('general_settings');
    }
}
