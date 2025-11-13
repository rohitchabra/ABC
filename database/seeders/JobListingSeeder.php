<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Job; // ✅ use your Job model

class JobListingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Job::create(['title' => 'Director', 'salary' => '$50,000']);
        Job::create(['title' => 'Programmer', 'salary' => '$10,000']);
        Job::create(['title' => 'Teacher', 'salary' => '$40,000']);
    }
}
