<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matchs', function (Blueprint $table) {
            $table->increments('id');
            $table->date('match_date');
            $table->string('meteo');
            $table->string('place');
            $table->integer('faults_nb');
            $table->integer('goals_nb');
            $table->integer('winner_id');
            $table->unsignedInteger('team1_id');
            $table->unsignedInteger('team2_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matchs');
    }
}
