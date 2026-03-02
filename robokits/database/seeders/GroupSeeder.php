<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Group;

class GroupSeeder extends Seeder
{
    public function run(): void
    {
        // Crear los niveles de grupos
        Group::create(['name' => 'Beginner']);
        Group::create(['name' => 'Intermediate']);
        Group::create(['name' => 'Advanced']);
    }
}