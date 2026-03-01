<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // <--- 1. IMPORTANTE: Agregar esto
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory; // <--- 2. IMPORTANTE: Usarlo dentro de la clase

    // 3. De una vez agrega esto para evitar el error de "Mass Assignment" que te saldría después:
    protected $fillable = ['title', 'cover_image', 'content', 'robotics_kit_id'];

    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }

    public function roboticsKit()
    {
        return $this->belongsTo(RoboticsKit::class);
    }
}