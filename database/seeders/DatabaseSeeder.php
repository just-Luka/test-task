<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Staff;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {  
        // Branch::factory(4)->create();

        // Occupation::factory(4)->create();

        Staff::factory(4)->create();
    }
}
