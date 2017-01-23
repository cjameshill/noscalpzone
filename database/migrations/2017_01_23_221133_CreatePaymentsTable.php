<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('amount');
            $table->string('charge_id');
            $table->integer('seller_id')->unsigned();
            $table->integer('buyer_id')->unsigned();
            $table->integer('ticket_id')->unsigned();
            $table->boolean('payment_success')->default(true);
            $table->timestamps();

            $table->foreign('seller_id')
                ->references('id')
                ->on('sellers');

            $table->foreign('buyer_id')
                ->references('id')
                ->on('buyers');

            $table->foreign('ticket_id')
                ->references('id')
                ->on('tickets');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('payments');
    }
}
