<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoboticsKit extends Model
{
    use HasFactory;

    // Esto permite guardar datos masivamente desde el Seeder
    protected $fillable = ['name', 'description'];

    // Relación: Un kit tiene muchos cursos
    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}