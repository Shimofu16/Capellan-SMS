<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchoolYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => '2020-2021',
                'start_date' => '2020-06-10',
                'end_date' => '2021-06-10',
                'semester_id' => 1,
            ],
            [
                'name' => '2021-2022',
                'start_date' => '2021-06-10',
                'end_date' => '2022-06-10',
                'semester_id' => 1,
            ],
            [
                'name' => '2022-2023',
                'start_date' => '2022-06-10',
                'end_date' => '2023-06-10',
                'semester_id' => 1,
                'is_active' => true,
            ],
        ];
        foreach ($data as $key => $value) {
            \App\Models\SchoolYear::create($value);
        }
    }
}
