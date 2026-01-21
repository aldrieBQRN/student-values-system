<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Create your main Admin/Test account
        User::create([
            'name' => 'Student Tester',
            'email' => 'aldriebaquiran15@gmail.com',
            'password' => Hash::make('password'), // Easy password for dev
            'email_verified_at' => now(), // Auto-verify so you can login immediately
            'avatar_style' => 'default',
            'stress_level' => 5,
        ]);

        // 2. (Optional) Create 10 random extra users for testing "Community" features
        // User::factory(10)->create();
    }
}
