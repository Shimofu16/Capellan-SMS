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
            /// First Semester Subjects for ABM
            ['code' => 'ABM-MATH101', 'name' => 'Mathematics', 'unit' => 3,  'type' => 'Core', 'specialization_id' => 1, 'semester_id' => 1],
            ['code' => 'ABM-ENG101', 'name' => 'English', 'unit' => 3,  'type' => 'Core', 'specialization_id' => 1, 'semester_id' => 1],
            ['code' => 'ABM-SCIENCE101', 'name' => 'Science', 'unit' => 4,  'type' => 'Core', 'specialization_id' => 1, 'semester_id' => 1],

            // First Semester Subjects for GAS
            ['code' => 'GAS-SOCIALSCI101', 'name' => 'Social Science', 'unit' => 3,  'type' => 'Core', 'specialization_id' => 2, 'semester_id' => 1],
            ['code' => 'GAS-HIST101', 'name' => 'History', 'unit' => 3,  'type' => 'Core', 'specialization_id' => 2, 'semester_id' => 1],
            ['code' => 'GAS-PHYSICALFITNESS101', 'name' => 'Physical Fitness', 'unit' => 2,  'type' => 'Elective', 'specialization_id' => 2, 'semester_id' => 1],

            // First Semester Subjects for HUMSS
            ['code' => 'HUMSS-ARTS101', 'name' => 'Arts', 'unit' => 3,  'type' => 'Core', 'specialization_id' => 3, 'semester_id' => 1],
            ['code' => 'HUMSS-LITERATURE101', 'name' => 'Literature', 'unit' => 3,  'type' => 'Core', 'specialization_id' => 3, 'semester_id' => 1],
            ['code' => 'HUMSS-PHYSICALFITNESS101', 'name' => 'Physical Fitness', 'unit' => 2,  'type' => 'Elective', 'specialization_id' => 3, 'semester_id' => 1],

            // Second Semester Subjects for ABM
            ['code' => 'ABM-ACCOUNTING102', 'name' => 'Accounting', 'unit' => 3, 'prerequisite' => 'ABM-MATH101', 'type' => 'Core', 'specialization_id' => 1, 'semester_id' => 2],
            ['code' => 'ABM-ECONOMICS102', 'name' => 'Economics', 'unit' => 3, 'prerequisite' => 'ABM-MATH101', 'type' => 'Core', 'specialization_id' => 1, 'semester_id' => 2],
            ['code' => 'ABM-FINANCE102', 'name' => 'Finance', 'unit' => 3, 'prerequisite' => 'ABM-MATH101', 'type' => 'Core', 'specialization_id' => 1, 'semester_id' => 2],

            // Second Semester Subjects for GAS
            ['code' => 'GAS-BROADCASTING102', 'name' => 'Broadcasting', 'unit' => 3, 'prerequisite' => 'GAS-SOCIALSCI101', 'type' => 'Core', 'specialization_id' => 2, 'semester_id' => 2],
            ['code' => 'GAS-JOURNALISM102', 'name' => 'Journalism', 'unit' => 3, 'prerequisite' => 'GAS-SOCIALSCI101', 'type' => 'Core', 'specialization_id' => 2, 'semester_id' => 2],
            ['code' => 'GAS-DIGITALMEDIA102', 'name' => 'Digital Media', 'unit' => 3, 'prerequisite' => 'GAS-SOCIALSCI101', 'type' => 'Core', 'specialization_id' => 2, 'semester_id' => 2],

            // Second Semester Subjects for HUMSS
            ['code' => 'HUMSS-POLITICALSCIENCE102', 'name' => 'Political Science', 'unit' => 3, 'prerequisite' => 'HUMSS-ARTS101', 'type' => 'Core', 'specialization_id' => 3, 'semester_id' => 2],
            ['code' => 'HUMSS-SOCIOLOGY102', 'name' => 'Sociology', 'unit' => 3, 'prerequisite' => 'HUMSS-ARTS101', 'type' => 'Core', 'specialization_id' => 3, 'semester_id' => 2],
            ['code' => 'HUMSS-PHILOSOPHY102', 'name' => 'Philosophy', 'unit' => 3, 'prerequisite' => 'HUMSS-ARTS101', 'type' => 'Core', 'specialization_id' => 3, 'semester_id' => 2],
        ];
        foreach ($data as $key => $value) {
            \App\Models\Subject::create($value);
        }
    }
}
