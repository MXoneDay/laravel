<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenaltiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penalties', function (Blueprint $table) {
            $table->tinyIncrements('id');

            $table->tinyInteger('race_id')->unsigned();
            $table->foreign('race_id')->references('id')->on('races');
            
            $table->tinyInteger('driver_number')->unsigned();
            $table->foreign('driver_number')->references('driver_number')->on('drivers');
            
            $table->tinyInteger('warning');
            $table->tinyInteger('licence_points');
            $table->string('notes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penalties');
    }
}
