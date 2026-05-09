<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    protected $fillable = ['routine_id', 'nombre', 'series', 'repeticiones'];

    public function routine() {
        return $this->belongsTo(Routine::class);
    }
}