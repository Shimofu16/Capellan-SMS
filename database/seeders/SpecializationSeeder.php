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
            [ 'Electrical Installation & Maintenance', 1],
            [ 'Automotive Servicing NC I', 1],
            [ 'Computer Systems Servicing', 2],
            [ 'Hskpg/FOS/FBS/BPP', 3]
        ];
        foreach ($data as $key => $value) {
            \App\Models\Specialization::create(
                [
                    'name' => $value[0],
                    'strand_id' => $value[1]
                ]
            );
        }
    }
}
