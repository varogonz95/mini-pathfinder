<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plots', function (Blueprint $table) {
			$table->increments('id');
            $table->unsignedInteger('game_id');
            $table->unsignedInteger('plot_id')->nullable()->default(null);
			
            $table->text('name')->nullable();
			$table->text('description')->nullable(false);
			
			$table->foreign('game_id')->references('id')->on('games')
			->onDelete('cascade');
			$table->foreign('plot_id')->references('id')->on('plots')
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
        Schema::dropIfExists('secuences');
    }
}
