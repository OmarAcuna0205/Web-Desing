<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Routine;
use App\Models\Exercise;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin Boss',
            'email' => 'admin@gym.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        for ($i = 1; $i <= 9; $i++) {
            $user = User::create([
                'name' => "Atleta $i",
                'email' => "atleta$i@gym.com",
                'password' => Hash::make('password'),
                'role' => 'user',
            ]);

            $rutinaGym = Routine::create([
                'user_id' => $user->id,
                'nombre' => 'Fuerza y Pierna',
                'dia' => 'Lunes'
            ]);

            $rutinaCardio = Routine::create([
                'user_id' => $user->id,
                'nombre' => 'Día de Running y Core',
                'dia' => 'Miércoles'
            ]);

            Exercise::create([
                'routine_id' => $rutinaGym->id,
                'nombre' => 'Sentadilla Libre',
                'series' => 4,
                'repeticiones' => 10
            ]);

            Exercise::create([
                'routine_id' => $rutinaGym->id,
                'nombre' => 'Prensa',
                'series' => 4,
                'repeticiones' => 12
            ]);

            Exercise::create([
                'routine_id' => $rutinaCardio->id,
                'nombre' => 'Trote 5km',
                'series' => 1,
                'repeticiones' => 1
            ]);
            
            Exercise::create([
                'routine_id' => $rutinaCardio->id,
                'nombre' => 'Plancha abdominal',
                'series' => 3,
                'repeticiones' => 1
            ]);
        }
    }
}