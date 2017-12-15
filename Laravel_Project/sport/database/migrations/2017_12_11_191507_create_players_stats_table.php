<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayersStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players_stats', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('attack');
            $table->integer('defense');
            $table->integer('speed');
            $table->integer('broom');
            $table->integer('control');
            $table->integer('agressivity');
            $table->unsignedInteger('player_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('players_stats');
    }
}
