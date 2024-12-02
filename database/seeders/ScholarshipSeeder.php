<?php

namespace Database\Seeders;
use App\Models\Scholarship;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScholarshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
