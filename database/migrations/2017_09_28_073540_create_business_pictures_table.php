<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessPicturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_pictures', function (Blueprint $table) {
            $table->increments('id_business_pictures');
            $table->integer('id_business_detail')->nullable()->unsigned();
            $table->integer('id_object')->nullable()->unsigned();
            $table->string('pict_url');
            $table->string('desc');
            $table->timestamps();

            $table->foreign('id_business_detail')->references('id_business_details')->on('business_details')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('business_pictures');
    }
}
