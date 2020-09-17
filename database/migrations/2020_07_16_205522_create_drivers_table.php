<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->tinyIncrements('driver_number');
            $table->tinyInteger('user_id')->unsigned();
            $table->tinyInteger('team_id')->unsigned();
            $table->foreign('team_id')->references('id')->on('teams');
            $table->string('firstname',30);
            $table->string('lastname',30);
            $table->string('img_dir',30);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drivers');
    }
}
