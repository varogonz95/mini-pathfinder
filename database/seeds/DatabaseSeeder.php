<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DefaultUserSeeder::class);
        $this->call(ClassSeeder::class);
        $this->call(RaceSeeder::class);
        $this->call(ArmourSeeder::class);
        // $this->call(CharacterSeeder::class);
        // $this->call(GameSeeder::class);
    }
}
