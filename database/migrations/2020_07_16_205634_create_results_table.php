<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->tinyIncrements('id');
            
            $table->tinyInteger('race_id')->unsigned();
            $table->foreign('race_id')->references('id')->on('races');
            
            $table->tinyInteger('number')->unsigned();
            $table->foreign('number')->references('driver_number')->on('drivers');
           
            $table->tinyInteger('team_id')->unsigned();
            $table->foreign('team_id')->references('id')->on('teams');
            
            $table->tinyInteger('grid');
            $table->tinyInteger('place');
            $table->string('time', 10);
            $table->string('fastest_lap_time', 10);
            $table->boolean('fastest_lap');
            $table->string('status', 3);
            $table->tinyInteger('type');
            $table->tinyInteger('points');
            $table->tinyInteger('bonus_points');
            $table->tinyInteger('penalty_points');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('race_results');
    }
}
