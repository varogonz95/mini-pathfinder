<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharactersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characters', function (Blueprint $table) {
            $table->increments('id');
			$table->unsignedInteger('game_id');
			$table->unsignedInteger('race_id');
			$table->unsignedInteger('class_id');
			$table->unsignedInteger('armour_class_id');
			$table->unsignedInteger('user_id')->nullable();
			
			$table->string('name');
			$table->unsignedInteger('health')->default(0);
			$table->string('religion')->nullable();
			$table->boolean('sex')->nullable();
			$table->unsignedInteger('age')->default(0);
			$table->string('hair')->nullable();
			$table->string('eyes')->nullable();

			// stats
			$table->unsignedInteger('will')->default(0);
			$table->unsignedInteger('strength')->default(0);
			$table->unsignedInteger('agility')->default(0);
			$table->unsignedInteger('pg');
			$table->unsignedInteger('base_attack');
			
			$table->timestamps();

			$table->foreign('user_id')->references('id')->on('users')
			->onDelete('cascade');
			$table->foreign('game_id')->references('id')->on('games')
			->onDelete('cascade');
			$table->foreign('class_id')->references('id')->on('classes')
			->onDelete('no action');
			$table->foreign('armour_class_id')->references('id')->on('armour_classes')
			->onDelete('no action');
			$table->foreign('race_id')->references('id')->on('races')
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
        Schema::dropIfExists('characters');
    }
}
