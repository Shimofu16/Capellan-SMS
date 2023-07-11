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
            [ 'Industrial Arts', 'IA'],
            [ 'Information and Communications Technology', 'ICT'],
            [ 'Home Economics', 'HE']
        ];
        foreach ($data as $key => $value) {
            \App\Models\Strand::create([
                'name' => $value[0],
                'slug' => $value[1]
            ]);
        }
    }
}
