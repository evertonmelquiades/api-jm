<?php

namespace Database\Seeders;

use App\Models\Business;
use App\Models\Employee;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        Business::factory(10)->create();
        Employee::factory(10)->create();

        
    }
}
