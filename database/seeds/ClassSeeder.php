<?php

use Illuminate\Database\Seeder;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classes')->insert([
			['name' => 'Cleric'],
			['name' => 'Bard'],
			['name' => 'Barbarian'],
			['name' => 'Fighter'],
			['name' => 'Monk'],
			['name' => 'Paladin'],
			['name' => 'Ranger'],
			['name' => 'Sorcerer'],
			['name' => 'Wizard'],
			['name' => 'Druid'],
		]);
    }
}
