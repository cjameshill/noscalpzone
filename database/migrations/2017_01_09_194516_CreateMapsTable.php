<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uri')->nullable();
            $table->timestamps();
        });

        Schema::create('mappables', function (Blueprint $table) {
            $table->integer('map_id')->nullable();
            $table->integer('mappable_id')->nullable();
            $table->string('mappable_type')->nullable();

            $table->index(['mappable_id', 'mappable_type']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('maps');
        Schema::dropIfExists('mappables');
    }
}
