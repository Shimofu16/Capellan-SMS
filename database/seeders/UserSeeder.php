<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Administrator',
                'email' => 'admin@app.com',
                'role_id' => 1,
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Registrar',
                'email' => 'registrar@app.com',
                'role_id' => 2,
                'password' => Hash::make('password'),
            ],
        ];
        foreach ($data as $key => $value) {
            \App\Models\User::create($value);
        }
    }
}
