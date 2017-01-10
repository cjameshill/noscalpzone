<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerformersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('performers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->softDeletes();
            $table->timestamps();
        });


        Schema::create('performer_venue', function (Blueprint $table) {
            $table->integer('performer_id')->unsigned();
            $table->integer('venue_id')->unsigned();

            $table->foreign('performer_id')
                ->references('id')
                ->on('performers')
                ->onDelete('cascade');;

            $table->foreign('venue_id')
                ->references('id')
                ->on('venues')
                ->onDelete('cascade');;
        });

        Schema::create('event_performer', function (Blueprint $table) {
            $table->integer('event_id')->unsigned();
            $table->integer('performer_id')->unsigned();

            $table->foreign('event_id')
                ->references('id')
                ->on('events')
                ->onDelete('cascade');;

            $table->foreign('performer_id')
                ->references('id')
                ->on('performers')
                ->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('performers');
    }
}
