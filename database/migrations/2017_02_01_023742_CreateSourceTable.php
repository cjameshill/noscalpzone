<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSourceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sources', function (Blueprint $table){
            $table->increments('id');
            $table->integer('customer_id')->unsigned();
            $table->text('data');
            $table->timestamps();

            $table->foreign('customer_id')
                  ->references('id')
                  ->on('customers')
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
        Schema::drop('sources');
    }
}
