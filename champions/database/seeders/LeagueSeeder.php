<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\League;

class LeagueSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Crear La Liga (España)
        $laLiga = League::create([
            'name' => 'La Liga', 
            'country' => 'España'
        ]);
        
        $laLiga->teams()->createMany([
            ['name' => 'Real Madrid', 'stadium' => 'Santiago Bernabéu'],
            ['name' => 'FC Barcelona', 'stadium' => 'Camp Nou'],
            ['name' => 'Atlético de Madrid', 'stadium' => 'Metropolitano'],
        ]);

        // 2. Crear Premier League (Inglaterra)
        $premier = League::create([
            'name' => 'Premier League', 
            'country' => 'Inglaterra'
        ]);

        $premier->teams()->createMany([
            ['name' => 'Manchester City', 'stadium' => 'Etihad Stadium'],
            ['name' => 'Liverpool', 'stadium' => 'Anfield'],
            ['name' => 'Chelsea', 'stadium' => 'Stamford Bridge'],
        ]);
    }
}