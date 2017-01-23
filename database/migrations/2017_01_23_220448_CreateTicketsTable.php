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
            $table->integer('set_id')->unsigned();
            $table->integer('event_id')->unsigned();
            $table->integer('buyer_id')->nullable();
            $table->integer('download_id')->nullable();
            $table->uuid('key')->unique();
            $table->string('title');
            $table->integer('face_value');
            $table->integer('amount');
            $table->boolean('is_face_value')->default(false);
            $table->boolean('sold')->default(false);
            $table->boolean('live')->default(true);
            $table->boolean('in_cart')->default(false);
            $table->boolean('is_ga')->default(false);
            $table->string('section');
            $table->string('row');
            $table->string('seat');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('seller_id')
                ->references('id')
                ->on('sellers');

            $table->foreign('set_id')
                ->references('id')
                ->on('sets');

            $table->foreign('event_id')
                ->references('id')
                ->on('events');
        });

        Schema::create('downloads', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ticket_id')->unsigned();
            $table->uuid('ticket_key');
            $table->string('ticket_uri')->unique();
            $table->timestamps();

            $table->foreign('ticket_id')
                ->references('id')
                ->on('tickets')
                ->onDelete('cascade');

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
        Schema::drop('downloads');
    }
}
