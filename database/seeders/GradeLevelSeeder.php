<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GradeLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Grade 11',
                'description' => 'Grade 11',
            ],
            [
                'name' => 'Grade 12',
                'description' => 'Grade 12',
            ],
        ];
        foreach ($data as $key => $value) {
            \App\Models\GradeLevel::create($value);
        }
    }
}
