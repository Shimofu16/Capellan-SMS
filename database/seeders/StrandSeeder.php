<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Accountancy, Business and Management',
                'slug' => 'ABM',
            ],
            [
                'name' => 'General Academic Strand',
                'slug' => 'GAS',
            ],
            [
                'name' => 'Humanities and Social Sciences',
                'slug' => 'HUMSS',
            ],
            [
                'name' => 'Science, Technology, Engineering, and Mathematics strand',
                'slug' => 'STEM',
            ],
            [
                'name' => 'Technical Vocational Livelihood Strand',
                'slug' => 'TVL',
            ],
        ];
        foreach ($data as $key => $value) {
            \App\Models\Strand::create($value);
        }
    }
}
