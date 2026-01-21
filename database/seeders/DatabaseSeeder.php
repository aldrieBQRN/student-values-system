<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,       // <--- Runs first!
            ModuleOneSeeder::class,  // Your content
            ModuleTwoSeeder::class,
            ModuleThreeSeeder::class,
            ModuleFourSeeder::class,
        ]);
    }
}
