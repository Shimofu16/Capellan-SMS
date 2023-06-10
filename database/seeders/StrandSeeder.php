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
                'slug' => 'abm',
            ],
            [
                'name' => 'General Academic Strand',
                'slug' => 'gas',
            ],
            [
                'name' => 'Humanities and Social Sciences',
                'slug' => 'humss',
            ],
            [
                'name' => 'Science, Technology, Engineering, and Mathematics strand',
                'slug' => 'stem',
            ],
            [
                'name' => 'Technical-Vocational-Livelihood Strand',
                'slug' => 'tvl',
            ],
        ];
        foreach ($data as $key => $value) {
            \App\Models\Strand::create($value);
        }
    }
}
