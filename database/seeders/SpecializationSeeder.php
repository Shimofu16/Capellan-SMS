<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // ABM Specializations
            ['name' => 'Accountancy', 'strand_id' => 1],
            ['name' => 'Business Administration',  'strand_id' => 1],
            ['name' => 'Entrepreneurship',  'strand_id' => 1],

            // GAS Specializations
            ['name' => 'Broadcasting',  'strand_id' => 2],
            ['name' => 'Journalism', 'strand_id' => 2],
            ['name' => 'Digital Media Arts', 'strand_id' => 2],

            // HUMSS Specializations
            ['name' => 'Psychology',  'strand_id' => 3],
            ['name' => 'Sociology', 'strand_id' => 3],
            ['name' => 'Political Science',  'strand_id' => 3],

            // STEM Specializations
            ['name' => 'Computer Science', 'strand_id' => 4],
            ['name' => 'Engineering', 'strand_id' => 4],
            ['name' => 'Biology', 'strand_id' => 4],

            // TVL Specializations
            ['name' => 'Culinary Arts', 'strand_id' => 5],
            ['name' => 'Tourism and Hospitality',  'strand_id' => 5],
            ['name' => 'Fashion Design',  'strand_id' => 5],
        ];
        foreach ($data as $key => $value) {
            \App\Models\Specialization::create($value);
        }
    }
}
