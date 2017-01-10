<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->morphs('addressable');
            $table->string('street_1')->nullable();
            $table->string('street_2')->nullable();
            $table->string('business_name')->nullable();
            $table->string('house_name')->nullable();
            $table->string('number')->nullable();
            $table->string('apt_number')->nullable();
            $table->string('city_1')->nullable();
            $table->string('city_2')->nullable();
            $table->string('state', 2)->nullable();
            $table->string('county')->nullable();
            $table->string('country')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
