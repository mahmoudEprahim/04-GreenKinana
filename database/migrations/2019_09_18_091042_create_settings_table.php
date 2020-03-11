<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sitename_ar');
            $table->string('sitename_en')->nullable();
            $table->string('qinana_added_val_ar')->nullable();
            $table->string('qinana_added_val_en')->nullable();
            $table->text('logo_ar')->nullable();
            $table->text('abou_us_bg_img')->nullable();
            $table->text('logo_en')->nullable();
            $table->string('email')->nullable();
            $table->string('main_lang')->default('ar');
            $table->string('main_currency')->nullable();
            $table->string('fees')->nullable();
            $table->string('main_color')->nullable();
            $table->string('footer_header_color')->nullable();
            $table->longText('about_site_ar')->nullable();
            $table->longText('about_site_en')->nullable();
            $table->string('address_en')->nullable();
            $table->string('address_ar')->nullable();
            $table->string('phone')->nullable();
            $table->string('phone_2')->nullable();
            $table->string('facebook')->nullable();
            $table->string('snapshat')->nullable();
            $table->string('instagram')->nullable();
            $table->string('snapshat')->nullable();
            $table->string('pinterest')->nullable();
            $table->string('youtube')->nullable();
            $table->text('keyword')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
