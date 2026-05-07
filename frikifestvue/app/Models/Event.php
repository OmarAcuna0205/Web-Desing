<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['nombre', 'categoria', 'fecha', 'descripcion'];
}