<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\RoboticsKit; // <--- ¡ESTA ES LA LÍNEA QUE FALTA!

class RoboticsKitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RoboticsKit::create([
        'name' => 'StarterKit',
        'description' => 'Kit básico para principiantes'
    ]);

    RoboticsKit::create([
        'name' => 'Educational Robotics Kit',
        'description' => 'Kit avanzado para educación'
    ]);

    RoboticsKit::create([
        'name' => 'Kit5',
        'description' => 'Kit experimental versión 5'
    ]);
    }
}
