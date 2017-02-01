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
            $table->string('order_id');
            $table->string('charge_id');
            $table->integer('seller_id')->unsigned();
            $table->integer('buyer_id')->nullable();
            $table->integer('set_id')->unsigned();
            $table->text('tickets');
            $table->text('data');
            $table->timestamps();

            $table->foreign('seller_id')
                ->references('id')
                ->on('sellers');

            $table->foreign('set_id')
                ->references('id')
                ->on('sets');


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
