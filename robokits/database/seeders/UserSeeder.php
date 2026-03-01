<?php

namespace Database\Seeders;

use App\Models\User; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
        'name' => 'Admon',
        'email' => 'admon@robotics.com',
        'password' => Hash::make('Adm@2022'),
        'role' => 'admin',
    ]);

    // 2. Docente
    User::create([
        'name' => 'Tecmilenio Teacher',
        'email' => 'teacher@robotics.com',
        'password' => Hash::make('Adm@2022'),
        'role' => 'teacher',
    ]);

    // 3. Estudiante
    User::create([
        'name' => 'Student',
        'email' => 'student@robotics.com',
        'password' => Hash::make('Adm@2022'),
        'role' => 'student',
    ]);    //
    }
}
