<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Group;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Crear 15 cursos usando la Factory
        $courses = Course::factory(15)->create();

        // 2. Obtener todos los grupos disponibles
        $groups = Group::all();

        // 3. Recorrer cada curso y asignarle grupos aleatorios
        foreach ($courses as $course) {
            // Asigna entre 1 y 3 grupos a cada curso
            $course->groups()->attach(
                $groups->random(rand(1, 3))->pluck('id')
            );
        }
    }
}