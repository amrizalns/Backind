<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteColumnBusinessPictures extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('business_pictures', function (Blueprint $table) {
            $table->dropColumn(['id_object','desc']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('business_pictures', function (Blueprint $table) {
          $table->integer('id_object')->nullable()->unsigned();
          $table->string('desc');
      });
    }
}
