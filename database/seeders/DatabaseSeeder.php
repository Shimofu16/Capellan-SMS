<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Specialization;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $this->call(UserSeeder::class);
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            SemesterSeeder::class,
            SchoolYearSeeder::class,
            GradeLevelSeeder::class,
        StrandSeeder::class,
            SpecializationSeeder::class,
            SubjectSeeder::class,
               /*  BillingSeeder::class,*/
        ]);
    }
}
