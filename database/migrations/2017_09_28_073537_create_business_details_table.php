<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_details', function (Blueprint $table) {
            $table->increments('id_business_details');
            $table->string('business_name');
            $table->string('business_email')->unique();
            $table->string('business_address');
            $table->string('business_lat');
            $table->string('business_lang');
            $table->string('business_phone');
            $table->time('business_open_time');
            $table->time('business_close_time');
            $table->bigInteger('business_price');
            $table->string('business_desc');
            $table->string('business_profile_pict');
            $table->string('condition');
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
        Schema::dropIfExists('business_details');
    }
}
