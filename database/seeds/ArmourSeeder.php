<?php

use Illuminate\Database\Seeder;

class ArmourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('armour_classes')->insert([
			['name' => 'Heavy'],
			['name' => 'Medium'],
			['name' => 'Light'],
			['name' => 'Natural'],
		]);
    }
}
