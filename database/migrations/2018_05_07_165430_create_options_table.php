<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('options', function (Blueprint $table) {
			$table->increments('id');
			$table->unsignedInteger('plot_id');
			$table->unsignedInteger('plot_win_id')->nullable();
			$table->unsignedInteger('plot_lose_id')->nullable();
			$table->unsignedInteger('plot_redirect_id')->nullable();
			//enemy...
			$table->unsignedInteger('character_id')->nullable();
			
			$table->string('name');
			$table->boolean('redirects')->default(false);

			$table->foreign('plot_id')->references('id')->on('plots')
			->onDelete('cascade');

			$table->foreign('plot_win_id')->references('id')->on('plots')
			->onDelete('no action');
			$table->foreign('plot_lose_id')->references('id')->on('plots')
			->onDelete('no action');
			$table->foreign('plot_redirect_id')->references('id')->on('plots')
			->onDelete('no action');
			$table->foreign('character_id')->references('id')->on('characters')
			->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('options');
    }
}
