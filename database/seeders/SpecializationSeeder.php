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
            ['name' => 'Accountancy', 'slug' => 'accountancy', 'strand_id' => 1],
            ['name' => 'Business Administration', 'slug' => 'business-administration', 'strand_id' => 1],
            ['name' => 'Entrepreneurship', 'slug' => 'entrepreneurship', 'strand_id' => 1],

            // GAS Specializations
            ['name' => 'Broadcasting', 'slug' => 'broadcasting', 'strand_id' => 2],
            ['name' => 'Journalism', 'slug' => 'journalism', 'strand_id' => 2],
            ['name' => 'Digital Media Arts', 'slug' => 'digital-media-arts', 'strand_id' => 2],

            // HUMSS Specializations
            ['name' => 'Psychology', 'slug' => 'psychology', 'strand_id' => 3],
            ['name' => 'Sociology', 'slug' => 'sociology', 'strand_id' => 3],
            ['name' => 'Political Science', 'slug' => 'political-science', 'strand_id' => 3],

            // STEM Specializations
            ['name' => 'Computer Science', 'slug' => 'computer-science', 'strand_id' => 4],
            ['name' => 'Engineering', 'slug' => 'engineering', 'strand_id' => 4],
            ['name' => 'Biology', 'slug' => 'biology', 'strand_id' => 4],

            // TVL Specializations
            ['name' => 'Culinary Arts', 'slug' => 'culinary-arts', 'strand_id' => 5],
            ['name' => 'Tourism and Hospitality', 'slug' => 'tourism-and-hospitality', 'strand_id' => 5],
            ['name' => 'Fashion Design', 'slug' => 'fashion-design', 'strand_id' => 5],
        ];
        foreach ($data as $key => $value) {
            \App\Models\Specialization::create($value);
        }
    }
}
