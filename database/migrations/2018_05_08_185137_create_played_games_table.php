<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayedGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('played_games', function (Blueprint $table) {
			$table->increments('id');
			$table->unsignedInteger('character_id');
			$table->unsignedInteger('latest_plot_id');

			$table->timestamps();
			
			$table->foreign('latest_plot_id')->references('id')->on('plots')
			->onDelete('no action');
			$table->foreign('character_id')->references('id')->on('characters')
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
        Schema::dropIfExists('played_games');
    }
}
