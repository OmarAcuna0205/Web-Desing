<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Usuario Administrador
        User::create([
            'name' => 'Admin',
            'email' => 'admin@empresa.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // 2. Usuario Gerente
        User::create([
            'name' => 'Gerente',
            'email' => 'gerente@empresa.com',
            'password' => Hash::make('password'),
            'role' => 'gerente',
        ]);

        // 3. Usuario Empleado
        User::create([
            'name' => 'Empleado',
            'email' => 'empleado@empresa.com',
            'password' => Hash::make('password'),
            'role' => 'empleado',
        ]);
    }
}