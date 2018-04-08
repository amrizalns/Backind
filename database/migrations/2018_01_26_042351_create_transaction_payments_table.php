<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_payments', function (Blueprint $table) {
            $table->increments('id_transaksi');
            $table->integer('id_booking')->unsigned();
            $table->datetime('tgl_transfer')->nullable();
            $table->string('bukti_transfer')->nullable();
            $table->tinyInteger('status_transfer')->default(2);
            $table->timestamps();

            $table->foreign('id_booking')->references('id_booking')->on('booking_details')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_payments');
    }
}
