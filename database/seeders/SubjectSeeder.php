<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // First Semester Subjects
            ['code' => 'MATH101', 'name' => 'Mathematics', 'unit' => 3, 'type' => 'Core', 'semester_id' => 1],
            ['code' => 'ENG101', 'name' => 'English', 'unit' => 3, 'type' => 'Core', 'semester_id' => 1],
            ['code' => 'SCIENCE101', 'name' => 'Science', 'unit' => 4, 'type' => 'Core', 'semester_id' => 1],
            
            // Second Semester Subjects
            ['code' => 'SOCIALSCI102', 'name' => 'Social Science', 'unit' => 3, 'type' => 'Core', 'semester_id' => 2],
            ['code' => 'HIST101', 'name' => 'History', 'unit' => 3, 'type' => 'Core', 'semester_id' => 2],
            ['code' => 'PHYSICALFITNESS102', 'name' => 'Physical Fitness', 'unit' => 2, 'type' => 'Elective', 'semester_id' => 2],
            
            // Third Semester Subjects
            ['code' => 'ARTS103', 'name' => 'Arts', 'unit' => 3, 'type' => 'Core', 'semester_id' => 3],
            ['code' => 'COMPUTERSCI102', 'name' => 'Computer Science', 'unit' => 4, 'type' => 'Core', 'semester_id' => 3],
            ['code' => 'MUSIC101', 'name' => 'Music', 'unit' => 2, 'type' => 'Elective', 'semester_id' => 3],
        ];
        foreach ($data as $key => $value) {
            \App\Models\Subject::create($value);
        }
    }
}
