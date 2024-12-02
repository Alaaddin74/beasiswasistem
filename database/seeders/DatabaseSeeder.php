<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Scholarship;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Regular User',
            'email' => 'alaa@gmail.com',
            'password' => Hash::make('123'),
            'role' => 'user',
        ]);

        Scholarship::create([
            'title' => 'Merit-Based Scholarship',
            'description' => 'Awarded to students with excellent academic performance.',
            'requirement' => 'GPA 3.5 or higher',
            'deadline' => '2024-12-31',

        ]);

        Scholarship::create([
            'title' => 'Financial Aid Scholarship',
            'description' => 'For students demonstrating financial need.',
            'requirement' => 'Proof of financial need',
            'deadline' => '2024-11-30',

        ]);
    }
}
