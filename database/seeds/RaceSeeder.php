<?php

use Illuminate\Database\Seeder;

class RaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('races')->insert([
            ['name' => 'Elf'],
            ['name' => 'Gnome'],
            ['name' => 'Human'],
            ['name' => 'Dwarf'],
            ['name' => 'Orc'],
        ]);
    }
}
