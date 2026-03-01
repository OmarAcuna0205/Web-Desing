<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\RoboticsKit; // <--- ¡ESTA ES LA LÍNEA CLAVE QUE FALTA!

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3),
            'cover_image' => fake()->imageUrl(640, 480, 'robotics', true),
            'content' => fake()->paragraph(),
            // Ahora sí funcionará porque importamos la clase arriba
            'robotics_kit_id' => RoboticsKit::inRandomOrder()->first()->id ?? 1,
        ];
    }
}