<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => '1st Semester',
            ],
            [
                'name' => '2nd Semester',
            ],
            [
                'name' => 'Summer',
            ],
        ];
        foreach ($data as $key => $value) {
            \App\Models\Semester::create($value);
        }
    }
}
