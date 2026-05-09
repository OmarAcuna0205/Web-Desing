<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Routine extends Model
{
    protected $fillable = ['user_id', 'nombre', 'dia'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function exercises() {
        return $this->hasMany(Exercise::class);
    }
}