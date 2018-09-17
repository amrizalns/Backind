<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_details', function (Blueprint $table) {
            $table->increments('id_booking');
            $table->integer('id_tourism')->nullable();
            $table->integer('id_homestay')->nullable();
            $table->integer('id_user')->unsigned();
            $table->date('checkin')->nullable();
            $table->date('checkout')->nullable();
            $table->date('checkin_tourism')->nullable();
            $table->integer('total_ticket');
            $table->integer('total_cost');
            $table->datetime('duedate');
            $table->timestamps();

            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking_details');
    }
}
