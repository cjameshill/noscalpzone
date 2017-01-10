<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('seller_id')->unsigned();
            $table->integer('buyer_id')->nullable();
            $table->uuid('ticket_key')->unique();
            $table->string('title');
            $table->string('description');
            $table->integer('amount');
            $table->boolean('sold')->default(false);
            $table->boolean('live')->default(true);
            $table->smallInteger('quantity')->default(1);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('seller_id')
                  ->references('id')
                  ->on('sellers');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tickets');
    }
}
