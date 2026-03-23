<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    public function actores() {
        return $this->belongsToMany(Actor::class);
    }
}
